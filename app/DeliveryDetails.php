<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 10/26/15
 * Time: 1:13 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use Illuminate\Http\Request;

class DeliveryDetails extends Model
{

    protected $table = 'delivery_details';

    protected $fillable = [
        'first_name',
        'last_name',
        'suburb',
        'postcode',
        'state',
        'country',
        'telephone',
        'updated_at',
        'created_at',
        'address',
        'user_id',
        'email',
    ];
}