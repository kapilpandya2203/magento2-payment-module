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

namespace Epay\Payment\Model\Api\Epay;

class Base extends \Magento\Framework\DataObject
{
    /**
     * List of ePay endpoints
     *
     * @return array
     */
    protected $endpoints = [
        'remote' => 'https://ssl.ditonlinebetalingssystem.dk/remote',
        'integration' => 'https://ssl.ditonlinebetalingssystem.dk/integration',
        'assets' => 'https://cdn.epay.eu'
    ];

    /**
     * @var \Epay\Payment\Helper\Data
     */
    protected $_epayHelper;

    /**
     * @var \Epay\Payment\Logger\EpayLogger
     */
    protected $_epayLogger;

    /**
     * ePay Api
     *
     * @param \Epay\Payment\Helper\Data $epayHelper
     * @param \Epay\Payment\Logger\EpayLogger $epayLogger
     * @param array $data
     */
    public function __construct(
        \Epay\Payment\Helper\Data $epayHelper,
        \Epay\Payment\Logger\EpayLogger $epayLogger,
        array $data = []
    ) {
        parent::__construct($data);
        $this->_epayHelper = $epayHelper;
        $this->_epayLogger = $epayLogger;
    }

    /**
     * Return the address of the endpoint type
     *
     * @param string $type
     * @return string
     */
    public function _getEndpoint($type)
    {
        return $this->endpoints[$type];
    }

    /**
     * Initilize a Soap Client
     *
     * @param string $wsdlUrl
     * @return \Laminas\Soap\Client
     */
    protected function _initSoapClient($wsdlUrl)
    {
        $soapClient = new \Laminas\Soap\Client($wsdlUrl);
        $soapClient->setSoapVersion(2);

        return $soapClient;
    }
}
