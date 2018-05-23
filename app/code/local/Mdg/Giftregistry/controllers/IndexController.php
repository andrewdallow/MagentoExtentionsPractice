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
class Mdg_Giftregistry_IndexController
    extends Mage_Core_Controller_Front_Action
{
    public function preDispatch()
    {
        parent::preDispatch();
        if (!Mage::getSingleton('customer/session')->authenticate($this)) {
            $this->getResponse()->setRedirect(
                Mage::helper('customer')->getLoginUrl()
            );
            $this->setFlag('', self::FLAG_NO_DISPATCH, true);
        }
    }
    
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
    
    public function deleteAction()
    {
        try {
            $registryId = $this->getRequest()->getParam('registry_id');
            // Check that the POST request exists and registryID is specified
            if ($registryId) {
                // Check if registry entry exists in database
                if ($registry = Mage::getModel('mdg_giftregistry/entity')->load(
                    $registryId
                )
                ) {
                    $registry->delete();
                    $successMessage = Mage::helper('mdg_giftregistry')->__(
                        'Gift registry has been succesfully deleted.'
                    );
                    Mage::getSingleton('core/session')->addSuccess(
                        $successMessage
                    );
                } else {
                    throw new Exception(
                        "There was a problem deleting the registry"
                    );
                }
            }
        } catch (Exception $exception) {
            Mage::getSingleton('core/session')->addError(
                $exception->getMessage()
            );
            $this->_redirect('*/*/');
        }
        $this->_redirect('*/*/');
    }
    
    public function newAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }
    
    public function editAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }
    
    public function newPostAction()
    {
        try {
            $data = $this->getRequest()->getParams();
            $registry = Mage::getModel('mdg_giftregistry/entity');
    
            if ($this->_isValidPost($data)) {
                $this->_post($registry, $data);
            } else {
                throw new Exception("Insufficient Data provided");
            }
        } catch (Mage_Core_Exception $exception) {
            Mage::getSingleton('core/session')->addError(
                $exception->getMessage()
            );
            $this->_redirect('*/*/');
        }
        $this->_redirect('*/*/');
    }
    
    public function editPostAction()
    {
        try {
            $data = $this->getRequest()->getParams();
            $registry = Mage::getModel('mdg_giftregistry/entity');
    
            if ($this->_isValidPost($data)) {
                $registry->load($data['registry_id']);
                if ($registry) {
                    $this->_post($registry, $data);
                }
            } else {
                throw new Exception("Invalid Registry Specified");
            }
        } catch (Mage_Core_Exception $exception) {
            Mage::getSingleton('core/session')->addError(
                $exception->getMessage()
            );
            $this->_redirect('*/*/');
        }
        $this->_redirect('*/*/');
    }
    
    /**
     * Check POST request and data are valid.
     *
     * @param $data
     *
     * @return bool
     */
    private function _isValidPost($data)
    {
        return $this->getRequest()->getPost() && !empty($data);
    }
    
    private function _post(Mdg_Giftregistry_Model_Entity $registry, $data)
    {
        $customer = Mage::getSingleton('customer/session')->getCustomer();
    
        $registry->updateRegistryData($customer, $data);
        $registry->save();
    
        $successMessage = Mage::helper('mdg_giftregistry')->__(
            'Registry Successfully Saved'
        );
        Mage::getSingleton('core/session')->addSuccess(
            $successMessage
        );
    }
}