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
class Foggyline_Logger_Block_Adminhtml_Edit
    extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'foggyline_logger';
        $this->_controller = 'adminhtml_edit';
        $this->_headerText = Mage::helper('foggyline_logger')->__(
            'Logger - Log entries of everything that passed through Mage::log();'
        );
        
        parent::__construct();
        
        $this->_removeButton('add');
    }
}