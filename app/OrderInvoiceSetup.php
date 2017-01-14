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

class OrderInvoiceSetup extends Model
{

    protected $table = 'order_invoice_setup';

    protected $fillable = [
        'type',
        'code',
        'title',
        'last_number',
        'increment',
        'status',
    ];
}