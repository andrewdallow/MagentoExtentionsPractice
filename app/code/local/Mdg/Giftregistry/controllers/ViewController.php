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
class Mdg_Giftregistry_ViewController extends Mage_Core_Controller_Front_Action
{
    public function viewAction()
    {
        $registryId = $this->getRequest()->getParam('registry_id');
        if ($registryId) {
            $entity = Mage::getModel('mdg_giftregistry/entity');
            if ($entity->load($registryId)) {
                Mage::register('loaded_registry', $entity);
                $this->loadLayout();
                $this->_initLayoutMessages('customer/session');
                $this->renderLayout();
                return $this;
            } else {
                $this->_forward('noroute');
                return $this;
            }
        }
        $this->_redirect('*/*/');
    }
    
}