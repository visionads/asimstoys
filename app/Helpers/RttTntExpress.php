<?php
/**
 * Created by PhpStorm.
 * User: selimreza
 * Date: 6/17/16
 * Time: 2:36 PM
 */

namespace App\Helpers;

use App\Helpers\TntEnquiry;
use App\Product;
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

        $date1 = strtotime($tomorrow);
        $date2 = date("l", $date1);
        $date3 = strtolower($date2);
        //ignore sunday and make the day Monday
        if ($date3 == "sunday")
        {
            $tomorrow = date("Y-m-d", strtotime("+2 day"));
        }
        if ($date3 == "saturday")
        {
            $tomorrow = date("Y-m-d", strtotime("+3 day"));
        }


        //call Enquiry Class
        $enquiry = new TntEnquiry();
        $enquiry->setShipDate($tomorrow);

        //cast as array
        $delivery_data_arr = (array)$delivery_data;
        $deliveryAddress = array(
            'suburb'=>$delivery_data_arr['suburb'],
            'postCode'=>$delivery_data_arr['postcode'],
            'state'=>'vic'
        );
        //Set Delivery address
        $enquiry->setDeliveryAddress($deliveryAddress);


        //calculate product data
        $weight = null;
        $length = null;
        $width = null;
        $height = null;

        if($product_cart)
        {
            foreach ($product_cart as $values)
            {
                $product_id = isset($values['product_id'])? $values['product_id'] : $values['id'];
                $product = Product::findOrFail($product_id);
            }
            //set value
            $weight=$product['weight'];
            $length=$product['length'];
            $width=$product['width'];
            $height=$product['height'];
        }

        /*print "Weight : ".$weight."\n";
        print "Length : ".$length."\n";
        print "Width : ".$width."\n";
        print "Height : ".$height."\n";
        print "------ \n";
        print "------ \n";*/

        //product data
        $numberOfPackages=1;
        $packWeight= $weight>0 ? $weight : 1;
        $length=$length>0 ? $length : 1;
        $width=$width>0 ? $width : 1;
        $height=$height>0 ? $height : 1;
        $dimensionUnit="cm";
        $weightUnit="kg";


        /*print "Weight : ".$weight."\n";
        print "Length : ".$length."\n";
        print "Width : ".$width."\n";
        print "Height : ".$height."\n";
        print "Dimension : ".$dimensionUnit."\n";
        print "Unit : ".$weightUnit."\n";
        print "------ \n";
        print "------ \n";*/

        //DOM
        $dom = $enquiry->createBaseXML();
        $dom = $enquiry->addItem($dom,$numberOfPackages,$packWeight,$length,$width,$height,$dimensionUnit,$weightUnit);
        $dom = $dom->saveXML();
        $output = $enquiry->send($dom);

        //xml output
        $xml = simplexml_load_string($output);


        //rate
        $result = null;
        if($xml){
            $result = (array)$xml->ratedTransitTimeResponse->ratedProducts;
        }



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
            $tnt_cost = "No Data found ! ";

        }
        
        return $tnt_cost;

    }

}