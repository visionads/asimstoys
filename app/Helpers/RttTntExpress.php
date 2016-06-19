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
use Faker\Provider\DateTime;

class RttTntExpress
{
    /**
     * @param $user_data
     * @param $delivery_data
     * @param $product_cart
     * @return array|string
     */
    public static function rtt_call($user_data, $delivery_data, $product_cart){

        //date
        $tomorrow = date("Y-m-d", strtotime("+1 day"));

        //call Enquiry Class
        $enquiry = new TntEnquiry();
        $enquiry->setShipDate($tomorrow);

        $deliveryAddress = array(
            'suburb'=>$delivery_data->suburb,
            'postCode'=>$delivery_data->postcode,
            'state'=>'vic'
        );
        //Set Delivery address
        $enquiry->setDeliveryAddress($deliveryAddress);

        //calculate product data
        $weight = null;
        foreach ($product_cart as $key=>$values){
            $weight+=$values['weight'];
        }

        //product data
        $numberOfPackages=1;
        $packWeight= $weight>0 ? $weight : 1;
        $length=1;
        $width=1;
        $height=1;
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
        $result = (array)$xml->ratedTransitTimeResponse->ratedProducts;

        //make the object or array
        if($result){
            $arr=[];
            foreach($result['ratedProduct'] as $value){
                $arr [] = [
                    'code'=>$value->product->code,
                    'description'=> $value->product->description,
                    'price'=>$value->quote->price,
                ];
            }
            $tnt_cost =  $arr;
        }else{
            $tnt_cost = "no data found !";
        }

        #print_r($tnt_cost);exit();
        return $tnt_cost;

    }

}