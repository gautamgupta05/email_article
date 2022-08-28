<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\UserEmail;
use Mail;

class UserController extends Controller
{
    public function sendEmail(Request $request){

        $users = User::get();

        foreach($users as $key=>$user){
            Mail::to($user->email)->send(new UserEmail($user));
        }
            return response()->json(['success'=>'Email Send Successfully! Please Check Your Email..']);
    }
}
