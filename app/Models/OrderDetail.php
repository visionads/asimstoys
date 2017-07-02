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

class OrderDetail extends Model
{

    protected $table = 'order_detail';

    protected $fillable = [
        'order_head_id',
        'product_id',
        'product_variation_id',
        'qty',
        'color',
		'background_color',
		'plate_text',
        'price',
        'state',
        'status',
        'theme'
    ];
}