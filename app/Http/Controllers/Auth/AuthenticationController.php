<?php
/**
 * Created by PhpStorm.
 * User: Efa
 * Date: 02/10/2017
 * Time: 7:35 AM
 */
namespace App\Http\Controllers\Auth;

use App\Services\AuthenticationService;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Hash;
use Auth;
use Illuminate\Http\Request;
use Validator;

class AuthenticationController extends Controller
{

    private $client;


    private $authenticationService;

    private $messageService;

    private $activationService;

    public function __construct( AuthenticationService $authenticationService)
    {
        $this->client = DB::table('oauth_clients')->where('id', 2)->first();
        $this->authenticationService = $authenticationService;
    }

    /**
     * Authenticate a user
     *
     * This endpoint is used to authenticate a registered user. This request is not authenticated.
     *
     * @param Requests\LoginRequest $request
     * @return App/User
     *
     */
    protected function authenticate(Request $request)
    {
         $validator = Validator::make($request->all(), [ 
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) { 
                    return response()->json(['error'=>$validator->errors()], 401);            
        }

        return $this->authenticationService->authenticate($request);

    }


    /**
     * Logout a user
     *
     * This endpoint is used to authenticate a registered user. This request is not authenticated.
     *
     * @param Requests\LoginRequest $request
     * @return App/User
     *
     */
    public function logout()
    { 

        $user_id = Auth::user()->id;

        $hasLogins = AauthAcessToken::where("user_id",$user_id)->where("created_at","<",Date("Y-m-d H:i:s"))->count();

        if ($hasLogins > 0){
          AauthAcessToken::where("user_id",$user_id)
          ->where("created_at","<",Date("Y-m-d H:i:s"))->delete();
        }
    }


}