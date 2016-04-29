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

class OrderPaymentTransaction extends Model
{

    protected $table = 'order_payment_transaction';

    protected $fillable = [
        'order_head_id',
        'customer_id',
        'payment_type',
        'amount',
        'date',
        'transaction_no',
        'gateway_name',
        'gateway_address',
        'status',
    ];
}