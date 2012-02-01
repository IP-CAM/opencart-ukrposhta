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
 * @version    $Id: catalog/language/shipping/ocu_ukrposhta.php 1.2 2011-12-11 22:34:40
 */

// Heading
$_['heading_title'] = 'Укрпочта';
$_['text_shipping'] = 'Доставка';


// Tabs
$_['ocu_ukrposhta_tab_general'] = 'Настройки';
$_['ocu_ukrposhta_tab_rate'] = 'Тарифы';
$_['ocu_ukrposhta_tab_about'] = 'О продукте';

$_['ocu_ukrposhta_button_add_rate'] = 'Добавить';

// Text
$_['ocu_ukrposhta_text_success'] = 'Настройки модуля успешно сохранены';
$_['ocu_ukrposhta_text_all_groups'] = 'Все группы';
$_['ocu_ukrposhta_text_cost'] = 'Стоимость';
$_['ocu_ukrposhta_text_weight'] = 'Вес';
$_['ocu_ukrposhta_text_by_hand_delivery'] = 'Лично в руки';
$_['ocu_ukrposhta_text_precedence'] = 'Приоритетная';
$_['ocu_ukrposhta_text_geo_zone'] = 'Гео-зона';
$_['ocu_ukrposhta_text_to'] = 'до';
$_['ocu_ukrposhta_text_customer_group'] = 'Группа покупателей';
$_['ocu_ukrposhta_text_from'] = 'от';
$_['ocu_ukrposhta_text_to'] = 'до';
$_['ocu_ukrposhta_text_button_remove'] = 'Удалить';
$_['ocu_ukrposhta_text_sort_order'] = 'Порядок сортировки<span class="help">Приоритет отображения на странице заказа по отношению к другим вариантам доставки, если модуль включен.</span>';
$_['ocu_ukrposhta_text_status'] = 'Статус модуля';
$_['ocu_ukrposhta_text_tax_class'] = 'Учитывать налог<span class="help">Дополнительный сбор для всех тарифов доставки, включая фиксированный.</span>';
$_['ocu_ukrposhta_text_fixed_rate'] = 'Фиксированный тариф<span class="help">Является альтернативой или дополнением тарифной сетки, в зависимости от текущих настроек.</span>';
$_['ocu_ukrposhta_text_display_in_rate_table'] = 'Отображать в списке тарифов';
$_['ocu_ukrposhta_text_display_in_rate_table_if_exclusive'] = 'Отображать в списке тарифов, если другие не найдены';
$_['ocu_ukrposhta_text_rate_not_found'] = 'Тарифы не установлены';

$_['ocu_ukrposhta_text_about_tab_description'] =
'<b>%s &copy; %s Все права защищены</b><br />
<br />
Модуль, обеспечивающий возможность доставки на основании сервисов &laquo;Укрпочта&raquo;
<br /><br />
Продукт разработан под управлением проекта <a href="http://opencart-ua.org" target="_blank">OpenCart Ukrainian Community</a><br />
Данное произведение распространяется по лицензии <a href="http://www.gnu.org/copyleft/gpl.html" target="_blank">GNU General Public License, Version 3</a><br /><br />
Текущая версия: %s<br /><br />
<a href="http://opencart-ua.org" target="_blank">Страница проекта</a> | <a href="http://forum.opencart-ua.org" target="_blank">Центр поддержки</a> | <a href="http://opencart-ua.org/contact" target="_blank">Связаться с нами</a>';

// Error
$_['ocu_ukrposhta_error_permission'] = 'У вас нет полномочий для изменения настроек модуля!';
$_['ocu_ukrposhta_error_empty_required_settings'] = 'Не указаны обязательные параметры';

$_['ocu_ukrposhta_error_rate_empty_weight'] = 'В тарифе необходимо указать весовой диапазон';
$_['ocu_ukrposhta_error_rate_type_weight'] = 'Неверный формат веса: только целые числа';
$_['ocu_ukrposhta_error_rate_type_cost'] = 'Неверный формат стоимости: только целые числа или числа с плавающей точкой';
$_['ocu_ukrposhta_error_rate_empty_weight_class_id'] = 'В тарифе необходимо указать единицу измерения веса';
$_['ocu_ukrposhta_error_rate_empty_cost'] = 'В тарифе необходимо указать стоимость';
$_['ocu_ukrposhta_error_rate_empty_currency_id'] = 'В тарифе необходимо указать валюту';
$_['ocu_ukrposhta_error_rate_empty_geo_zone_id'] = 'В тарифе необходимо указать гео-зону, на которую он распространяется';
