<?php

$installer = $this;

$installer->startSetup();

$model = Mage::getResourceModel('catalog/setup','catalog_setup');

$data=array(
'type'=>'int',
'input'=>'boolean', //for Yes/No dropdown
'sort_order'=>50,
'label'=>'Collect in store only?',
'global'=>Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
'required'=>'0',
'comparable'=>'0',
'searchable'=>'0',
'is_configurable'=>'1',
'user_defined'=>'1',
'visible_on_front' => 0, //want to show on frontend?
'visible_in_advanced_search' => 0,
'is_html_allowed_on_front' => 0,
'required'=> 0,
'unique'=>false,
//'apply_to' => 'configurable', //simple,configurable,bundled,grouped,virtual,downloadable
'is_configurable' => false
);

$model->addAttribute('catalog_product','collect_in_store_only',$data);

$model->addAttributeToSet(
    'catalog_product', 'Default', 'General', 'collect_in_store_only'
); //Default = attribute set, General = attribute group
$model->addAttributeToSet(
    'catalog_product', 'Customisable product', 'General', 'collect_in_store_only'
); //Default = attribute set, General = attribute group

$installer->endSetup();