<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use App\Events\BroadcastMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    //

    public function index() {
        return view('messages.index');
    }

    public function message($slug = null) {
        $recent_message = Message::where(function ($query) {
            $query->where('from', '=', Auth::user()->slug);
        })->orWhere(function ($query) {
            $query->where('to', '=', Auth::user()->slug);
        })->latest()->first();

        if ($slug) {
            $recent_message = Message::where(function ($query) use ($slug) {
                $query->where('from', '=', Auth::user()->slug)
                    ->where('to', '=', $slug);
            })->orWhere(function ($query) use ($slug) {
                $query->where('from', '=', $slug)
                    ->where('to', '=', Auth::user()->slug);
            })->latest()->first();
        }

        if($slug) {
            $messages_from = DB::table('messages')->where('from', '!=', Auth::user()->slug)
                ->where('to', '=', Auth::user()->slug)
                ->where('from', '!=', $slug)
                ->distinct()->pluck('from')->toArray();

            $messages_to = DB::table('messages')->where('from', '=', Auth::user()->slug)
                ->where('to', '!=', Auth::user()->slug)
                ->where('to', '!=', $slug)
                ->distinct()->pluck('to')->toArray();

        } else {
            $messages_from = DB::table('messages')->where('from', '!=', Auth::user()->slug)
                ->where('to', '=', Auth::user()->slug)->distinct()
                ->pluck('from')->toArray();

            $messages_to = DB::table('messages')->where('from', '=', Auth::user()->slug)
                ->where('to', '!=', Auth::user()->slug)->distinct()
                ->pluck('to')->toArray();
        }

        if ($slug) {
            $users = DB::table('users')
                ->whereIn('slug', $messages_to)
                ->orWhereIn('slug', $messages_from)
                ->get()->toArray();

            $this->getUsersLastMessage($users);

            $user = User::where('slug', '=', $slug)->first();
        } else {
            $users = DB::table('users')
                ->whereIn('slug', $messages_to)
                ->orWhereIn('slug', $messages_from)
                ->get()->toArray();

            $this->getUsersLastMessage($users);
        }

        if ($users || isset($user)) {
        	$user = $users[0];

            array_shift($users);
            
            $userAuth = Auth::user();

            return response()->json([
                'recent_message' => $recent_message,
                'user' => $user,
                'users' => $users,
                'userAuth' => $userAuth,
                'messages_to' => $messages_to,
                'messages_from' => $messages_from
            ]);
        }

        return response()->json(['msg' => 'Empty timeline']);
    }

    public function getMessage($slug) {
        $user = User::where('slug', '=', $slug)->first();

        $messages = Message::where(function ($query) use ($slug) {
            $query->where('from', '=', Auth::user()->slug)
                ->where('to', '=', $slug);
        })->orWhere(function ($query) use ($slug) {
            $query->where('from', '=', $slug)
                ->where('to', '=', Auth::user()->slug);
        })->get();

        return response()->json(['user' => $user, 'messages' => $messages]);
    }

    public function sendMessage(Request $request) {
        $input = $request->all();
        if (Auth::check()) { $input['from'] = Auth::user()->slug; }
        $msg = Message::create($input);
        broadcast(new BroadcastMessage($msg))->toOthers();
        return response()->json(['msg' => $msg]);
    }

    protected function getUsersLastMessage($users) {
        foreach($users as $user) {
            $user_slug = $user->slug;

            $last_msg = Message::where(function ($query) use ($user_slug) {
                $query->where('from', '=', Auth::user()->slug)
                    ->where('to', '=', $user_slug);
            })->orWhere(function ($query) use ($user_slug) {
                $query->where('from', '=', $user_slug)
                    ->where('to', '=', Auth::user()->slug);
            })->latest()->first();

            $user->last_msg = isset($last_msg) ? $last_msg : null;
        }
    }
}
