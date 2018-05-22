<?php

/**
 * Resource for Model Entity
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
class Mdg_Giftregistry_Model_Resource_Entity
    extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init('mdg_giftregistry/entity', 'entity_id');
    }
    
    public function updateRegistryData(Mage_Customer_Model_Customer $customer,
        $data
    ) {
        try {
            if (!empty($data)) {
                $this->setCustomerId($customer->getId());
                $this->setWebsiteId($customer->getWebsiteId());
                $this->setTypeId($data['type_id']);
                $this->setEventName($data['event_name']);
                $this->setEventDate($data['event_date']);
                $this->setEventCountry($data['event_country']);
                $this->setEventLocation($data['event_location']);
            } else {
                throw new Exception(
                    'Error Processing Request: Insufficient Data Provided'
                );
            }
        } catch (Exception $exception) {
            Mage::logException($exception);
        }
        return $this;
    }
}