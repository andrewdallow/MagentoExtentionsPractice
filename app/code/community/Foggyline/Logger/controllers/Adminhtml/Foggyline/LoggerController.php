<?php

/**
 * Short description for class
 *
 * Long description for class (if any)...
 *
 * @category   Zend
 * @package    Zend_Foggyline
 * @subpackage Logger
 * @copyright  Copyright (c) 2018 ecommistry (http://www.ecommistry.com)
 * @license    http://framework.zend.com/license   BSD License
 * @version    Release: 1.0
 * @link       http://framework.zend.com/package/PackageName
 * @since      Class available since Release 1.0
 */
class Foggyline_Logger_Adminhtml_Foggyline_LoggerController
    extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout()->_setActiveMenu('system/tools/foggyline_logger');
        $this->_addContent(
            $this->getLayout()->createBlock('foggyline_logger/adminhtml_edit')
        );
        $this->renderLayout();
    }
    
    public function gridAction()
    {
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock(
                'foggyline_logger/adminhtml_edit_grid'
            )->toHtml()
        );
    }
}