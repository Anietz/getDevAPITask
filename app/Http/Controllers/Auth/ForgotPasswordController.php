<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\User;
use App\Services\MessageService;
use App\Http\Requests;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MessageService $messageService)
    {
        $this->middleware('guest');
        $this->messageService = $messageService;
    }
    


      protected function forgot_password(Requests\ForgotPasswordRequest $request){         

        $user_data = User::where("email","=",$request->email)->first();
        if (empty($user_data)){
            return response()->json("The specified e-mail address does not exist",400); 
        }

        $new_password = str_random(6);
        $user_data->password = bcrypt($new_password);
        $user_data->save();

        $resss = $this->sendForgotPasswordMail($user_data,$new_password);

        return response()->json("We have sent you a new passowrd to your email",200); 
        
    }


     public function sendForgotPasswordMail(User $user,$new_password)
    {
        $message = new Message();
        $message->body = "Your new password is: ".$new_password;
        $message->subject = "Password Recovery";
        $message->recipient = $user->email;
        $message->sender = "noreply@birrion.io";
        $message->topic = "Password Recovery";
        $message->view = "emails.trade";

        $this->messageService->sendEmail($message);

    }    
}
