<?php

/**
 * Short description for class
 *
 * Long description for class (if any)...
 *
 * @category   Zend
 * @package    Zend_Foggyline
 * @subpackage Cargo
 * @copyright  Copyright (c) 2018 ecommistry (http://www.ecommistry.com)
 * @license    http://framework.zend.com/license   BSD License
 * @version    Release: 1.0
 * @link       http://framework.zend.com/package/PackageName
 * @since      Class available since Release 1.0
 */
class Foggyline_Cargo_Model_Shipping_Carrier_Fixy
    extends Mage_Shipping_Model_Carrier_Abstract
    implements Mage_Shipping_Model_Carrier_Interface
{
    protected $_code = 'foggyline_cargo_fixy';
    
    /**
     * Collect and get rates
     *
     * @param Mage_Shipping_Model_Rate_Request $request
     *
     * @return Mage_Shipping_Model_Rate_Result|bool|null
     */
    public function collectRates(Mage_Shipping_Model_Rate_Request $request)
    {
        if (!$this->getConfigFlag('active')
            || Mage::app()->getStore()->isAdmin()
        ) {
            return false;
        }
    
        $shippingPrice = $this->getConfigData('price');
        $grandTotal = Mage::getModel('checkout/session')
            ->getQuote()
            ->getGrandTotal();
    
        if ($grandTotal > $this->getConfigData('discountedPriceCutoff')) {
            $shippingPrice = $this->getConfigData('discountedPrice');
        }
        
        
        $result = Mage::getModel('shipping/rate_result');
        $method = Mage::getModel('shipping/rate_result_method');
        
        $method->setCarrier($this->_code);
        $method->setCarrierTitle($this->getConfigData('title'));
        
        $method->setMethod($this->_code);
        $method->setMethodTitle($this->getConfigData('name'));
    
        $method->setPrice($shippingPrice); /* temporary hard coded */
        $method->setCost($shippingPrice); /* temporary hard coded */
        
        $result->append($method);
        
        return $result;
    }
    
    /**
     * Get allowed shipping methods
     *
     * @return array
     */
    public function getAllowedMethods()
    {
        return array($this->_code => $this->getConfigData('name'));
    }
}