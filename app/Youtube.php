<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Youtube extends Model
{
    //

    protected $table = 'youtube_link';

    protected $fillable = [
        'link',
        'status',
        'image',
		'thumbnail'
    ];




    
}
