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
    /**
     * @param $user_data
     * @param $delivery_data
     * @param $product_cart
     * @return array|string
     */
    public static function rtt_call($user_data, $delivery_data, $product_cart){

        $enquiry = new TntEnquiry();
        var_dump($enquiry->setShipDate("2016-08-19"));

        $deliveryAddress = array(
            'suburb'=>'Blacktown',
            'postCode'=>'2148',
            'state'=>'vic'
        );
        $enquiry->setDeliveryAddress($deliveryAddress);

        //dom data
        $numberOfPackages=2;
        $packWeight=5;
        $length=22;
        $width=33;
        $height=10;
        $dimensionUnit="cm";
        $weightUnit="kg";

        //DOM
        $dom = $enquiry->createBaseXML();
        $dom = $enquiry->addItem($dom,$numberOfPackages,$packWeight,$length,$width,$height,$dimensionUnit,$weightUnit);
        $dom = $dom->saveXML();
        $output = $enquiry->send($dom);

        //xml output
        $xml = simplexml_load_string($output);

        //rate
        $result = (array) $xml->ratedTransitTimeResponse->ratedProducts;

        if($result){
            $arr=[];
            foreach($result['ratedProduct'] as $value){
                $arr [] = [
                    'code'=>$value->product->code,
                    'description'=>$value->product->description,
                    'price'=>$value->quote->price,
                ];
            }
            $tnt_cost = $arr;
        }else{
            $tnt_cost = "no data found !";
        }

        print_r($tnt_cost);exit();
        return $tnt_cost;

    }

}