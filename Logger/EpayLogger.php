<?php
/**
 * Copyright (c) 2019. All rights reserved ePay Payment Solutions.
 *
 * This program is free software. You are allowed to use the software but NOT allowed to modify the software.
 * It is also not legal to do any changes to the software and distribute it in your own name / brand.
 *
 * All use of the payment modules happens at your own risk. We offer a free test account that you can use to test the module.
 *
 * @author    ePay Payment Solutions
 * @copyright ePay Payment Solutions (https://epay.dk)
 * @license   ePay Payment Solutions
 */

namespace Epay\Payment\Logger;

use Monolog\Logger;

class EpayLogger extends Logger
{
    /**
     * Add Checkout error to log
     *
     * @param mixed $id
     * @param mixed $reason
     * @return void
     */
    public function addCheckoutError($id, $reason)
    {
        $errorMessage = 'ePay Checkout Error - ID: ' . $id . ' - ' . $reason;
        $this->addRecord(self::ERROR, $errorMessage);
    }

    /**
     * Add Checkout info to log
     *
     * @param mixed $id
     * @param mixed $reason
     * @return void
     */
    public function addCheckoutInfo($id, $reason)
    {
        $errorMessage = 'ePay Checkout Info - ID: ' . $id . ' - ' . $reason;
        $this->addRecord(self::INFO, $errorMessage);
    }

    /**
     * Add ePay error to log
     *
     * @param mixed $id
     * @param mixed $reason
     * @return void
     */
    public function addEpayError($id, $reason)
    {
        $errorMessage = 'ePay Error - ID: ' . $id . ' - ' . $reason;
        $this->addRecord(self::ERROR, $errorMessage);
    }

    /**
     * Add ePay info to log
     *
     * @param mixed $id
     * @param mixed $reason
     * @return void
     */
    public function addEpayInfo($id, $reason)
    {
        $errorMessage = 'ePay Info - ID: ' . $id . ' - ' . $reason;
        $this->addRecord(self::INFO, $errorMessage);
    }

    /**
     * Add Common error to log
     *
     * @param mixed $id
     * @param mixed $reason
     * @return void
     */
    public function addCommonError($id, $reason)
    {
        $errorMessage = 'ePay Error - ID: ' . $id . ' - ' . $reason;
        $this->addRecord(self::ERROR, $errorMessage);
    }
}
