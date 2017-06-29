<?php
/**
 * Created by PhpStorm.
 * User: sr9
 * Date: 5/15/17
 * Time: 12:53 PM
 */

namespace App\Modules\Web\Controllers;


use zipMoney\Webhook\Webhook;
use Illuminate\Auth\Guard;

class ZipMoneyWebHook extends Webhook
{

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    # The following code should be triggered by the webhook url.
    public function subscribeAction(){
        try{
            $webhookTest  = new ZipMoneyWebHook();
            $webhookTest->listen();


        } catch(Exception $e){
            echo $e->getMessage();
        }
    }


    /**
     * Process Authorisation Success
     * @param  $response
     */
    protected function _eventAuthSuccess($response){
        // Code
    }

    /**
     * Process Authorisation Failure
     * @param  $response
     */
    protected function _eventAuthFail($response){
        // Code
    }

    /**
     * Process Authorisation Review
     * @param  $response
     */
    protected function _eventAuthReview($response){
        // Code
    }

    /**
     * Process Authorisation Review
     * @param  $response
     */
    protected function _eventAuthDeclined($response){
        // Code
    }

    /**
     * Process Cancel Success
     * @param  $response
     */
    protected function _eventCancelSuccess($response){
        // Code
    }

    /**
     * Process Cancel Fail
     * @param  $response
     */
    protected function _eventCancelFail($response){
        // Code
    }

    /**
     * Process Capture Success
     * @param  $response
     */
    protected function _eventCaptureSuccess($response){
        // Code
    }

    /**
     * Process Capture Failure
     * @param  $response
     */
    protected function _eventCaptureFail($response){
        // Code
    }

    /**
     * Process Refund Success
     * @param  $response
     */
    protected function _eventRefundSuccess($response){
        // Code
    }

    /**
     * Process Refund Fail
     * @param  $response
     */
    protected function _eventRefundFail($response){
        // Code
    }

    /**
     * Process Order Cancel
     * @param  $response
     */
    protected function _eventOrderCancel($response){
        // Code
    }

    /**
     * Process Charge Success
     * @param  $response
     */
    protected function _eventChargeSuccess($response){
        // Code
    }

    /**
     * Process Charge Fail
     * @param  $response
     */
    protected function _eventChargeFail($response){
        // Code
    }

    /**
     * Process Config Update
     * @param  $response
     */
    protected function _eventConfigUpdate($response){
        // Code
    }

}