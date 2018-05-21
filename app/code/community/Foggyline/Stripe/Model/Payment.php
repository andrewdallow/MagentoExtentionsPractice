<?php
require_once __DIR__ . '/../lib/Stripe.php';

/**
 * Short description for class
 *
 * Long description for class (if any)...
 *
 * @category   Zend
 * @package    Zend_Foggyline
 * @subpackage Stripe
 * @copyright  Copyright (c) 2018 ecommistry (http://www.ecommistry.com)
 * @license    http://framework.zend.com/license   BSD License
 * @version    Release: 1.0
 * @link       http://framework.zend.com/package/PackageName
 * @since      Class available since Release 1.0
 */
class Foggyline_Stripe_Model_Payment extends Mage_Payment_Model_Method_Cc
{
    protected $_code = 'foggyline_stripe';
    protected $_isGateway = true;
    protected $_canCapture = true;
    protected $_supportedCurrencyCodes = array('USD');
    protected $_minOrderTotal = 0.5;
    
    public function __construct()
    {
        \Stripe\Stripe::setApiKey($this->getConfigData('api_key'));
    }
    
    public function capture(Varien_Object $payment, $amount)
    {
        $order = $payment->getOrder();
        $billingAddress = $order->getBillingAddress();
        
        try {
            $charge = \Stripe\Charge::create(
                array(
                    'amount'      => $amount * 100,
                    'currency'    => strtolower($order->getBaseCurrencyCode()),
                    'card'        => array(
                        'number'          => $payment->getCcNumber(),
                        'exp_month'       => sprintf(
                            '%02d', $payment->getCcExpMonth()
                        ),
                        'exp_year'        => $payment->getCcExpYear(),
                        'cvc'             => $payment->getCcCid(),
                        'name'            => $billingAddress->getName(),
                        'address_line1'   => $billingAddress->getStreet(1),
                        'address_line2'   => $billingAddress->getStreet(2),
                        'address_zip'     => $billingAddress->getPostcode(),
                        'address_state'   => $billingAddress->getRegion(),
                        'address_country' => $billingAddress->getCountry()
                    ),
                    'description' => sprintf(
                        '#%s, %s', $order->getIncrementId(),
                        $order->getCustomerEmail()
                    )
                )
            );
        } catch (Exception $exception) {
            $this->debugData($exception->getMessage());
            Mage::throwException(
                Mage::helper('foggyline_sprite')->__('Payment capturing error.')
            );
            
        }
        $payment->setTransactionId($charge->id)->setIsTransactionClosed();
        
        return $this;
        
    }
    
    public function isAvailable($quote = null)
    {
        if ($quote && $quote->getBaseGrandTotal() < $this->_minOrderTotal) {
            return false;
        }
        return true;
    }
    
    public function canUseForCurrency($currencyCode)
    {
        if (!in_array($currencyCode, $this->_supportedCurrencyCodes)) {
            return false;
        }
        
        return true;
    }
    
}