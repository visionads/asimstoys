<?php
/**
 * Created by PhpStorm.
 * User: etsb
 * Date: 11/24/15
 * Time: 4:36 PM
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use Illuminate\Http\Request;
class CouponCode extends Model
{

    protected $table = 'coupon_code';

    protected $fillable = [
        'code',
        'title',
        'value',
        'expiry_date',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];



    
}