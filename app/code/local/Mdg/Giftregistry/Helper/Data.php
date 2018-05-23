<?php

/**
 * Short description for class
 *
 * Long description for class (if any)...
 *
 * @category   Zend
 * @package    Zend_Mdg
 * @subpackage Giftregistry
 * @copyright  Copyright (c) 2018 ecommistry (http://www.ecommistry.com)
 * @license    http://framework.zend.com/license   BSD License
 * @version    Release: 1.0
 * @link       http://framework.zend.com/package/PackageName
 * @since      Class available since Release 1.0
 */
class Mdg_Giftregistry_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function getEventTypes()
    {
        return Mage::getModel('mdg_giftregistry/type')->getCollection();
    }
    
    public function isRegistryOwner($registryCustomerId)
    {
        $currentCustomer = Mage::getSingleton('customer/session')
            ->getCustomer();
        if ($currentCustomer
            && $currentCustomer->getId() === $registryCustomerId
        ) {
            return true;
        }
        return false;
    }
}