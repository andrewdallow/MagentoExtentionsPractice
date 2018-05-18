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
class Foggyline_Logger_Model_Log_Writer_Stream extends Zend_Log_Writer_Stream
{
    private static $_flfp;
    
    public function __construct($streamOrUrl, $mode = null)
    {
        self::$_flfp = $streamOrUrl;
        return parent::__construct($streamOrUrl, $mode);
    }
    
    protected function _write($event)
    {
        $logger = Mage::getModel('foggyline_logger/logger');
        
        $logger->setTimestamp($event['timestamp']);
        $logger->setMessage($event['message']);
        $logger->setPriority($event['priority']);
        $logger->setPriorityName($event['priorityName']);
        
        if (is_string(self::$_flfp)) {
            $logger->setFile(self::$_flfp);
        }
        
        try {
            $logger->save();
        } catch (Exception $e) {
            //echo $e->getMessage(); exit;
            /* Silently die... */
        }
        
        /* Now pass the execution to original parent code */
        return parent::_write($event);
    }
}