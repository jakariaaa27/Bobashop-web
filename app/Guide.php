<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    protected $table 		= 'guide';
    protected $primaryKey   = 'guide_id';
    protected $fillable 	= ['name',
                                'phone',
                                'email',
                                'photo',
                                'dest_id'];
}
