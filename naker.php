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

if (!defined('_PS_VERSION_')) {
    exit;
}


class Naker extends Module
{

    //contruct to define name, author, configuration, version ...
    public function __construct()
    {
        $this->name = 'naker';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Saif eddine Naimi';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.7',
            'max' => _PS_VERSION_
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Naker');
        $this->description = $this->l('Pimp your e-shop with 3D');

        $this->confirmUninstall = $this->l('Êtes-vous sûr de vouloir désinstaller ce module ?');

        if (!Configuration::get('NAKER')) {
            $this->warning = $this->l('Aucun nom fourni');
        }
    }

    public function install()
    {
        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }

        if (!parent::install() ||
            !$this->installSql() ||
            !$this->registerHook('header') ||
            !$this->registerHook('displayAdminProductsExtra') ||
            !$this->registerHook('displayAdminProductsMainStepLeftColumnMiddle') ||
            !$this->registerHook('displayAfterProductThumbs')
            // || !Configuration::updateValue('NAKER', 'Mentions légales')
        ) {
            return false;
        }

        return true;
    }

    public function uninstall()
    {
        if (!parent::uninstall() || !$this->unInstallSql()
            // || !Configuration::deleteByName('NAKER')
        ) {
            return false;
        }

        return true;
    }

    // Add configuration
    // public function getContent()
    // {
    //     $output = null;

    //     if (Tools::isSubmit('btnSubmit')) {
    //         $pageName = strval(Tools::getValue('NAKER'));

    //         if (
    //             !$pageName ||
    //             empty($pageName)
    //         ) {
    //             $output .= $this->displayError($this->l('Invalid Configuration value'));
    //         } else {
    //             Configuration::updateValue('NAKER', $pageName);
    //             $output .= $this->displayConfirmation($this->l('Settings updated'));
    //         }
    //     }

    //     return $output . $this->displayForm();
    // }

    // public function displayForm()
    // {
    //     // Récupère la langue par défaut
    //     $defaultLang = (int)Configuration::get('PS_LANG_DEFAULT');

    //     // Initialise les champs du formulaire dans un tableau
    //     $form = array(
    //         'form' => array(
    //             'legend' => array(
    //                 'title' => $this->l('Settings'),
    //             ),
    //             'input' => array(
    //                 array(
    //                     'type' => 'text',
    //                     'label' => $this->l('Configuration value'),
    //                     'name' => 'NAKER',
    //                     'size' => 20,
    //                     'required' => true
    //                 )
    //             ),
    //             'submit' => array(
    //                 'title' => $this->l('Save'),
    //                 'name'  => 'btnSubmit'
    //             )
    //         ),
    //     );

    //     $helper = new HelperForm();

    //     // Module, token et currentIndex
    //     $helper->module = $this;
    //     $helper->name_controller = $this->name;
    //     $helper->token = Tools::getAdminTokenLite('AdminModules');
    //     $helper->currentIndex = AdminController::$currentIndex . '&amp;configure=' . $this->name;

    //     // Langue
    //     $helper->default_form_language = $defaultLang;

    //     // Charge la valeur de NAKER depuis la base
    //     $helper->fields_value['NAKER'] = Configuration::get('NAKER');

    //     return $helper->generateForm(array($form));
    // }

    //hook for adding js and css files
    public function hookDisplayHeader()
    {
        // check if we are in product page
        if ($this->context->controller->php_self == 'product') {
            $this->context->controller->addJS($this->_path . 'views/js/naker.js');
            $this->context->controller->addCSS($this->_path . 'views/css/naker.css');
        }
    }

    // modification in DB
    protected function installSql()
    {
        $sqlInstallLang = "ALTER TABLE " . _DB_PREFIX_ . "product "
            . "ADD custom_field_naker VARCHAR(255) NULL";
        $returnSqlLang = Db::getInstance()->execute($sqlInstallLang);

        return  $returnSqlLang;
    }

    // remove modification from DB
    protected function unInstallSql()
    {

        $sqlInstallLang = "ALTER TABLE " . _DB_PREFIX_ . "product "
            . "DROP custom_field_naker";
        $returnSqlLang = Db::getInstance()->execute($sqlInstallLang);

        return $returnSqlLang;
    }


    // hook for extra fields
    // public function hookDisplayAdminProductsExtra($params)
    // {
    //     return $this->_displayHookContentBlock(__FUNCTION__);
    // }

    // protected function  _displayHookContentBlock($hookName)
    // {
    //     $this->context->smarty->assign('hookName', $hookName);
    //     return $this->display(__FILE__, 'views/templates/hook/hookBlock.tpl');
    // }


    public function hookDisplayAdminProductsMainStepLeftColumnMiddle($params)
    {
        $product = new Product($params['id_product']);
        $this->context->smarty->assign(array(
            'custom_field_naker' => $product->custom_field_naker
        ));

        return $this->display(__FILE__, 'views/templates/hook/extrafields.tpl');
    }


    // hook to display naker under product image
    public function hookDisplayAfterProductThumbs($params)
    {

        $id_product = (int)Tools::getValue('id_product');
        $product = new Product($id_product);
        $this->context->smarty->assign(array(
            'custom_field_naker' => $product->custom_field_naker,
        ));

        return $this->display(__FILE__, 'views/templates/hook/naker.tpl');
    }
}
