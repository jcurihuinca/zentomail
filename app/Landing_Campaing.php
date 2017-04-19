<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Landing_Campaing extends Model
{
    protected $table = "landing_campaing";

	protected $fillable = 	[
							'id',
							'campaing_id',
							'logo',
							'redes',
							'title',
							'description',
							'price',
							'form',
							'slider',
							'information',
							'html_code',
							];

	protected $primaryKey = 'id';

	public function campaing() {
        return $this->belongsTo('App\Campaings','campaing_id','id');
    }
}
