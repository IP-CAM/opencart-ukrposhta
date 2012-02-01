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
 * @version    $Id: catalog/language/shipping/ocu_ukrposhta.php 1 2011-11-18 18:18:37
 */

// Heading
$_['heading_title'] = 'Укрпошта';
$_['text_shipping'] = 'Доставка';


// Tabs
$_['ocu_ukrposhta_tab_general'] = 'Налаштування';
$_['ocu_ukrposhta_tab_rate'] = 'Тарифи';
$_['ocu_ukrposhta_tab_about'] = 'Продукт';

$_['ocu_ukrposhta_button_add_rate'] = 'Додати';

// Text
$_['ocu_ukrposhta_text_success'] = 'Налаштування модуля успішно збережено';
$_['ocu_ukrposhta_text_all_groups'] = 'Усі групи';
$_['ocu_ukrposhta_text_cost'] = 'Вартість';
$_['ocu_ukrposhta_text_weight'] = 'Вага';
$_['ocu_ukrposhta_text_by_hand_delivery'] = 'Особисто в руки';
$_['ocu_ukrposhta_text_precedence'] = 'Пріоритетна';
$_['ocu_ukrposhta_text_geo_zone'] = 'Гео-зона';
$_['ocu_ukrposhta_text_to'] = 'до';
$_['ocu_ukrposhta_text_customer_group'] = 'Група покупців';
$_['ocu_ukrposhta_text_from'] = 'від';
$_['ocu_ukrposhta_text_to'] = 'до';
$_['ocu_ukrposhta_text_button_remove'] = 'Видалити';
$_['ocu_ukrposhta_text_sort_order'] = 'Порядок сортування<span class="help">Пріоритет відображення на сторінці замовлення по відношенню до інших варіантів доставки, якщо модуль увімкнено.</span>';
$_['ocu_ukrposhta_text_status'] = 'Статус модуля';
$_['ocu_ukrposhta_text_tax_class'] = 'Враховувати податок<span class="help">Додатковий збір для усіх тарифів доставки, враховуючи фіксований.</span>';
$_['ocu_ukrposhta_text_fixed_rate'] = 'Фіксований тариф<span class="help">Є альтернативою або додатковою опцією тарифної сітки, в залежності від поточних налаштувань.</span>';
$_['ocu_ukrposhta_text_display_in_rate_table'] = 'Відображати в списку тарифів';
$_['ocu_ukrposhta_text_display_in_rate_table_if_exclusive'] = 'Відображати в списку тарифів, якщо інші не знайдено';
$_['ocu_ukrposhta_text_rate_not_found'] = 'Тарифів не виявлено';

$_['ocu_ukrposhta_text_about_tab_description'] =
'<b>%s &copy; %s Усі права захищено</b><br />
<br />
Модуль забезпечує можливість доставки на базі сервісів &laquo;Укрпошта&raquo;.
<br /><br />
Продукт розроблено під контролем <a href="http://opencart-ua.org" target="_blank">Української спільноти OpenCart</a><br />
Програмний код розповсюджується за ліцензією <a href="http://www.gnu.org/copyleft/gpl.html" target="_blank">GNU General Public License, Version 3</a><br /><br />
Поточна версія: %s<br /><br />
<a href="http://opencart-ua.org" target="_blank">Сторінка проекту</a> | <a href="http://forum.opencart-ua.org" target="_blank">Центр підтримки</a> | <a href="http://opencart-ua.org/contact" target="_blank">Зв’язок з нами</a>';

// Error
$_['ocu_ukrposhta_error_permission'] = 'Ви не маєте повноважень для зміни налаштувань модуля!';
$_['ocu_ukrposhta_error_empty_required_settings'] = 'Не вказано обов’язкові параметри';

$_['ocu_ukrposhta_error_rate_empty_weight'] = 'В тарифі повинно бути вказано діапазон ваги';
$_['ocu_ukrposhta_error_rate_type_weight'] = 'Невірний формат ваги: тільки цілі числа';
$_['ocu_ukrposhta_error_rate_type_cost'] = 'Невірний формат вартості: тільки цілі числа або числа з плаваючою крапкою';
$_['ocu_ukrposhta_error_rate_empty_weight_class_id'] = 'В тарифі необхідно вказати одиницю ваги';
$_['ocu_ukrposhta_error_rate_empty_cost'] = 'В тарифі необхідно вказати одиницю вартість';
$_['ocu_ukrposhta_error_rate_empty_currency_id'] = 'В тарифі необхідно вказати одиницю валюту';
$_['ocu_ukrposhta_error_rate_empty_geo_zone_id'] = 'В тарифі необхідно вказати гео-зону, на покупців якої він розповсюджується';
