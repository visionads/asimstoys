<?php
/**
 * Created by PhpStorm.
 * User: selimreza
 * Date: 6/17/16
 * Time: 9:18 PM
 */

namespace App\Helpers;


class RttExpress
{

    /**
     *  Submit XML to the TNT
     *  server via a Stream instead
     *  of cURL.
     *
     *  @Returns String (XML)
     **/
    public static function call( $Xml ) {

        $username = 'CIT00000000000079384';
        $password = 'Jafking1981';
        $senderAccount = '30014705';

        $postdata = http_build_query(
            array(
                'Username' => $username,
                'Password' => $password,
                'XMLRequest' => $Xml
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
            'https://www.tntexpress.com.au/Rtt/inputRequest.asp',
            false,
            $context
        );

     return $output;
    }


    /**
     * @param $user_data
     * @param $delivery_data
     * @param $product_cart
     * @return string
     */
    public static function xml(){

        #print_r($user_data);
        #print_r($delivery_data);
        #print_r($product_cart);
        $senderAccount = '30014705';

        $XmlString = "<?xml version='1.0'?>
                    <enquiry xmlns='http://www.tntexpress.com.au'>
                    <ratedTransitTimeEnquiry>
                    <cutOffTimeEnquiry>
                      <collectionAddress>
                        <suburb>Melbourne</suburb>
                        <postCode>3000</postCode>
                        <state>vic</state>
                      </collectionAddress>
                      <deliveryAddress>
                        <suburb>Blacktown</suburb>
                        <postCode>2148</postCode>
                        <state>vic</state>
                      </deliveryAddress>
                      <shippingDate>2007-11-05</shippingDate>
                      <userCurrentLocalDateTime>
                        2007-11-05T10:00:00
                      </userCurrentLocalDateTime>
                      <dangerousGoods>
                        <dangerous>false</dangerous>
                      </dangerousGoods>
                      <packageLines packageType='D'>
                        <packageLine>
                          <numberOfPackages>1</numberOfPackages>
                          <dimensions unit='cm'>
                            <length>20</length>
                            <width>20</width>
                            <height>20</height>
                          </dimensions>
                          <weight unit='kg'>
                            <weight>1</weight>
                          </weight>
                        </packageLine>
                      </packageLines>
                    </cutOffTimeEnquiry>
                    <termsOfPayment>
                      <senderAccount>$senderAccount</senderAccount>
                      <payer>S</payer>
                    </termsOfPayment>
                    </ratedTransitTimeEnquiry>
                    </enquiry>";

        $tnt = RttExpress::call( $XmlString );

        //xml parse
        $xml = simplexml_load_string($tnt);
        //rate
        $result = (array) $xml->PRICE->RATE;

        dd($result);

        if($result){
            $tnt_cost =$result[0];
        }else{
            $tnt_cost = "no data found !";
        }

        return $tnt_cost;

    }

}