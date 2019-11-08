<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateNotificationRequest;
use App\Models\Notification;
use App\Notifications\NewMessage;

class NotificationsController extends Controller
{
    public function getIndex() {
        return redirect()->route('notifications_list');
    }

    public function getList() {
		$notifications=Notification::all();
    	return view('notifications.list',['notifications'=>$notifications]);
    }

    public function getCreate() {
    	return view('notifications.create');
    }

    public function create(CreateNotificationRequest $request){
		$notification=Notification::create($request->only(['email','message']));

        $notification->notify(new NewMessage($notification));

        return redirect()->route('notifications_list')->with(['message_info'=>'Notification registered successfully!']);
    }

    public function getEdit($notification_id) {
        $notification=Notification::where('id',$notification_id)->first();

        if(!$notification){
            return redirect()->route('notifications_list')->withErrors('The notification with ID No. '.$notification_id.' is not registered!');
        }

        return view('notifications.edit',['notification'=>$notification]);
    }

    public function update(CreateNotificationRequest $request) {
        $notification_id=$request->notification_id;
        Notification::where('id',$notification_id)->update($request->only(['email','message']));

        $notification=Notification::where('id',$notification_id)->first();
        $notification->notify(new NewMessage($notification));

        return redirect()->route('notifications_list')->with(['message_info'=>'Notification updated successfully!']);
    }

    public function getTrash($notification_id) {
        $notification=Notification::where('id',$notification_id)->first();

        if(!$notification){
            return redirect()->route('notifications_list')->withErrors('The notification with ID No. '.$notification_id.' is not registered!');
        }

        return view('notifications.trash',['notification'=>$notification]);
    }

    public function delete(Request $request) {
        Notification::where('id',$request->get('notification_id'))->delete();
        return redirect()->route('notifications_list')->with(['message_info'=>'Notification successfully removed!']);
    }
}
