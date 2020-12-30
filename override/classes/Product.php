<?php

class Product extends ProductCore
{

    public $custom_field_naker;

    public function __construct($id_product = null, $full = false, $id_lang = null, $id_shop = null, \Context $context = null)
    {
        //new field
        self::$definition['fields']['custom_field_naker'] = [
            'type' => self::TYPE_STRING,
            'required' => false, 'size' => 255
        ];
        parent::__construct($id_product, $full, $id_lang, $id_shop, $context);
    }
}
