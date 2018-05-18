<?php
/**
 * Setup Logger Table in magento database.
 *
 * @category   Zend
 * @package    Zend_FoggyLine
 * @subpackage Logger
 * @copyright  Copyright (c) 2018 ecommistry (http://www.ecommistry.com)
 * @license    http://framework.zend.com/license   BSD License
 * @version    Release: 1.0
 * @link       http://framework.zend.com/package/PackageName
 * @since      Class available since Release 1.0
 */

$installer = $this;

$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('foggyline_logger/logger'))
    ->addColumn(
        'entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity' => true,
        'unsigned' => true,
        'nullable' => false,
        'primary'  => true,
    ), 'Id'
    )
    ->addColumn(
        'timestamp', Varien_Db_Ddl_Table::TYPE_CHAR, 25, array(
        'nullable' => false,
    ), 'Timestamp'
    )
    ->addColumn(
        'message', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => false,
    ), 'Message'
    )
    ->addColumn(
        'priority', Varien_Db_Ddl_Table::TYPE_INTEGER, 2, array(
        'nullable' => false,
    ), 'Priority'
    )
    ->addColumn(
        'priority_name', Varien_Db_Ddl_Table::TYPE_VARCHAR, 32, array(
        'nullable' => false,
    ), 'Priority Name'
    )
    ->addColumn(
        'file', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable' => false,
    ), 'File'
    );
$installer->getConnection()->createTable($table);

$installer->endSetup();