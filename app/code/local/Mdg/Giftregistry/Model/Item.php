<?php

/**
 * Model of gift registry Items
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
class Mdg_Giftregistry_Model_Item extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('mdg_giftregistry/item');
        parent::_construct();
    }
}