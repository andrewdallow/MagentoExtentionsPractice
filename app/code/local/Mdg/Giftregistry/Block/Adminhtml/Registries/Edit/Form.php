<?php

/**
 * Short description for class
 *
 * Long description for class (if any)...
 *
 * @category   Zend
 * @package    Zend_Mdg
 * @subpackage Giftrepository
 * @copyright  Copyright (c) 2018 ecommistry (http://www.ecommistry.com)
 * @license    http://framework.zend.com/license   BSD License
 * @version    Release: 1.0
 * @link       http://framework.zend.com/package/PackageName
 * @since      Class available since Release 1.0
 */
class Mdg_Giftregistry_Block_Adminhtml_Registries_Edit_Form
    extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form(
            array(
                'id'      => 'edit_form',
                'action'  => $this->getUrl(
                    '*/*/save', array(
                        'id' => $this->getRequest()->getParam('id')
                    )
                ),
                'method'  => 'post',
                'enctype' => 'multipart/form-data'
            )
        );
        $form->setUseContainer(true);
        $this->setForm($form);
        
        if (Mage::getSingleton('adminhtml/session')->getFormData()) {
            $data = Mage::getSingleton('adminhtml/session')->getFormData();
            Mage::getSingleton('adminhtml/session')->setFormData(null);
        } elseif (Mage::registry('registry_data')) {
            $data = Mage::registry('registry_data')->getData();
        }
        
        $fieldset = $form->addFieldset(
            'registry_form', array(
                'legend' => Mage::helper('mdg_giftregistry')->__(
                    'Gift Registry information'
                )
            )
        );
        
        $fieldset->addField(
            'type_id', 'text', array(
                'label'    => Mage::helper('mdg_giftregistry')->__(
                    'Registry Id'
                ),
                'class'    => 'required-entry',
                'required' => true,
                'name'     => 'type_id'
            )
        );
        
        $fieldset->addField(
            'website_id', 'text', array(
                'label'    => Mage::helper('mdg_giftregistry')->__(
                    'Website Id'
                ),
                'class'    => 'required-entry',
                'required' => true,
                'name'     => 'website_id'
            )
        );
        
        
        $fieldset->addField(
            'customer_id', 'text', array(
                'label'    => Mage::helper('mdg_giftregistry')->__(
                    'Customer ID'
                ),
                'class'    => 'required-entry',
                'required' => true,
                'name'     => 'customer_id'
            )
        );
        $fieldset->addField(
            'event_name', 'text', array(
                'label'    => Mage::helper('mdg_giftregistry')->__(
                    'Event Name'
                ),
                'class'    => 'required-entry',
                'required' => true,
                'name'     => 'event_name'
            )
        );
        $fieldset->addField(
            'event_location', 'text', array(
                'label'    => Mage::helper('mdg_giftregistry')->__(
                    'Event Location'
                ),
                'class'    => 'required-entry',
                'required' => true,
                'name'     => 'event_location'
            )
        );
        
        $fieldset->addField(
            'event_date', 'text', array(
                'label'    => Mage::helper('mdg_giftregistry')->__(
                    'Event Date'
                ),
                'class'    => 'required-entry',
                'required' => true,
                'name'     => 'event_date'
            )
        );
        
        $fieldset->addField(
            'event_country', 'text', array(
                'label'    => Mage::helper('mdg_giftregistry')->__(
                    'Event Country'
                ),
                'class'    => 'required-entry',
                'required' => true,
                'name'     => 'event_country'
            )
        );
        
        $form->setValues($data);
        return parent::_prepareForm();
    }
}