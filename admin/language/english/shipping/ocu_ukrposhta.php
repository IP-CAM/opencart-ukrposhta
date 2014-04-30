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

 *
 * @category   OpenCart
 * @package    OCU Ukrposhta
 * @copyright  Copyright (c) 2011 Eugene Lifescale by OpenCart Ukrainian Community (http://opencart-ukraine.tumblr.com)
 * @license    http://www.gnu.org/copyleft/gpl.html     GNU General Public License, Version 3
 * @version    $Id: catalog/language/shipping/ocu_ukrposhta.php 1.2 2011-12-11 22:34:40
 */

// Heading
$_['heading_title'] = 'Ukrposhta';
$_['text_shipping'] = 'Delivery';


// Tabs
$_['ocu_ukrposhta_tab_general'] = 'Settings';
$_['ocu_ukrposhta_tab_rate'] = 'Rates';
$_['ocu_ukrposhta_tab_about'] = 'About product';

$_['ocu_ukrposhta_button_add_rate'] = 'Add';

// Text
$_['ocu_ukrposhta_text_success'] = 'Module settings are saved successfully';
$_['ocu_ukrposhta_text_all_groups'] = 'All groups';
$_['ocu_ukrposhta_text_cost'] = 'Cost';
$_['ocu_ukrposhta_text_weight'] = 'Weight';
$_['ocu_ukrposhta_text_by_hand_delivery'] = 'By hand delivery';
$_['ocu_ukrposhta_text_precedence'] = 'Priority';
$_['ocu_ukrposhta_text_geo_zone'] = 'Geo-zone';
$_['ocu_ukrposhta_text_to'] = 'till';
$_['ocu_ukrposhta_text_customer_group'] = 'Customers group';
$_['ocu_ukrposhta_text_from'] = 'from';
$_['ocu_ukrposhta_text_to'] = 'till';
$_['ocu_ukrposhta_text_button_remove'] = 'Delete';
$_['ocu_ukrposhta_text_sort_order'] = 'Sort order<span class="help">Display priority on the order page in relation to other shipping variants, if the module is enabled.</span>';
$_['ocu_ukrposhta_text_status'] = 'Статус модуля';
$_['ocu_ukrposhta_text_tax_class'] = 'Take into account tax<span class="help">Additional charge for delivery of all rates, including fixed.</span>';
$_['ocu_ukrposhta_text_fixed_rate'] = 'Fixed rate<span class="help">It is an alternative or supplement rates scale, depending on the current settings.</span>';
$_['ocu_ukrposhta_text_display_in_rate_table'] = 'Display in the list of rates';
$_['ocu_ukrposhta_text_display_in_rate_table_if_exclusive'] = 'Display in the list of rates if others are not found';
$_['ocu_ukrposhta_text_rate_not_found'] = 'Rates are not set';

$_['ocu_ukrposhta_text_about_tab_description'] =
'<b>%s &copy; %s All rights reserved</b><br />
<br />
The module provides ability to deliver services of &quot;Ukrposhta&quot;
<br /><br />
Powered by <a href="http://opencart-ukraine.tumblr.com" target="_blank">OpenCart Ukrainian Community</a><br />
This work is licensed by <a href="http://www.gnu.org/copyleft/gpl.html" target="_blank">GNU General Public License, Version 3</a><br /><br />
Current version: %s<br /><br />
<a href="http://opencart-ukraine.tumblr.com" target="_blank">Pro</a>';

// Error
$_['ocu_ukrposhta_error_permission'] = 'You do not have the authority to change the settings of the module!';
$_['ocu_ukrposhta_error_empty_required_settings'] = 'Unspecified required parameters';

$_['ocu_ukrposhta_error_rate_empty_weight'] = 'In the rate must specify the weight range';
$_['ocu_ukrposhta_error_rate_type_weight'] = 'Invalid format of the weight: only integers';
$_['ocu_ukrposhta_error_rate_type_cost'] = 'Invalid format of the cost: only integer or floating point numbers';
$_['ocu_ukrposhta_error_rate_empty_weight_class_id'] = 'In the rate is necessary to specify the unit of weight';
$_['ocu_ukrposhta_error_rate_empty_cost'] = 'In the rate must specify the cost';
$_['ocu_ukrposhta_error_rate_empty_currency_id'] = 'In the rate must specify the currency';
$_['ocu_ukrposhta_error_rate_empty_geo_zone_id'] = 'In the rate must specify the geo-zone, to which it applies';
