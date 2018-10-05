<?php
/**
 * Created by PhpStorm.
 * User: babafemi
 * Date: 05/10/2017
 * Time: 9:13 AM
 */

namespace App\Services;


use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Connection;
use Hash;


class AuthenticationService
{
    private $client;

    private $messageService;

    private $message;

    private $activationService;

    public function __construct(Connection $db)
    {
        $this->client = DB::table('oauth_clients')->where('id', 2)->first();
        $this->db = $db;
    }

    public function authenticate($request)
    {   

        
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)){

            if(!Auth::validate(['email' => $request->email, 'password' => $request->password]))
                return response()->json(
                    ['message'=>'Email/Password is incorrect'],
                    400
                );

            $user = User::where('email', $request->email)->first();

        }else{
            $user = User::where('username', strtolower($request->email))->first();


            if(!Auth::validate(['username' => $request->email, 'password' => $request->password]))
                return response()->json(
                    ['message'=>'Username/Password is incorrect'],
                    400
                );

            $request->email = $user->email;                      

        }


        if($user === null){
            return response()->json(
                ['message'=>'This user does not exist'],
                400
            );
        }

       
       /* $data = [
            'username' => $request->email,
            'password' => $request->password,
            'grant_type' => 'password',
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'scope' => '*'
        ];

        $proxy = Request::create(
            'oauth/token',
            'POST',
            $data
        );

        $output = app()->handle($proxy);
        $output->user = $user;*/

        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['user'] =  $user;

        return response()->json($success, 200);
      
    }


}