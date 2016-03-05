<?php
$installer = $this;
$installer->startSetup();


$installer->addAttribute("catalog_category", "collect_in_store_only",  array(
    "type"     => "int",
    "group"     => "General Information",
    "backend"  => "",
    "frontend" => "",
    "label"    => "Collect in store only",
    "input"    => "select",
    "class"    => "",
    "source"   => "eav/entity_attribute_source_boolean",
    "global"   => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    "visible"  => true,
    "required" => false,
    "user_defined"  => false,
    "default" => "0",
    "searchable" => false,
    "filterable" => false,
    "comparable" => false,
	
    "visible_on_front"  => false,
    "unique"     => false,
    "note"       => ""

	));
$installer->endSetup();
	 