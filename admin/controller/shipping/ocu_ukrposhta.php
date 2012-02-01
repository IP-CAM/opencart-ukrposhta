<?php

/**
 * OpenCart Ukrainian Community
 *
 * LICENSE
 *
 * This source file is subject to the GNU General Public License, Version 3
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/copyleft/gpl.html
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@opencart-ua.org so we can send you a copy immediately.
 *
 * @category   OpenCart
 * @package    OCU Ukrposhta
 * @copyright  Copyright (c) 2011 Eugene Kuligin by OpenCart Ukrainian Community (http://opencart-ua.org)
 * @license    http://www.gnu.org/copyleft/gpl.html     GNU General Public License, Version 3
 * @version    $Id: admin/controller/shipping/ocu_ukrposhta.php 1.2 2011-12-11 22:34:40
 */



/**
 * @category   OpenCart
 * @package    OCU Ukrposhta
 * @copyright  Copyright (c) 2011 Eugene Kuligin by OpenCart Ukrainian Community (http://opencart-ua.org)
 * @license    http://www.gnu.org/copyleft/gpl.html     GNU General Public License, Version 3
 */
class ControllerShippingOCUUkrposhta extends Controller
{
    /**
     * Error string
     *
     * @var string
     */
    private $_error;

    /**
     * Current version (About info, etc.)
     *
     * @var string
     */
    private $_version = '1.2 Beta';


    /**
     * System function, required by default
     */
    public function index()
    {
        $this->_init();

        // If form is posted & receiving data is valid
        if (count($this->request->post) && $this->_validate()) {
            // Save changes to DB
            $this->model_setting_setting->editSetting('ocu_ukrposhta',
                                                      $this->request->post);

            // Set success message
            $this->session->data['success'] = $this->language->get('ocu_ukrposhta_text_success');

            // Redirect into the main page
            $this->redirect($this->url->link('extension/shipping',
                                             'token=' . $this->session->data['token'],
                                             'SSL'));
        }

        $this->_view();
    }

    /**
     * Breadcrumbs generation
     *
     * @return array
     */
    private function _breadcrumbs()
    {
        $breadcrumbs[] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => false
        );
        $breadcrumbs[] = array(
            'text'      => $this->language->get('text_shipping'),
            'href'      => $this->url->link('extension/shipping', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );
        $breadcrumbs[] = array(
            'text'      => $this->language->get('heading_title'),
            'href'      => $this->url->link('shipping/ocu_ukrposhta', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );

        return $breadcrumbs;
    }

    /**
     * Basic class initialization
     *
     */
    private function _init()
    {
        // Load dependencies
        $this->load->model('setting/setting');
        $this->load->model('localisation/currency');
        $this->load->model('localisation/geo_zone');
        $this->load->model('localisation/weight_class');
        $this->load->model('localisation/tax_class');
        $this->load->model('sale/customer_group');

        // Load language
        foreach ($this->load->language('shipping/ocu_ukrposhta') as $key => $value) {
            $this->data[$key] = $value;
        }

        // Set by default form_values
        $this->data['value_ocu_ukrposhta_rate'] = array();

        foreach ($this->model_setting_setting->getSetting('ocu_ukrposhta') as $key => $value) {
            $this->data['value_' . $key] = $value;
        }
    }

    /**
     * Basic view initialization
     *
     */
    private function _view()
    {
        // Set title
        $this->document->setTitle($this->language->get('heading_title'));

        // Set view variables
        $this->data['breadcrumbs']     = $this->_breadcrumbs();
        $this->data['error']           = $this->_error;
        $this->data['current_version'] = $this->_version;

        $this->data['weight_classes']  = $this->model_localisation_weight_class->getWeightClasses();
        $this->data['currencies']      = $this->model_localisation_currency->getCurrencies();
        $this->data['geo_zones']       = $this->model_localisation_geo_zone->getGeoZones();
        $this->data['customer_groups'] = $this->model_sale_customer_group->getCustomerGroups();
        $this->data['tax_classes']     = $this->model_localisation_tax_class->getTaxClasses();

        $this->data['url_action']      = $this->url->link('shipping/ocu_ukrposhta', 'token=' . $this->session->data['token'], 'SSL');
        $this->data['url_cancel']      = $this->url->link('extension/shipping', 'token=' . $this->session->data['token'], 'SSL');

        $this->data['rates'] = array();


        // If we have new form values from request
        foreach ($this->request->post as $key => $value) {
            $this->data['value_' . $key] = $value;
        }

        // Template rendering
        $this->children = array('common/header', 'common/footer');
        $this->template = 'shipping/ocu_ukrposhta.tpl';
        $this->response->setOutput($this->render());
    }

    /**
     * Form request validation
     *
     * @return boolean
     */
    private function _validate()
    {
        if (!$this->user->hasPermission('modify', 'shipping/ocu_ukrposhta')) {
            $this->_error = $this->language->get('ocu_ukrposhta_error_permission');
            return false;
        }

        // $this->_error = $this->language->get('ocu_ukrposhta_error_empty_required_settings');
        // return false;

        if (isset($this->request->post['ocu_ukrposhta_rate'])) {
            foreach ($this->request->post['ocu_ukrposhta_rate'] as $ocu_ukrposhta_rate) {

                switch (true) {

                    // Check for available required params
                    case empty($ocu_ukrposhta_rate['weight_from']):
                        $this->_error = $this->language->get('ocu_ukrposhta_error_rate_empty_weight');
                        return false;
                    break;

                    case empty($ocu_ukrposhta_rate['weight_to']):
                        $this->_error = $this->language->get('ocu_ukrposhta_error_rate_empty_weight');
                        return false;
                    break;

                    case !$ocu_ukrposhta_rate['weight_class_id']:
                        $this->_error = $this->language->get('ocu_ukrposhta_error_rate_empty_weight_class_id');
                        return false;
                    break;

                    case empty($ocu_ukrposhta_rate['cost']):
                        $this->_error = $this->language->get('ocu_ukrposhta_error_rate_empty_cost');
                        return false;
                    break;

                    case !$ocu_ukrposhta_rate['currency_id']:
                        $this->_error = $this->language->get('ocu_ukrposhta_error_rate_empty_currency_id');
                        return false;
                    break;

                    case !$ocu_ukrposhta_rate['geo_zone_id']:
                        $this->_error = $this->language->get('ocu_ukrposhta_error_rate_empty_geo_zone_id');
                        return false;
                    break;

                    // Incoming type check
                    case !preg_match('/^\d+$/', $ocu_ukrposhta_rate['weight_from']):
                        $this->_error = $this->language->get('ocu_ukrposhta_error_rate_type_weight');
                        return false;
                    break;

                    case !preg_match('/^\d+$/', $ocu_ukrposhta_rate['weight_from']):
                        $this->_error = $this->language->get('ocu_ukrposhta_error_rate_type_weight');
                        return false;
                    break;

                    case !preg_match('/^\d+$|^\d+\.\d+$/', $ocu_ukrposhta_rate['cost']):
                        $this->_error = $this->language->get('ocu_ukrposhta_error_rate_type_cost');
                        return false;
                    break;
                }
            }
        }

        return true;
    }
}

