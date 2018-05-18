<?php

/**
 * Manages collections of database entries.
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
class Foggyline_Logger_Model_Resource_Logger_Collection
    extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('foggyline_logger/logger');
    }
}