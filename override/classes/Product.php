<?php
/**

 * NOTICE OF LICENSE

 *

 * This file is licenced under the Software License Agreement.

 * With the purchase or the installation of the software in your application

 * you accept the licence agreement.

 *

 * You must not modify, adapt or create derivative works of this source code

 *

 *  @author    Saif eddine Naimi

 *  @copyright 2020-2025 Naker

 *  @license   LICENSE.txt

 */

class Product extends ProductCore
{

    public $custom_field_naker;

    public function __construct(
        $id_product = null,
        $full = false,
        $id_lang = null,
        $id_shop = null,
        \Context $context = null
    ) {
        //new field
        self::$definition['fields']['custom_field_naker'] = [
            'type' => self::TYPE_STRING,
            'required' => false, 'size' => 255
        ];
        parent::__construct($id_product, $full, $id_lang, $id_shop, $context);
    }
}
