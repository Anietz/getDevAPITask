<?php
/**
 * Created by PhpStorm.
 * User: Efa
 * Date: 02/10/2017
 * Time: 7:35 AM
 */
namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\BucketList;
use App\Item;

class HomeController extends Controller
{

    private $client;


    public function __construct()
    {
          $userTimezone = "Africa/Lagos";
        date_default_timezone_set($userTimezone);
        \Config::set('app.timezone', $userTimezone);  

    }

    /**
     * Create a new Bucketlist
     *
     * This endpoint is used to authenticate a registered user. This request is not authenticated.
     *
     * @param Requests\LoginRequest $request
     * @return App/User
     *
     */
    protected function createBucketList(Request $request)
    {
         $validator = Validator::make($request->all(), [ 
            'name' => 'required'
        ]);
        if ($validator->fails()) { 
                    return response()->json(['error'=>$validator->errors()], 401);            
        }

        $user_id = Auth::user()->id;

        if(User::find($user_id) == null){
             return response()->json(['error'=>"User not found"], 401);   
        }

        $input['name'] = $request->name;
        $input['created_by'] = $user_id;
        
        $bucketList = BucketList::create($input);

        return response()->json($bucketList, 200);


    }

     /**
     * List all the created Bucketlist
     *
     * This endpoint is used to authenticate a registered user. This request is not authenticated.
     * 
     * @return App/User
     *
     */
    protected function getBucketList(Request $request)
    {
        
        $user_id = Auth::user()->id;

        $limit = $request->limit?:20;

        $search_string = $request->q;

        if(!empty($search_string)){
              $bucketList = BucketList::where("created_by",$user_id)->where("name","LIKE","%".$search_string."%")->paginate($limit);
        }else{
            $bucketList = BucketList::where("created_by",$user_id)->paginate($limit);   
        }
        
      

        return response()->json($bucketList, 200);

    }

     /**
     * Get a Single Bucketlist
     *
     * This endpoint is used to authenticate a registered user. This request is not authenticated.
     *
     * @param Requests\LoginRequest $request
     * @return App/User
     *
     */
    protected function getSingleBucketList(Request $request)
    {
        
        $user_id = Auth::user()->id;

        $bucketListId = request()->bucketListId;

        if(empty($bucketListId))
                 return response()->json(['error'=>"BucketlistId not specified as query param"], 401); 
        
        
        $bucketList = BucketList::where("created_by",$user_id)->where("id",$bucketListId)->first();

        if($bucketList == null)
                 return response()->json(['error'=>"Bucketlist not found"], 401); 

        return response()->json($bucketList, 200);

    }

     /**
     * Update a Bucketlist
     *
     * This endpoint is used to authenticate a registered user. This request is not authenticated.
     *
     * @param Requests\LoginRequest $request
     * @return App/User
     *
     */
    protected function updateBucketList(Request $request)
    {

        $validator = Validator::make($request->all(), [ 
            'name' => 'required',
            'id'=>'required'
        ]);
        if ($validator->fails()) { 
                    return response()->json(['error'=>$validator->errors()], 401);            
        }

        
        $user_id = Auth::user()->id;

        $bucketListId = request()->id;
        
        $bucketList = BucketList::where("created_by",$user_id)->where("id",$bucketListId)->first();

        if($bucketList == null)
                 return response()->json(['error'=>"Bucketlist not found"], 401); 

        $bucketList->name = request()->name;
        $bucketList->save();

        return response()->json($bucketList, 200);


    }

    /**
     * Delete a Bucketlist
     *
     * This endpoint is used to authenticate a registered user. This request is not authenticated.
     *
     * @param Requests\LoginRequest $request
     * @return App/User
     *
     */
    protected function deleteBucketList(Request $request)
    {

        $validator = Validator::make($request->all(), [ 
            'id'=>'required'
        ]);
        if ($validator->fails()) { 
                    return response()->json(['error'=>$validator->errors()], 401);            
        }

        
        $user_id = Auth::user()->id;

        $bucketListId = request()->id;
        
        $bucketList = BucketList::where("created_by",$user_id)->where("id",$bucketListId)->first();

        if($bucketList == null)
                 return response()->json(['error'=>"Bucketlist not found"], 401); 

        $bucketList->delete();

        return response()->json(["Bucket list deleted successfully"], 200);


    }

     /**
     * Create a new Bucketlist item
     *
     * This endpoint is used to authenticate a registered user. This request is not authenticated.
     *
     * @param Requests\LoginRequest $request
     * @return App/User
     *
     */
    protected function createBucketListItem(Request $request,$bucketListId)
    {
         $validator = Validator::make($request->all(), [ 
            'item_name' => 'required',
            'done'=>'required'
        ]);
        if ($validator->fails()) { 
                    return response()->json(['error'=>$validator->errors()], 401);            
        }

        $user_id = Auth::user()->id;

        if(User::find($user_id) == null)
             return response()->json(['error'=>"User not found"], 401);   

        if(Bucketlist::find($bucketListId) == null)
             return response()->json(['error'=>"Bucketlist not found"], 401);   
        
        $input['name'] = $request->item_name;
        $input['bucket_list_id'] = $bucketListId;
        $input["done"] = $request->done;
        
        $item = Item::create($input);

        return response()->json($item, 200);


    }

      /**
     * Get all  Bucketlist items
     *
     * This endpoint is used to authenticate a registered user. This request is not authenticated.
     *
     * @param Requests\LoginRequest $request
     * @return App/User
     *
     */
    protected function getBucketListItems(Request $request,$bucketListId)
    {
         
        $user_id = Auth::user()->id;

        if(User::find($user_id) == null)
             return response()->json(['error'=>"User not found"], 401);   

        if(Bucketlist::find($bucketListId) == null)
             return response()->json(['error'=>"Bucketlist not found"], 401);   
        
        $list = Bucketlist::with("items")->where("id",$bucketListId)->get();

        return response()->json($list, 200);


    }

      /**
     * Get a single  Bucketlist items
     *
     * This endpoint is used to authenticate a registered user. This request is not authenticated.
     *
     * @param Requests\LoginRequest $request
     * @return App/User
     *
     */
    protected function getSingleBucketListItem(Request $request,$bucketListId,$item_id)
    {
         
        $user_id = Auth::user()->id;

        if(User::find($user_id) == null)
             return response()->json(['error'=>"User not found"], 401);   

        if(Bucketlist::find($bucketListId) == null)
             return response()->json(['error'=>"Bucketlist not found"], 401); 

        if(Item::find($item_id) == null)
             return response()->json(['error'=>"Item not found"], 401);   
        
        $list = Item::with("bucketList")->where("id",$item_id)->first();

        return response()->json($list, 200);


    }


     /**
     * Update a Bucketlist Item
     *
     * This endpoint is used to authenticate a registered user. This request is not authenticated.
     *
     * @param Requests\LoginRequest $request
     * @return App/User
     *
     */
    protected function updateBucketListItem(Request $request,$bucketListId,$item_id)
    {

        $validator = Validator::make($request->all(), [ 
            'item_name' => 'required',
            'done'=>'required'
        ]);
        if ($validator->fails()) { 
                    return response()->json(['error'=>$validator->errors()], 401);            
        }


        if(Item::where("id",$item_id)->where("bucket_list_id",$bucketListId)->first() == null)
             return response()->json(['error'=>"Item not found"], 401);   
        
        $item = Item::with("bucketList")->where("id",$item_id)->first();

        $item->name = request()->item_name;
        $item->done = request()->done;
        $item->save();

        return response()->json($item, 200);


    }


       /**
     * Delete a Bucketlist Item
     *
     * This endpoint is used to authenticate a registered user. This request is not authenticated.
     *
     * @param Requests\LoginRequest $request
     * @return App/User
     *
     */
    protected function deleteBucketListItem(Request $request,$bucketListId,$item_id)
    {

        if(Item::where("id",$item_id)->where("bucket_list_id",$bucketListId)->first() == null)
             return response()->json(['error'=>"Item not found"], 401);   
        
        $item = Item::with("bucketList")->where("id",$item_id)->first();

        $item->delete();

        return response()->json("Item successfully deleted", 200);


    }


}