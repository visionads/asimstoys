<?php
/**
 * Created by PhpStorm.
 * User: selimreza
 * Date: 5/3/16
 * Time: 10:29 PM
 */

namespace App\Helpers;


class TntExpress
{

    /**
     *  Submit XML to the TNT
     *  server via a Stream instead
     *  of cURL.
     *
     *  @Returns String (XML)
     **/
    public static function sendToTNTServer( $Xml ) {

        $postdata = http_build_query(
            array(
                //For Future reference
                //the xml_in= ( the = ) is appended
                //Automatically by PHP
                'xml_in' => $Xml
            )
        );

        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );

        $context  = stream_context_create( $opts );
        $output = file_get_contents(
            'https://express.tnt.com/expressconnect/pricing/getprice',
            false,
            $context
        );

        return $output;
    }


    public static function output_xml_data(){

        $XmlString = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
                  <PRICEREQUEST>
                       <LOGIN>
                           <COMPANY>Asim</COMPANY>
                           <PASSWORD>tnt12345</PASSWORD>
                           <APPID>IN</APPID>
                       </LOGIN>

                       <PRICECHECK>
                           <RATEID>rate1</RATEID>


                               <ORIGINCOUNTRY>GB</ORIGINCOUNTRY>
                               <ORIGINTOWNNAME>Atherstone</ORIGINTOWNNAME>
                               <ORIGINPOSTCODE>CV9 2RY</ORIGINPOSTCODE>
                               <ORIGINTOWNGROUP/>

                               <DESTCOUNTRY>ES</DESTCOUNTRY>
                               <DESTTOWNNAME>Alicante</DESTTOWNNAME>
                               <DESTPOSTCODE>03006</DESTPOSTCODE>
                               <DESTTOWNGROUP/>


                           <CONTYPE>N</CONTYPE>
                           <CURRENCY>GBP</CURRENCY>
                           <WEIGHT>0.2</WEIGHT>
                           <VOLUME>0.1</VOLUME>
                           <ACCOUNT/>
                           <ITEMS>1</ITEMS>
                     </PRICECHECK>
                </PRICEREQUEST>";

        $tnt = TntExpress::sendToTNTServer($XmlString);
        //xml parse
        $xml = simplexml_load_string($tnt);
        //rate
        $result = (array) $xml->PRICE->RATE;
        if($result){
            $tnt_cost =$result[0];
        }else{
            $tnt_cost = "no data found !";
        }

        return $tnt_cost;

    }



}