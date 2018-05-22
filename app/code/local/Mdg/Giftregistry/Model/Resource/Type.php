<?php

/**
 * Resource for event types Model
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
class Mdg_Giftregistry_Model_Resource_Type
    extends Mage_Core_Model_Resource_Db_Abstract
{
    
    /**
     * Resource initialization
     */
    protected function _construct()
    {
        $this->_init('mdg_giftregistry/type', 'type_id');
    }
}