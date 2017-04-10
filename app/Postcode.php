<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postcode extends Model
{
    protected $table = 'postcodes';

    protected $fillable = [
        'state_id',
        'status',
        'status',
        'title',
        'slug'      
    ];

    public function relGetstate(){
        return $this->hasOne('App\State', 'id', 'state_id');
    }
}