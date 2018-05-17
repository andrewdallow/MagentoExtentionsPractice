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
class Foggyline_MaxOrderAmount_Helper_Data extends Mage_Core_Helper_Abstract
{
    const XML_PATH_ACTIVE = 'sales/foggyline_maxorderamount/active';
    const XML_PATH_SINGLE_ORDER_TOP_AMOUNT
        = 'sales/foggyline_maxorderamount/single_order_top_amount';
    const XML_PATH_SINGLE_ORDER_TOP_AMOUNT_MSG
        = 'sales/foggyline_maxorderamount/single_order_top_amount_msg';

    public function isModuleEnabled($moduleName = null)
    {
        if ((int)Mage::getStoreConfig(
            self::XML_PATH_ACTIVE, Mage::app()->getStore() !== 1
        )
        ) {
            return false;
        }
        return parent::isModuleEnabled($moduleName);
    }

    public function getSingleOrderTopAmount($store = null)
    {
        return (int)Mage::getStoreConfig(
            self::XML_PATH_SINGLE_ORDER_TOP_AMOUNT, $store
        );
    }

    public function getSingleOrderTopAmountMsg($store = null)
    {
        return Mage::getStoreConfig(
            self::XML_PATH_SINGLE_ORDER_TOP_AMOUNT_MSG, $store
        );
    }
}

