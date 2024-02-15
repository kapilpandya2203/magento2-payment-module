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

namespace Epay\Payment\Model\Api\Epay\Response\Models;

class TransactionInformationType
{
    /**
     * @var string
     */
    public $group;

    /**
     * @var int
     */
    public $authamount;
    /**
     * @var int
     */
    public $currency;
    /**
     * @var int
     */
    public $cardTypeid;

    /**
     * @var int
     */
    public $capturedamount;

    /**
     * @var int
     */
    public $creditedamount;

    /**
     * @var string
     */
    public $orderid;

    /**
     * @var string
     */
    public $description;

    /**
     * @var \dateTime
     */
    public $authdate;

    /**
     * @var \dateTime
     */
    public $captureddate;

    /**
     * @var \dateTime
     */
    public $deleteddate;

    /**
     * @var \dateTime
     */
    public $crediteddate;

    /**
     * @var string
     */
    public $status;

    /**
     * @var \Epay\Payment\Model\Api\Epay\Response\Models\TransactionHistoryInfo
     */
    public $history;

    /**
     * @var long
     */
    public $transactionid;

    /**
     * @var string
     */
    public $cardholder;

    /**
     * @var string
     */
    public $mode;

    /**
     * @var bool
     */
    public $msc;

    /**
     * @var int
     */
    public $fraudStatus;

    /**
     * @var string
     */
    public $FraudMessage;

    /**
     * @var string
     */
    public $payerCountryCode;

    /**
     * @var string
     */
    public $issuedCountryCode;

    /**
     * @var int
     */
    public $fee;

    /**
     * @var bool
     */
    public $splitpayment;

    /**
     * @var string
     */
    public $acquirer;

    /**
     * @var string
     */
    public $truncatedcardnumber;

    /**
     * @var int
     */
    public $expmonth;

    /**
     * @var int
     */
    public $expyear;
}
