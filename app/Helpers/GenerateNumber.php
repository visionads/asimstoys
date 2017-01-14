<?php
/**
 * Created by PhpStorm.
 * User: selimreza
 * Date: 4/22/16
 * Time: 3:31 PM
 */

namespace App\Helpers;


use App\OrderInvoiceSetup;

class GenerateNumber
{

    /*
    * $type :: Account Type(Like :: 'invoice-no')

    */
    public static function generate_number() {

        $settings = OrderInvoiceSetup::where('status','=','active')->where('type','invoice-no')->first();
        if($settings){
            $number = $settings['last_number']+$settings['increment'];
            $settings_code = $settings['code'];
            $settings_id = $settings['id'];

            $generate_voucher_number = $settings_code.str_pad($number, 7, '0', STR_PAD_LEFT);

            $array = array($generate_voucher_number, $settings_id, $number );

            //update Invoice Table for Increment
            OrderInvoiceSetup::where('id', $settings_id)->update(array('last_number' => $number));

            return  $array;
        }else{
            return  false;
        }

    }

}