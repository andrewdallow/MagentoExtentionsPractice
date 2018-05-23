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
class Mdg_Giftregistry_Block_Adminhtml_Customer_Edit_Tab_Giftregistry
    extends Mage_Adminhtml_Block_Template
    implements Mage_Adminhtml_Block_Widget_Tab_Interface
{
    public function _construct()
    {
        $this->setTemplate('mdg/giftregistry/customer/main.phtml');
        parent::_construct();
    }
    
    public function getCustomerId()
    {
        return Mage::registry('current_customer')->getId();
    }
    
    public function getTabLabel()
    {
        return $this->__('GiftRegistry List');
    }
    
    public function getTabTitle()
    {
        return $this->__('Click to view the customer Gift Registries');
    }
    
    public function canShowTab()
    {
        return true;
    }
    
    public function isHidden()
    {
        return false;
    }
}