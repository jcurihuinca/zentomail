<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaings extends Model
{
    protected $table = "campaings";

	protected $fillable = 	[
							'id',
							'plan_id',
							'name',
							'send_to',
							'state',
							];

	protected $primaryKey = 'id';

	public function plan() {
        return $this->belongsTo('App\Plans','plan_id','id');
    }
}
