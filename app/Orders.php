<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = "orders";

	protected $fillable = 	[
							'id',
							'campaing_id',
							'business_id',
							'user_id',
							'payment_method_id',
							'amount',
							'state',
							'notes',
							];

	protected $primaryKey = 'id';

	public function campaing() {
        return $this->belongsTo('App\Campaings','campaing_id','id');
    }

    public function business() {
        return $this->belongsTo('App\Business','business_id','id');
    }

    public function user() {
        return $this->belongsTo('App\Users','user_id','id');
    }

    public function Payment_method() {
        return $this->belongsTo('App\Payment_Methods','payment_method_id','id');
    }
}
