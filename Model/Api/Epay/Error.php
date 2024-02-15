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

use Epay\Payment\Model\Api\Epay\ApiEndpoints;
use Epay\Payment\Model\Api\EpayApiModels;

class Error extends Base
{
    /**
     * Get ePay error text
     *
     * @param mixed $errorcode
     * @param string $language
     * @param \Epay\Payment\Model\Api\Epay\Request\Models\Auth $auth
     * @return string
     */
    public function getEpayErrorText($errorcode, $language, $auth)
    {
        $res = "Unable to lookup errorcode";
        try {
            $param = [
                'merchantnumber' => $auth->merchantNumber,
                'language' => $language,
                'epayresponsecode' => $errorcode,
                'epayresponsestring' => -1,
                'epayresponse' => -1,
                'pwd' => $auth->pwd
            ];
            $url = $this->_getEndpoint(
                    ApiEndpoints::ENDPOINT_REMOTE
                ) . '/payment.asmx?WSDL';
            $client = $this->_initSoapClient($url);

            $result = $client->getEpayError($param);

            if ($result->getEpayErrorResult) {
                $res = '(' . $result->epayresponse . ') ' . $result->epayresponsestring;
            }
        } catch (\Exception $ex) {
            $this->_epayLogger->addEpayError("-1", $ex->getMessage());
            return $res;
        }

        return $res;
    }

    /**
     * Get PBS error text
     *
     * @param mixed $errorcode
     * @param string $language
     * @param \Epay\Payment\Model\Api\Epay\Request\Models\Auth $auth
     * @return string
     */
    public function getPbsErrorText($errorcode, $language, $auth)
    {
        $res = "Unable to lookup errorcode";
        try {
            $param = [
                'merchantnumber' => $auth->merchantNumber,
                'language' => $language,
                'pbsresponsecode' => $errorcode,
                'epayresponsestring' => 0,
                'epayresponse' => 0,
                'pwd' => $auth->pwd
            ];
            $url = $this->_getEndpoint(
                    ApiEndpoints::ENDPOINT_REMOTE
                ) . '/payment.asmx?WSDL';
            $client = $this->_initSoapClient($url);
            $result = $client->getPbsError($param);

            if ($result->getPbsErrorResult) {
                $res = '(' . $result->epayresponse . ') ' . $result->pbsresponsestring;
            }
        } catch (\Exception $ex) {
            $this->_epayLogger->addEpayError("-1", $ex->getMessage());
            return $res;
        }

        return $res;
    }
}
