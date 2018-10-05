<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BucketList extends Model
{
    //const CREATED_AT = 'date_created';
	//const UPDATED_AT = 'date_modified';

	protected $table="bucket_lists";
	protected $fillable = ["name","created_by"];

	public function items(){
		return $this->hasMany("App\Item");
	}
}
