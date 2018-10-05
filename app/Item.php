<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //const CREATED_AT = 'date_created';
	//const UPDATED_AT = 'date_modified';

	protected $table="items";
	protected $fillable = ["name","done","bucket_list_id"];

	public function bucketList(){
		return $this->belongsTo("App\BucketList");
	}
}
