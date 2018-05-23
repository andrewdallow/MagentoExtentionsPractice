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
class Mdg_Giftregistry_Adminhtml_GiftregistryController
    extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
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
    
    public function saveAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }
    
    public function newAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }
    
    public function massDeleteAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }
}