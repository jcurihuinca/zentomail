<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emd_Campaing extends Model
{
    protected $table = "emd_campaing";

	protected $fillable = 	[
							'id',
							'campaing_id',
							'hero_image',
							'message',
							'register_button_text',
							'register_button_link',
							'callus_button_text',
							'callus_button_link',
							'images',
							'order',
							'html_code',
							];

	protected $primaryKey = 'id';

	public function campaing() {
        return $this->belongsTo('App\Campaings','campaing_id','id');
    }
}
