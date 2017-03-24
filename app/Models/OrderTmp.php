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
class OrderTmp extends Model
{

    protected $table = 'order_tmp';

    protected $fillable = [
        'user_id',
        'delivery_id',
        'date',
        'product_id',
        'product_type',
        'color',
        'quantity',
        'background',
        'product_price',
        'plate_text',
        'volume',
        'weight',
        'freight_charge',
        'localpickup'
    ];





}