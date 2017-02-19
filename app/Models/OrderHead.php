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

class OrderHead extends Model
{

    protected $table = 'order_head';

    protected $fillable = [
        'invoice_no',
        'user_id',
        'total_discount_price',
        'vat',
        'freight_amount',
        'sub_total',
        'net_amount',
        'status',
    ];


    public function relOrderDetail()
    {
        return $this->HasMany('App\OrderDetail', 'order_head_id');
    }

    public function relCustomer(){
        return $this->belongsTo('App\Customer', 'user_id', 'id');
    }

    public function relOrderPaymentTransaction(){
        return $this->HasMany('App\OrderPaymentTransaction', 'order_head_id')->where('order_payment_transaction.status', '!=', 'cancel');
    }

}