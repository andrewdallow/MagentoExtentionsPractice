<?php

/**
 * Short description for class
 *
 * Long description for class (if any)...
 *
 * @category   Zend
 * @package    Zend_Foggyline
 * @subpackage Stripe
 * @copyright  Copyright (c) 2018 ecommistry (http://www.ecommistry.com)
 * @license    http://framework.zend.com/license   BSD License
 * @version    Release: 1.0
 * @link       http://framework.zend.com/package/PackageName
 * @since      Class available since Release 1.0
 */
class Foggyline_Stripe_Model_Source_Cctype
    extends Mage_Payment_Model_Source_Cctype
{
    protected $_allowedTypes = array('AE', 'VI', 'MC', 'DI', 'JCB', 'OT');
}