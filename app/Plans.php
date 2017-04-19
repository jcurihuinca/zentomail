<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    protected $table = "payment_methods";

	protected $fillable = 	[
							'id',
							'name',
							'emails',
							'price',
							'active',
							];

	protected $primaryKey = 'id';
}
