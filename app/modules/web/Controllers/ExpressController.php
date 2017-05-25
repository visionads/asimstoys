<?php
/**
 * Created by PhpStorm.
 * User: sr9
 * Date: 5/15/17
 * Time: 12:55 PM
 */

namespace App\Modules\Web\Controllers;


class ExpressController
{

    protected $_expressApiObj;

    public function __construct()
    {
        $this->_expressApiObj  = new ZipMoneyExpress();
    }

    /*
     * Triggred by url http://yourdomain.com.au/zipmoneypayment/getQuoteDetails
     */
    public function getQuoteDetailsAction(){
        try{
            $this->_expressApiObj->listen('quotedetails');
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    /*
     * Triggred by url http://yourdomain.com.au/zipmoneypayment/getShippingMethods
     */
    public function getShippingMethodsAction(){
        try{
            $this->_expressApiObj->listen('shippingmethods');
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    /*
     * Triggred by url http://yourdomain.com.au/zipmoneypayment/confirmShippingMethod
     */
    public function confirmShippingMethodAction(){
        try{
            $this->_expressApiObj->listen('confirmshippingmethod');
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    /*
    * Triggred by url http://yourdomain.com.au/zipmoneypayment/confirmOrder
    */
    public function confirmOrderAction(){
        try{
            $this->_expressApiObj->listen('confirmorder');
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

}