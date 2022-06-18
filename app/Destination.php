<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $table 		= 'destination';
    protected $primaryKey   = 'dest_id';
    protected $fillable 	= ['dest_name',
                                'address',
                                'desc',
								'pict',
                                'longitude',
                                'latitude',
								'city_id',
								'district_id',
								'type_id',
								'users_id'];
}
