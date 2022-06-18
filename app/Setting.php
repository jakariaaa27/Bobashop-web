<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table 		= 'setting';
    protected $primaryKey   = 'setting_id';
    protected $fillable 	= ['site_name',
                                'site_desc',
                                'logo_text1',
                                'logo_text2',
                                'footer_backend',
                                'background_login',
                                'logo',
                                'simple_text',
                                'footer_frontend',
                                'front_logo',
                                'jumbotron'];
}
