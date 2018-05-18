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
class Foggyline_Logger_Block_Adminhtml_Edit_Grid
    extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        
        $this->setId('foggyline_logger');
        $this->setDefaultSort('entity_id');
        $this->setUseAjax(true);
    }
    
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('foggyline_logger/logger')
            ->getCollection();
        
        $this->setCollection($collection);
        parent::_prepareCollection();
        return $this;
    }
    
    protected function _prepareColumns()
    {
        $this->addColumn(
            'entity_id', array(
                'header'   => Mage::helper('foggyline_logger')->__('ID'),
                'sortable' => true,
                'index'    => 'entity_id',
            )
        );
        
        $this->addColumn(
            'timestamp', array(
                'header' => Mage::helper('foggyline_logger')->__('Timestamp'),
                'index'  => 'timestamp',
                'type'   => 'text',
                'width'  => '170px',
            )
        );
        
        $this->addColumn(
            'message', array(
                'header' => Mage::helper('foggyline_logger')->__('Message'),
                'index'  => 'message',
                'type'   => 'text',
            )
        );
        
        return parent::_prepareColumns();
    }
    
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', array('_current' => true));
    }
}