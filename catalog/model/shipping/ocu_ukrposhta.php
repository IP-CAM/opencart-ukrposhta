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
 * @version    $Id: catalog/model/shipping/ocu_ukrposhta.php 1.2 2011-12-11 22:34:40
 */



/**
 * @category   OpenCart
 * @package    OCU Ukrposhta
 * @copyright  Copyright (c) 2011 Eugene Kuligin by OpenCart Ukrainian Community (http://opencart-ua.org)
 * @license    http://www.gnu.org/copyleft/gpl.html     GNU General Public License, Version 3
 */
class ModelShippingOCUUkrposhta extends Model {

    /**
     * Returns the shipping method array of the Quote
     *
     * @return array
     */
    function getQuote($address)
    {
        // Load module language
        $this->load->language('shipping/ocu_ukrposhta');


        // Set global variables
        $quote_data = array();
        $i = 0;

        $cart_weight = $this->cart->getWeight();
        $customer_group_id = $this->customer->getCustomerGroupId();
        $default_weight_unit = $this->weight->getUnit($this->config->get('config_weight_class_id'));
        $rates = $this->config->get('ocu_ukrposhta_rate') ? $this->config->get('ocu_ukrposhta_rate') : array();


        // Rate generation
        foreach ($rates as $rate) {

            // Get additional data
            $customer_geo_zone = $this->db->query("SELECT * FROM " . DB_PREFIX .
                                                  "zone_to_geo_zone WHERE country_id = '" . (int) $address['country_id'] .
                                                  "' AND geo_zone_id = '" . (int) $rate['geo_zone_id'] .
                                                  "' AND (zone_id = '" . (int) $address['zone_id'] .
                                                  "' OR zone_id = '0') LIMIT 1");

            // Convert weight class to default unit
            if ($rate['weight_class_id'] != $this->config->get('config_weight_class_id')) {

                $rate_weight_unit = $this->weight->getUnit($rate['weight_class_id']);
                $rate_weight_from = $this->weight->convert($rate['weight_from'],
                                                           $rate_weight_unit,
                                                           $default_weight_unit);
                $rate_weight_to = $this->weight->convert($rate['weight_to'],
                                                         $rate_weight_unit,
                                                         $default_weight_unit);

            } else {

                $rate_weight_from = $rate['weight_from'];
                $rate_weight_to = $rate['weight_to'];

            }

            // Rate search
            if ($cart_weight >= $rate_weight_from &&
                $cart_weight <= $rate_weight_to &&
                $customer_geo_zone->num_rows &&
                ((0 < $customer_group_id && $customer_group_id == $rate['customer_group_id']) || $rate['customer_group_id'] == '0')) {

                // Get currency code of rate
                if (!$rate_currency_code = $this->_getCurrencyCodeById($rate['currency_id'])) {
                    continue;
                }

                // Convert currency to default unit
                if ($rate_currency_code != $this->config->get('config_currency')) {
                    $rate_cost = $this->currency->convert($rate['cost'],
                                                          $rate_currency_code,
                                                          $this->config->get('config_currency'));
                } else {
                    $rate_cost = $rate['cost'];
                }


                // Generate quote item
                $quote_data[$i] = array('code' => 'ocu_ukrposhta.' . $i,
                                        'title' => sprintf($this->language->get('ocu_ukrposhta_text_weight_cost'),
                                                           $cart_weight . $default_weight_unit,
                                                           ($rate['precedence'] ? $this->language->get('ocu_ukrposhta_text_precedence') : false),
                                                           ($rate['by_hand_delivery'] ? $this->language->get('ocu_ukrposhta_text_by_hand_delivery') : false)),
                                        'cost' => $rate_cost,
                                        'tax_class_id' => $this->config->get('ocu_ukrposhta_tax_class_id'),
                                        'text' => $this->currency->format($this->tax->calculate($rate_cost,
                                                                                                $this->config->get('ocu_ukrposhta_tax_class_id'))));

                // Rate counter
                $i++;
            }
        }

        // Generate quote item
        if ($this->config->get('ocu_ukrposhta_fixed_rate_status') == '1' ||
           ($this->config->get('ocu_ukrposhta_fixed_rate_status') == '2' && $i == 0)) {

            // Get currency code of fixed rate
            if ($fixed_rate_currency_code = $this->_getCurrencyCodeById($this->config->get('ocu_ukrposhta_fixed_rate_currency_id'))) {


                // Convert currency to default unit
                if ($fixed_rate_currency_code != $this->config->get('config_currency')) {
                    $fixed_rate_cost = $this->currency->convert($this->config->get('ocu_ukrposhta_fixed_cost'),
                                                                $fixed_rate_currency_code,
                                                                $this->config->get('config_currency'));
                } else {
                    $fixed_rate_cost = $this->config->get('ocu_ukrposhta_fixed_cost');
                }

                $quote_data[$i] = array('code' => 'ocu_ukrposhta.' . $i,
                                        'title' => $this->language->get('ocu_ukrposhta_text_fixed_cost'),
                                        'cost' => $fixed_rate_cost,
                                        'tax_class_id' => $this->config->get('ocu_ukrposhta_tax_class_id'),
                                        'text' => $this->currency->format($this->tax->calculate($fixed_rate_cost, $this->config->get('ocu_ukrposhta_tax_class_id'))));
            }
        }

        // Return quote data
        if (isset($quote_data) && count($quote_data)) {
            return array('code'       => 'ocu_ukrposhta',
                         'quote'      => $quote_data,
                         'title'      => $this->language->get('heading_title'),
                         'sort_order' => $this->config->get('ocu_ukrposhta_sort_order'),
                         'error'      => false);
        } else {
            return false;
        }
    }


    /**
     * Returns currency code by id
     *
     * @return string
     */
    private function _getCurrencyCodeById($currency_id)
    {
        $result = $this->db->query("SELECT code FROM " . DB_PREFIX .
                                   "currency WHERE currency_id = '" . (int) $currency_id .
                                   "' AND status = '1' LIMIT 1");

        return ($result->num_rows) ? $result->row['code'] : false;
    }
}
