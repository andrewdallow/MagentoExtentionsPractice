<?php

/**
 * Short description for file
 *
 * Long description for file (if any)...
 *
 * @category   Zend
 * @package    Zend_Foggyline
 * @subpackage MaxOrderAmount
 * @copyright  Copyright (c) 2018 ecommistry (http://www.ecommistry.com)
 * @license    http://framework.zend.com/license   BSD License
 * @version    Release: 1.0
 * @link       http://framework.zend.com/package/PackageName
 * @since      Class available since Release 1.0
 */
class Foggyline_MaxOrderAmount_Model_Observer
{
    public function enforceSingleOrderLimit($observer)
    {
        Mage::log('Event Fired ...');
        $helper = Mage::helper('foggyline_maxorderamount');
        if (!$helper->isModuleEnabled()) {
            return;
        }

        $quote = $observer->getEvent()->getQuote();

        if ((float)$quote->getGrandTotal()
            > (float)$helper->getSingleOrderTopAmount()
        ) {

            $formattedPrice = Mage::helper('core')->currency(
                $helper->getSingleOrderTopAmount(), true, false
            );

            Mage::getSingleton('checkout/session')->addError(
                $helper->__(
                    $helper->getSingleOrderTopAmountMsg(), $formattedPrice
                )
            );

            Mage::app()->getFrontController()->getResponse()->setRedirect(
                Mage::getUrl('checkout/cart')
            );
            Mage::app()->getResponse()->sendResponse();
            exit;
        }
    }
}

