<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients_Campaings extends Model
{
    protected $table = "clients_campaings";

	protected $fillable = 	[
							'id',
							'campaing_id',
							'agent_id',
							'email',
							'name',
							'phone',
							'others',
							];

	protected $primaryKey = 'id';

	public function campaing() {
        return $this->belongsTo('App\Campaings','campaing_id','id');
    }

    public function agent() {
        return $this->belongsTo('App\Agents','agent_id','id');
    }
}
