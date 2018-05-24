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
class Mdg_Giftregistry_Block_Adminhtml_Registries_Edit
    extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
        $this->_objectId = 'id';
        $this->_blockGroup = 'mdg_giftregistry';
        $this->_controller = 'adminhtml_registries';
        $this->_mode = 'edit';
        
        $this->_updateButton(
            'save', 'label',
            Mage::helper('mdg_giftregistry')->__('Save Registry')
        );
        $this->_updateButton(
            'delete', 'label',
            Mage::helper('mdg_giftregistry')->__('Delete Registry')
        );
    }
    
    public function getHeaderText()
    {
        if (Mage::registry('registries_data')
            && Mage::registry(
                'registries_data'
            )->getId()
        ) {
            return Mage::helper('mdg_giftregistry')->__(
                "Edit Registry '%s'",
                $this->htmlEscape(Mage::registry('registries_data')->getTitle())
            );
        }
        return Mage::helper('mdg_giftregistry')->__('Add Registry');
    }
}