<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $table = "business";

	protected $fillable = 	[
							'id',
							'user_id',
							'company_name',
							'first_name',
							'last_name',
							'email',
							'address',
							'logo',
							];

	protected $primaryKey = 'id';

	public function user() {
        return $this->belongsTo('App\User','user_id','id');
    }
}
