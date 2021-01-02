<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        //        dd(auth()->user()->unreadNotifications);
//        dd(auth()->user()->unreadNotifications[0]->data['message']);
        $notifications = auth()->user()->notifications;

        foreach ($notifications as $notification) {
            $notification->markAsRead();
        }
//        dd($notifications);
        return view('backend.users.notification');
    }
}
