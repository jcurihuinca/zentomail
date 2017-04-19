<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentsCampaigns extends Model
{
    protected $table = "agents_campaings";

	protected $fillable = 	[
							'id',
							'agent_id',
							'campaing_id',
							'send_to',
							];

	protected $primaryKey = 'id';

	public function agent() {
        return $this->belongsTo('App\Agent','agent_id','id');
    }

    public function campaing() {
        return $this->belongsTo('App\Campaings','campaing_id','id');
    }
}
