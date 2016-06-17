<?php
/**
 * Created by PhpStorm.
 * User: selimreza
 * Date: 6/17/16
 * Time: 2:36 PM
 */

namespace App\Helpers;

use App\Helpers\TntEnquiry;
use DOMDocument;

class RttTntExpress
{
    public static function rtt_call(){

        $enquiry = new TntEnquiry();
        #var_dump($enquiry->setShipDate("2016-08-19"));

        $deliveryAddress = array(
            'suburb'=>'Blacktown',
            'postCode'=>'2148',
            'state'=>'vic'
        );
        $enquiry->setDeliveryAddress($deliveryAddress);

        //DOM
        $dom = $enquiry->createBaseXML();
        $dom = $enquiry->addItem($dom,2,5,22,33,10);
        $dom = $dom->saveXML();
        $output = $enquiry->send($dom);

        //xml output
        //$xml = simplexml_load_string($output);

        //rate
        //$result = (array) $xml;

        print_r($output);

        exit();
    }

}