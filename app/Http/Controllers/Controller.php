<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function notifications($request, $notifications) {
        $unreadNotifications = $notifications
            ->where('notifiable_id', $request->user()->id)
            ->where('read_at', null)->get();
        return $unreadNotifications;
    }
}
