<?php

namespace App\Http\Controllers;

use App\Events\BroadcastMessage;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    //

    public function index() {
        return view('messages.index');
    }

    public function message() {
        $recent_message = Message::where(function ($query) {
            $query->where('from', '=', Auth::user()->slug)->latest();
        })->orWhere(function ($query) {
            $query->where('to', '=', Auth::user()->slug)->latest();
        })->first();

        if (isset($recent_message)) {
            $message_from = $recent_message->from;
            $message_to = $recent_message->to;

            $user = User::where(function ($query) use ($message_from) {
                $query->where('slug', '=', $message_from)
                    ->where('slug', '!=', Auth::user()->slug);
            })->orWhere(function ($query) use ($message_to) {
                $query->where('slug', '=', $message_to)
                    ->where('slug', '!=', Auth::user()->slug);
            })->first();
        }

        if(isset($user)) {
            $user_slug = $user->slug;

            $users = User::where('slug', '!=', Auth::user()->slug)
                ->where('slug', '!=', $user->slug)->get();

            $this->getUsersLastMessage($users);

            $message_content = Message::where(function ($query) use ($user_slug) {
                $query->where('from', '=', Auth::user()->slug)
                    ->where('to', '=', $user_slug);
            })->orWhere(function ($query) use ($user_slug) {
                $query->where('from', '=', $user_slug)
                    ->where('to', '=', Auth::user()->slug);
            })->get();
        } else {
            $users = User::where('slug', '!=', Auth::user()->slug)->get();
            $this->getUsersLastMessage($users);
        }

        $userAuth = Auth::user();

        return response()->json([
            'recent_message' => $recent_message,
            'message_content' => $message_content,
            'user' => $user,
            'users' => $users,
            'userAuth' => $userAuth
        ]);
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

    public function getUsersLastMessage($users) {
        foreach($users as $user) {
            $user_slug = $user->slug;
            $last_msg = Message::where(function ($query) use ($user_slug) {
                $query->where('from', '=', $user_slug)->latest();
            })->orWhere(function ($query) use ($user_slug) {
                $query->where('to', '=', $user_slug)->latest();
            })->first();
            $user['last_msg'] = isset($last_msg) ? $last_msg : 'No recent message';
        }
    }
}
