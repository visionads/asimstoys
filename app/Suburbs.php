<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suburbs extends Model
{
    protected $table = 'suburbs';

    protected $fillable = [
        'title',
        'slug',
        'state_id',
        'postcode_id',
        'status'      
    ];

    public function relGetstate(){
        return $this->hasOne('App\State', 'id', 'state_id');
    }

    public function relGetpostcode(){
        return $this->hasOne('App\Postcode', 'id', 'postcode_id');
    }
    
}