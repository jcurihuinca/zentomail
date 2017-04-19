<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agents extends Model
{

	protected $table = "agents";

	protected $fillable = 	[
							'id',
							'user_id',
							'name',
							'address',
							'phone',
							'email',
							];

	protected $primaryKey = 'id';

	public function user() {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function exist($email)
    {
    	return self::where('email', $email)->first();
    }
}
