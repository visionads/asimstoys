<?php
/**
 * Created by PhpStorm.
 * User: sr9
 * Date: 5/15/17
 * Time: 12:54 PM
 */

namespace App\Modules\Web\Controllers;


use zipMoney\Webhook\Express;

class ZipMoneyExpress extends Express
{
    protected function _actionGetQuoteDetails($params)
    {
        $response = array("_actionGetQuoteDetails");

        $this->sendResponse($response);

    }

    protected function _actionGetShippingMethods($params)
    {
        $response = array("_actionGetShippingMethods");

        $this->sendResponse($response);

    }

    protected function _actionConfirmShippingMethods($params)
    {
        $response = array("_actionConfirmShippingMethods");

        $this->sendResponse($response);

    }

    protected function _actionConfirmOrder($params)
    {
        $response = array("_actionConfirmOrder");

        $this->sendResponse($response);

    }
}