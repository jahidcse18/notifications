<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\BirthdayWish;
use Illuminate\Support\Facades\Notification;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = User::find(4);
   
        $messages["hi"] = "Hey, Happy Birthday {$user->name}";
        $messages["wish"] = "On behalf of the entire company I wish you a very happy birthday and send you my best wishes for much happiness in your life.";
           
        //$user->notify(new BirthdayWish($messages));
        //Notification::send($user, new BirthdayWish($messages));
        Notification::sendNow($user, new BirthdayWish($messages));
   
        dd('Done');
    }
}
