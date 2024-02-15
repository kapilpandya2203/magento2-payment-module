/*browser:true*/
/*global define*/
define(
    [
        'uiComponent',
        'Magento_Checkout/js/model/payment/renderer-list'
    ],
    function (Component, rendererList) {
        'use strict';
        rendererList.push(
            {
                type: 'epay',
                component: 'Epay_Payment/js/view/payment/method-renderer/epay-method'
            }
        );
        /**
         * Add view logic here if needed
         */
        return Component.extend({});
    }
);
