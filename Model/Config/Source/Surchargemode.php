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

namespace Epay\Payment\Model\Config\Source;

use Epay\Payment\Helper\EpayConstants as EpayConstants;

class Surchargemode implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Module rounding mode
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            [
                'value' => EpayConstants::SURCHARGE_ORDER_LINE,
                'label' => __("Create order line")
            ],
            [
                'value' => EpayConstants::SURCHARGE_SHIPMENT,
                'label' => __("Add to shipment & handling")
            ],
        ];
    }
}
