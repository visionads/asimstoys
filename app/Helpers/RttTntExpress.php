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
use DateTimeZone;
use DateTime;

#use Faker\Provider\DateTime;

class RttTntExpress
{
    /**
     * @param $user_data
     * @param $delivery_data
     * @param $product_cart
     * @return array|string
     */
    public static function rtt_call($user_data, $delivery_data, $product_cart)
    {
		
	//	echo gmdate('Y-m-d');
		//exit();
		//date_default_timezone_set('Asia/Dacca');
//		$createdDate = date_default_timezone_set('UTC');
//
//		$date1 = date_modify($createdDate, "+4 hours");
//		echo $date1;
//		exit();
//		//date_default_timezone_set('Australia/Currie');
//
//		echo $date = date('Y-m-d h:i:s');
//
//		exit();

        //$dateStarted = \DateTime::createFromFormat('D M d Y H:i:s e+', new DateTimeZone('Asia/Dacca'));
	//$date = new DateTime('Y m d', new DateTimeZone('Asia/Dacca'));
      //  echo $date->format('Y-m-d H:i:sP') . "\n";

//exit($dateStarted);
	//	echo date("Y-m-d",new DateTimeZone('Asia/Dacca')) . '<br/>';

        //date
       // $tomorrow = date("Y-m-d", strtotime("+1 day"));
	   
	   $tomorrow = gmdate('Y-m-d',strtotime("+1 day"));
		
		
        $date1 = strtotime($tomorrow);
        $date2 = gmdate("l", $date1);
        $date3 = strtolower($date2);
		
        //ignore sunday and make the day Monday
        if ($date3 == "sunday")
        {
            $tomorrow = gmdate("Y-m-d", strtotime("+4 day"));
        }
        if ($date3 == "saturday")
        {
            $tomorrow = gmdate("Y-m-d", strtotime("+5 day"));
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
                if( $values['product_group_id'] != 6 )
                {
                    if( $values['product_group_id'] != 7 )
                    {
                        //set value
                        $weight =isset($values['weight'])?$values['weight']:0;
                        $length =isset($values['length'])?$values['length']:0;
                        $width =isset($values['width'])?$values['width']:0;
                        $height =isset($values['height'])?$values['height']:0;
                    }
                }

            }

        }

        /*print "Weight : ".$weight."\n";
        print "Length : ".$length."\n";
        print "Width : ".$width."\n";
        print "Height : ".$height."\n";
        print "------ \n";
        print "------ \n";
        exit();*/


        //product data
        $numberOfPackages=1;
        $packWeight= $weight>0 ? $weight : 0;
        $length=$length>0 ? $length : 0;
        $width=$width>0 ? $width : 0;
        $height=$height>0 ? $height : 0;
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