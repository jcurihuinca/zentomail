<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment_Methods extends Model
{
    protected $table = "payment_methods";

	protected $fillable = 	[
							'id',
							'name',
							'active',
							];

	protected $primaryKey = 'id';
}
