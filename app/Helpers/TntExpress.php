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



}