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
 * @version    $Id: admin/view/template/shipping/ocu_ukrposhta.tpl 1.2 2011-12-11 22:34:40
 */

 ?>

<?php echo $header ?>
<style>
  table.form td {vertical-align:top}
  #tab-rate td {padding:5px!important}
</style>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
      <?php echo $breadcrumb['separator'] ?><a href="<?php echo $breadcrumb['href'] ?>"><?php echo $breadcrumb['text'] ?></a>
    <?php } ?>
  </div>
  <?php if ($error) { ?>
    <div class="warning"><?php echo $error; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/shipping.png" /><?php echo $heading_title ?></h1>
      <div class="buttons">
        <a onclick="$('#setting-form').submit();" class="button"><?php echo $button_save ?></a>
        <a onclick="location='<?php echo $url_cancel ?>';" class="button"><?php echo $button_cancel ?></a>
      </div>
    </div>
    <div class="content">
    <div id="tabs" class="htabs">
      <a href="#tab-rate" class="selected"><?php echo $ocu_ukrposhta_tab_rate ?></a>
      <a href="#tab-general" class="selected"><?php echo $ocu_ukrposhta_tab_general ?></a>
      <a href="#tab-about"><?php echo $ocu_ukrposhta_tab_about ?></a>
    </div>
    <form action="<?php echo $url_action ?>" method="post" enctype="multipart/form-data" id="setting-form">
      <div id="tab-rate">
        <table id="rate-list" class="list">
          <thead>
            <tr>
              <td><?php echo $ocu_ukrposhta_text_weight ?></td>
              <td><?php echo $ocu_ukrposhta_text_by_hand_delivery ?></td>
              <td><?php echo $ocu_ukrposhta_text_precedence ?></td>
              <td><?php echo $ocu_ukrposhta_text_geo_zone ?></td>
              <td><?php echo $ocu_ukrposhta_text_customer_group ?></td>
              <td><?php echo $ocu_ukrposhta_text_cost ?></td>
              <td>&nbsp;</td>
            </tr>
          </thead>
          <?php $rate_row = 0; ?>

          <?php if (count($value_ocu_ukrposhta_rate)) { ?>
            <?php foreach ($value_ocu_ukrposhta_rate as $value_ocu_ukrposhta_rate) { ?>
              <tbody id="rate-row-<?php echo $rate_row ?>">
                <tr>
                  <td>
                    <?php echo $ocu_ukrposhta_text_from ?>
                    <input type="text" name="ocu_ukrposhta_rate[<?php echo $rate_row ?>][weight_from]" value="<?php echo (isset($value_ocu_ukrposhta_rate['weight_from']) ? $value_ocu_ukrposhta_rate['weight_from'] : false) ?>" size="3" />
                    <?php echo $ocu_ukrposhta_text_to ?>
                    <input type="text" name="ocu_ukrposhta_rate[<?php echo $rate_row ?>][weight_to]" value="<?php echo (isset($value_ocu_ukrposhta_rate['weight_to']) ? $value_ocu_ukrposhta_rate['weight_to'] : false) ?>" size="3" />
                    <select name="ocu_ukrposhta_rate[<?php echo $rate_row ?>][weight_class_id]">
                      <?php foreach ($weight_classes as $weight_class) { ?>
                        <option value="<?php echo $weight_class['weight_class_id'] ?>" <?php echo ($value_ocu_ukrposhta_rate['weight_class_id'] == $weight_class['weight_class_id'] ? 'selected="selected"' : false) ?>><?php echo $weight_class['unit'] ?></option>
                      <?php } ?>
                    </select>
                  </td>
                  <td>
                    <select name="ocu_ukrposhta_rate[<?php echo $rate_row ?>][by_hand_delivery]">
                      <?php if ($value_ocu_ukrposhta_rate[by_hand_delivery]) { ?>
                        <option value="0"><?php echo $text_no ?></option>
                        <option value="1" selected="selected"><?php echo $text_yes ?></option>
                      <?php } else { ?>
                        <option value="0"><?php echo $text_no ?></option>
                        <option value="1"><?php echo $text_yes ?></option>
                      <?php } ?>
                    </select>
                  </td>
                  <td>
                    <select name="ocu_ukrposhta_rate[<?php echo $rate_row ?>][precedence]">
                      <?php if ($value_ocu_ukrposhta_rate[precedence]) { ?>
                        <option value="0"><?php echo $text_no ?></option>
                        <option value="1" selected="selected"><?php echo $text_yes ?></option>
                      <?php } else { ?>
                        <option value="0"><?php echo $text_no ?></option>
                        <option value="1"><?php echo $text_yes ?></option>
                      <?php } ?>
                    </select>
                  </td>
                  <td>
                    <select name="ocu_ukrposhta_rate[<?php echo $rate_row ?>][geo_zone_id]">
                      <?php foreach ($geo_zones as $geo_zone) { ?>
                        <option value="<?php echo $geo_zone['geo_zone_id'] ?>" <?php echo ($value_ocu_ukrposhta_rate['geo_zone_id'] == $geo_zone['geo_zone_id'] ? 'selected="selected"' : false) ?>><?php echo $geo_zone['name'] ?></option>
                      <?php } ?>
                    </select>
                  </td>
                  <td>
                    <select name="ocu_ukrposhta_rate[<?php echo $rate_row ?>][customer_group_id]">
                      <option value="0"><?php echo $ocu_ukrposhta_text_all_groups ?></option>
                      <?php foreach ($customer_groups as $customer_group) { ?>
                        <option value="<?php echo $customer_group['customer_group_id'] ?>" <?php echo ($value_ocu_ukrposhta_rate['customer_group_id'] == $customer_group['customer_group_id'] ? 'selected="selected"' : false) ?>><?php echo $customer_group['name'] ?></option>
                      <?php } ?>
                    </select>
                  </td>
                  <td>
                    <input type="text" name="ocu_ukrposhta_rate[<?php echo $rate_row ?>][cost]" value="<?php echo (isset($value_ocu_ukrposhta_rate['cost']) ? $value_ocu_ukrposhta_rate['cost'] : false) ?>" size="6" />
                    <select name="ocu_ukrposhta_rate[<?php echo $rate_row ?>][currency_id]">
                      <?php foreach ($currencies as $currency) { ?>
                        <option value="<?php echo $currency['currency_id'] ?>" <?php echo ($value_ocu_ukrposhta_rate['currency_id'] == $currency['currency_id'] ? 'selected="selected"' : false) ?>><?php echo $currency['code'] ?></option>
                      <?php } ?>
                    </select>
                  </td>
                  <td>
                    <a onclick="$('#rate-row-<?php echo $rate_row; ?>').remove();" class="button"><?php echo $ocu_ukrposhta_text_button_remove; ?></a>
                  </td>
                </tr>
              </tbody>
              <?php $rate_row++ ?>
            <?php } ?>
          <?php } ?>
          <tfoot>
            <tr>
              <td colspan="6" id="rate-status"><p><?php echo ($rate_row == 0 ? $ocu_ukrposhta_text_rate_not_found : '&nbsp;') ?></p></td>
              <td>
                <a onclick="addRate();" class="button"><?php echo $ocu_ukrposhta_button_add_rate ?></a>
              </td>
            </tr>
          </tfoot>
        </table>
      </div>
      <div id="tab-general">
        <table class="form">
          <tr>
            <td><?php echo $ocu_ukrposhta_text_fixed_rate ?></td>
            <td>
              <label><input type="radio" name="ocu_ukrposhta_fixed_rate_status" value="0" <?php echo (!isset($value_ocu_ukrposhta_fixed_rate_status) || $value_ocu_ukrposhta_fixed_rate_status == '0' ? 'checked="checked"' : false) ?>/><?php echo $text_disabled ?></label><br />
              <label><input type="radio" name="ocu_ukrposhta_fixed_rate_status" value="1" <?php echo (isset($value_ocu_ukrposhta_fixed_rate_status) && $value_ocu_ukrposhta_fixed_rate_status == '1' ? 'checked="checked"' : false) ?>/><?php echo $ocu_ukrposhta_text_display_in_rate_table ?></label><br />
              <label><input type="radio" name="ocu_ukrposhta_fixed_rate_status" value="2" <?php echo (isset($value_ocu_ukrposhta_fixed_rate_status) && $value_ocu_ukrposhta_fixed_rate_status == '2' ? 'checked="checked"' : false) ?>/><?php echo $ocu_ukrposhta_text_display_in_rate_table_if_exclusive ?></label><br /><br />
              <input type="text" name="ocu_ukrposhta_fixed_cost" value="<?php echo (isset($value_ocu_ukrposhta_fixed_cost) ? $value_ocu_ukrposhta_fixed_cost : false) ?>" size="3" />
              <select name="ocu_ukrposhta_fixed_rate_currency_id">
                <?php foreach ($currencies as $currency) { ?>
                  <option value="<?php echo $currency['currency_id'] ?>" <?php echo (isset($value_ocu_ukrposhta_fixed_rate_currency_id) && $value_ocu_ukrposhta_fixed_rate_currency_id == $currency['currency_id'] ? 'selected="selected"' : false) ?>><?php echo $currency['code'] ?></option>
                <?php } ?>
              </select>
            </td>
          </tr>
          <tr>
            <td><?php echo $ocu_ukrposhta_text_tax_class ?></td>
            <td>
              <select name="ocu_ukrposhta_tax_class_id">
                <option value="0"><?php echo $text_none; ?></option>
                <?php foreach ($tax_classes as $tax_class) { ?>
                    <option value="<?php echo $tax_class['tax_class_id'] ?>" <?php echo (isset($value_ocu_ukrposhta_tax_class_id) && $tax_class['tax_class_id'] == $value_ocu_ukrposhta_tax_class_id ? 'selected="selected"' : false) ?>><?php echo $tax_class['title'] ?></option>
                <?php } ?>
              </select>
            </td>
          </tr>
          <tr>
            <td><?php echo $ocu_ukrposhta_text_status; ?></td>
            <td>
              <select name="ocu_ukrposhta_status">
                <?php if ($value_ocu_ukrposhta_status) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
            </td>
          </tr>
          <tr>
            <td><?php echo $ocu_ukrposhta_text_sort_order ?></td>
            <td><input type="text" name="ocu_ukrposhta_sort_order" value="<?php echo (isset($value_ocu_ukrposhta_sort_order) ? $value_ocu_ukrposhta_sort_order : false) ?>" size="1" /></td>
          </tr>
        </table>
      </div>
      <div id="tab-about"><?php echo sprintf($ocu_ukrposhta_text_about_tab_description, $heading_title, date('Y'), $current_version) ?></div>
    </form>
  </div>
</div>

<script type="text/javascript">
<!--
$('#tabs a').tabs();

var module_row = <?php echo $rate_row ?>;

function addRate() {

  html  = '<tbody id="rate-row-' + module_row + '">';
  html += '  <tr>';
  html += '    <td>';
  html += '      <?php echo $ocu_ukrposhta_text_from ?>';
  html += '      <input type="text" name="ocu_ukrposhta_rate[' + module_row + '][weight_from]" value="" size="3" />';
  html += '      <?php echo $ocu_ukrposhta_text_to ?>';
  html += '      <input type="text" name="ocu_ukrposhta_rate[' + module_row + '][weight_to]" value="" size="3" />';
  html += '      <select name="ocu_ukrposhta_rate[' + module_row + '][weight_class_id]">';
  html += '        <?php foreach ($weight_classes as $weight_class) { ?>';
  html += '          <option value="<?php echo $weight_class['weight_class_id'] ?>"><?php echo $weight_class['unit'] ?></option>';
  html += '        <?php } ?>';
  html += '      </select>';
  html += '    </td>';
  html += '    <td>';
  html += '      <select name="ocu_ukrposhta_rate[<?php echo $rate_row ?>][by_hand_delivery]">';
  html += '        <option value="0">Нет</option>';
  html += '        <option value="1">Да</option>';
  html += '      </select>';
  html += '    </td>';
  html += '    <td>';
  html += '      <select name="ocu_ukrposhta_rate[<?php echo $rate_row ?>][precedence]">';
  html += '        <option value="0">Нет</option>';
  html += '        <option value="1">Да</option>';
  html += '      </select>';
  html += '    </td>';
  html += '    <td>';
  html += '      <select name="ocu_ukrposhta_rate[' + module_row + '][geo_zone_id]">';
  html += '        <?php foreach ($geo_zones as $geo_zone) { ?>';
  html += '          <option value="<?php echo $geo_zone['geo_zone_id'] ?>"><?php echo $geo_zone['name'] ?></option>';
  html += '        <?php } ?>';
  html += '      </select>';
  html += '    </td>';
  html += '    <td>';
  html += '      <select name="ocu_ukrposhta_rate[' + module_row + '][customer_group_id]">';
  html += '        <option value="0"><?php echo $ocu_ukrposhta_text_all_groups ?></option>';
  html += '        <?php foreach ($customer_groups as $customer_group) { ?>';
  html += '          <option value="<?php echo $customer_group['customer_group_id'] ?>"><?php echo $customer_group['name'] ?></option>';
  html += '        <?php } ?>';
  html += '      </select>';
  html += '    </td>';
  html += '    <td>';
  html += '      <input type="text" name="ocu_ukrposhta_rate[' + module_row + '][cost]" value="" size="6" />';
  html += '      <select name="ocu_ukrposhta_rate[' + module_row + '][currency_id]">';
  html += '        <?php foreach ($currencies as $currency) { ?>';
  html += '          <option value="<?php echo $currency['currency_id'] ?>"><?php echo $currency['code'] ?></option>';
  html += '        <?php } ?>';
  html += '      </select>';
  html += '    </td>';
  html += '    <td>';
  html += '      <a onclick="$(\'#rate-row-' + module_row + '\').remove();" class="button"><?php echo $ocu_ukrposhta_text_button_remove; ?></a>';
  html += '    </td>';
  html += '  </tr>';
  html += '</tbody>';

  $('#rate-status').html(false);
  $('#rate-list tfoot').before(html);
  module_row++;
}
//-->
</script>

<?php echo $footer ?>
