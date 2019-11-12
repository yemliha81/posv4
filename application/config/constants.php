<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code



define('ASSETS', FATHER_BASE.'assets/');
define('IMG', FATHER_BASE.'img/');

define('PRODUCT_PAGE', FATHER_BASE.'product/detail/');
define('SEARCH_LINK', FATHER_BASE.'product/search/');

define('CATEGORIES', FATHER_BASE.'category/cat_list/');
define('CAT_PAGE', FATHER_BASE.'category/cat_page/');
define('PAGE_DETAIL', FATHER_BASE.'page/page_detail/');

define('HOW_MUCH', FATHER_BASE.'how_much/');
define('GALLERY', FATHER_BASE.'gallery/');
define('RESERVATION_POST', FATHER_BASE.'siparis/reservation_post/');
define('CONTACT_POST', FATHER_BASE.'contact/contact_post/');

define('TABLES_PAGE', FATHER_BASE.'siparis/tables/');
define('ORDER_PAGE', FATHER_BASE.'siparis/table/');
define('PACK_ORDER_LIST', FATHER_BASE.'siparis/pack_order_list/');
define('NEW_PACK_ORDER', FATHER_BASE.'siparis/new_pack_order/');
define('ORDER_POST', FATHER_BASE.'siparis/siparis_post/');
define('CANCEL_PRINT', FATHER_BASE.'siparis/cancel_print/');
define('QTY_CHANGE', FATHER_BASE.'siparis/qty_change/');
define('UPDATE_NOTE', FATHER_BASE.'siparis/update_note/');
define('PHONE_ORDER', FATHER_BASE.'siparis/phone_order/');
define('KIOSK_ORDER', FATHER_BASE.'siparis/kiosk_order/');
define('PHONE_ORDER_POST', FATHER_BASE.'siparis/phone_order_post/');
define('SAVE_ORDER_POST', FATHER_BASE.'siparis/save_order_post/');
define('ORDER_PAYMENT_POST', FATHER_BASE.'siparis/payment_post/');
define('DISCOUNT_CANCEL', FATHER_BASE.'siparis/discount_cancel/');
define('ADD_NOTE_TO_ORDER', FATHER_BASE.'siparis/add_note_to_order/');
define('ADD_CUSTOMER_TO_ORDER', FATHER_BASE.'siparis/add_customer_to_order/');
define('ADD_CUSTOMER_TO_PHONE_ORDER', FATHER_BASE.'siparis/add_customer_to_phone_order/');
define('ADD_NEW_CUSTOMER', FATHER_BASE.'siparis/add_new_customer/');
define('CLOSE_ORDER', FATHER_BASE.'siparis/close_order/');
define('UPDATE_CUSTOMER_ORDER', FATHER_BASE.'siparis/update_customer_order/');
define('SEARCH_CUSTOMERS', FATHER_BASE.'siparis/search_customers/');
define('CLOSE_TABLE', FATHER_BASE.'siparis/close_table/');
define('GET_READY_STATUS', FATHER_BASE.'siparis/getReadyStatus/');
define('SEND_TO_PRINTER', FATHER_BASE.'siparis/send_to_printer/');
define('SEND_TO_PRINTER_PACK', FATHER_BASE.'siparis/send_to_printer_pack/');
define('SEND_TO_PRINTER_REPORT', FATHER_BASE.'siparis/send_to_printer_report/');
define('SEND_TO_PRINTER_RECEIPT', FATHER_BASE.'siparis/send_to_printer_receipt/');
define('SEND_TO_KITCHEN', FATHER_BASE.'siparis/send_to_kitchen/');


define('ZONES_LIST', FATHER_BASE.'siparis/zones_list/');
define('ADD_ZONE', FATHER_BASE.'siparis/add_zone/');
define('ADD_ZONE_POST', FATHER_BASE.'siparis/add_zone_post/');
define('UPDATE_ZONE', FATHER_BASE.'siparis/update_zone/');
define('UPDATE_ZONE_POST', FATHER_BASE.'siparis/update_zone_post/');
define('DELETE_ZONE', FATHER_BASE.'siparis/delete_zone/');

define('TABLES_LIST', FATHER_BASE.'siparis/tables_list/');
define('ZONE_TABLES_LIST', FATHER_BASE.'siparis/zone_tables_list/');
define('ADD_TABLE', FATHER_BASE.'siparis/add_table/');
define('ADD_TABLE_POST', FATHER_BASE.'siparis/add_table_post/');
define('UPDATE_TABLE', FATHER_BASE.'siparis/update_table/');
define('UPDATE_TABLE_POST', FATHER_BASE.'siparis/update_table_post/');
define('DELETE_TABLE', FATHER_BASE.'siparis/delete_table/');

define('LOGIN_SELECT_POST', FATHER_BASE.'login/login_select_post/');
define('LOGIN_PAGE', MAIN_BASE.'login/index/');
define('LOGIN_POST', FATHER_BASE.'login/login_post/');
define('USER_LOGIN', FATHER_BASE.'siparis/user_login/');
define('USER_LOGIN_POST', FATHER_BASE.'siparis/user_login_post/');
define('USERS_AUTH', FATHER_BASE.'siparis/users_auth/');
define('GET_USER_AUTH_LIST', FATHER_BASE.'siparis/get_user_auth_list/');
define('USER_AUTH_POST', FATHER_BASE.'siparis/user_auth_post/');
define('ADD_USER_POST', FATHER_BASE.'siparis/add_user_post/');
define('UPDATE_USER_POST', FATHER_BASE.'siparis/update_user_post/');
define('CHECK_USER', FATHER_BASE.'siparis/check_user/');
define('CHECK_AUTH', FATHER_BASE.'siparis/check_auth/');
define('KITCHEN_TIME_POST', FATHER_BASE.'siparis/kitchen_time_post/');
define('LOCK_TIME_POST', FATHER_BASE.'siparis/lock_time_post/');
define('LOCK_SCREEN_POST', FATHER_BASE.'siparis/lock_screen_post/');
define('CHECK_LOCK_SCREEN', FATHER_BASE.'siparis/check_lock_screen/');
define('PIN_CODE_POST', FATHER_BASE.'siparis/pin_code_post/');
define('PAYMENT_TYPE_POST', FATHER_BASE.'siparis/payment_type_post/');
define('USER_SETTINGS', FATHER_BASE.'siparis/user_settings/');
define('SETTINGS_MAIN', FATHER_BASE.'siparis/settings_main/');
define('USER_SETTINGS2', FATHER_BASE.'siparis/user_settings2/');
define('USER_SETTINGS3', FATHER_BASE.'siparis/user_settings3/');
define('GET_USER_INFO', FATHER_BASE.'siparis/get_user_info/');
define('ARCHIVE_USER', FATHER_BASE.'siparis/archive_user/');
define('UNARCHIVE_USER', FATHER_BASE.'siparis/unarchive_user/');
define('ARCHIVED_USERS', FATHER_BASE.'siparis/archived_users/');
define('ADISYON_POST', FATHER_BASE.'siparis/adisyon_post/');
define('ADISYON_GROUP_POST', FATHER_BASE.'siparis/adisyon_group_post/');
define('FIX_MENU_POST', FATHER_BASE.'siparis/fix_menu_post/');
define('WAIT_PRODUCT_POST', FATHER_BASE.'siparis/wait_product_post/');
define('LOGOUT', MAIN_BASE.'login/logout/');

define('MAIN_BOARD', FATHER_BASE.'siparis/main_board/');
define('KITCHEN_LIST', FATHER_BASE.'siparis/kitchen_list/');
define('ADD_KITCHEN_POST', FATHER_BASE.'siparis/add_kitchen_post/');
define('UPDATE_KITCHEN_POST', FATHER_BASE.'siparis/update_kitchen_post/');
define('DELETE_KITCHEN', FATHER_BASE.'siparis/delete_kitchen/');
define('KITCHEN', FATHER_BASE.'siparis/kitchen/');
define('KITCHEN_DETAIL', FATHER_BASE.'siparis/kitchen_detail/');
define('KITCHEN2', FATHER_BASE.'siparis/kitchen2/');
define('CHECK_READY', FATHER_BASE.'siparis/check_ready/');
define('GET_READY_ORDER_ROWS', FATHER_BASE.'siparis/get_ready_order_rows/');
define('RELOAD_ORDERS', FATHER_BASE.'siparis/reload_orders/');
define('RELOAD_ORDERS2', FATHER_BASE.'siparis/reload_orders2/');
define('COMPLETE_1', FATHER_BASE.'siparis/complete_1/');
define('COMPLETE_2', FATHER_BASE.'siparis/complete_2/');
define('COMPLETE_ALL', FATHER_BASE.'siparis/complete_all/');
define('COMPLETE_ALL2', FATHER_BASE.'siparis/complete_all2/');
define('DAY_PROCESS', FATHER_BASE.'siparis/day_process/');
define('DAY_START', FATHER_BASE.'siparis/day_start/');
define('DAY_END', FATHER_BASE.'siparis/day_end/');
define('DAY_END_POST', FATHER_BASE.'siparis/day_end_post/');
define('DAY_DETAIL_PAGE', FATHER_BASE.'siparis/day_details/');
define('OPEN_DAY_DETAIL_PAGE', FATHER_BASE.'siparis/open_day_details/');
define('MONTH_DETAILS', FATHER_BASE.'siparis/month_details/');

define('CASH_PROCESS', FATHER_BASE.'siparis/cash_process/');
define('CASH_PREVIEW', FATHER_BASE.'siparis/cash_preview/');
define('MAKE_PAYMENT_POST', FATHER_BASE.'siparis/make_payment_post/');

define('ALL_PRODUCT_LIST', FATHER_BASE.'siparis/all_products/');
define('PRODUCT_LIST', FATHER_BASE.'siparis/products/');
define('PRODUCT_IMAGE_LIST', FATHER_BASE.'siparis/product_image_list/');
define('UPDATE_PRO_IMG', FATHER_BASE.'siparis/update_pro_img/');
define('DELIMG', FATHER_BASE.'siparis/delImg/');
define('UPDATE_PRO_IMG_POST', FATHER_BASE.'siparis/update_pro_img_post/');
define('PRODUCT_LIST2', FATHER_BASE.'siparis/products2/');
define('CAT_PRODUCTS', FATHER_BASE.'siparis/cat_products/');
define('UPDATE_PRICES', FATHER_BASE.'siparis/price_list/');
define('UPDATE_PRICES_POST', FATHER_BASE.'siparis/update_prices_post/');
define('ADD_PRODUCT', FATHER_BASE.'siparis/add_product/');
define('ADD_PRODUCT_POST', FATHER_BASE.'siparis/add_product_post/');
define('ADD_PRODUCT_POST2', FATHER_BASE.'siparis/add_product_post2/');
define('UPDATE_PRODUCT', FATHER_BASE.'siparis/update_product/');
define('UPDATE_PRODUCT_POST', FATHER_BASE.'siparis/update_product_post/');
define('DELETE_PRODUCT', FATHER_BASE.'siparis/delete_product/');
define('DEL_PRO_PERM', FATHER_BASE.'siparis/del_pro_perm/');
define('PRO_BG_COLOR', FATHER_BASE.'siparis/pro_bg_color/');
define('CAT_BG_COLOR', FATHER_BASE.'siparis/cat_bg_color/');

define('ADD_CAT_POST', FATHER_BASE.'siparis/add_cat_post/');
define('UPDATE_CAT_POST', FATHER_BASE.'siparis/update_cat_post/');
define('REMOVE_PRO', FATHER_BASE.'siparis/remove_pro/');
define('DELETE_CAT', FATHER_BASE.'siparis/delete_cat/');

define('OPTION_GROUPS_LIST', FATHER_BASE.'siparis/option_groups_list/');
define('ADD_OPTION_GROUP', FATHER_BASE.'siparis/add_option_group/');
define('ADD_OPTION_GROUP_POST', FATHER_BASE.'siparis/add_option_group_post/');
define('UPDATE_OPTION_GROUP', FATHER_BASE.'siparis/update_option_group/');
define('UPDATE_OPTION_GROUP_POST', FATHER_BASE.'siparis/update_option_group_post/');
define('DELETE_OPTION_GROUP', FATHER_BASE.'siparis/delete_option_group/');

define('DEL_PORSION', FATHER_BASE.'siparis/del_porsion/');
define('DEL_RECIPE_PRODUCT', FATHER_BASE.'siparis/del_recipe_product/');
define('DEL_OPTION_PRODUCT', FATHER_BASE.'siparis/del_option_product/');
define('DEL_OPTION_GROUP', FATHER_BASE.'siparis/del_option_group/');

define('ADD_OPTION', FATHER_BASE.'siparis/add_option/');
define('ADD_OPTION_POST', FATHER_BASE.'siparis/add_option_post/');
define('UPDATE_OPTION', FATHER_BASE.'siparis/update_option/');
define('UPDATE_OPTION_POST', FATHER_BASE.'siparis/update_option_post/');
define('DELETE_OPTION', FATHER_BASE.'siparis/delete_option/');

define('ADD_OPTION_TO_GROUP', FATHER_BASE.'siparis/add_option_to_group/');
define('ADD_OPTION_TO_GROUP_POST', FATHER_BASE.'siparis/add_option_to_group_post/');
define('DELETE_OPTION_FROM_GROUP', FATHER_BASE.'siparis/delete_option_from_group/');

define('ADD_OPTION_TO_PRODUCT', FATHER_BASE.'siparis/add_option_to_product/');
define('ADD_OPTION_TO_PRODUCT_POST', FATHER_BASE.'siparis/add_option_to_product_post/');
define('DELETE_OPTION_FROM_PRODUCT', FATHER_BASE.'siparis/delete_option_from_product/');

define('CUSTOMERS_PAGE', FATHER_BASE.'siparis/customers/');
define('CUSTOMER_GROUPS', FATHER_BASE.'siparis/customer_groups/');
define('ADD_GROUP_POST', FATHER_BASE.'siparis/add_group_post/');
define('GROUP_UPDATE_POST', FATHER_BASE.'siparis/group_update_post/');
define('CUSTOMERS_DEBTS', FATHER_BASE.'siparis/customers_debt/');
define('CUSTOMER_DETAILS_PAGE', FATHER_BASE.'siparis/customer_details/');
define('CUSTOMER_GROUP_DETAILS_PAGE', FATHER_BASE.'siparis/customer_group_details/');
define('CUSTOMER_GROUP_UPDATE_POST', FATHER_BASE.'siparis/customer_group_update_post/');
define('CUSTOMER_UPDATE_POST', FATHER_BASE.'siparis/customer_update_post/');
define('PAY_POST', FATHER_BASE.'siparis/pay_post/');

define('GET_PRO', FATHER_BASE.'siparis/get_pro/');
define('GET_PRO2', FATHER_BASE.'siparis/get_pro2/');
define('ADD_PRO', FATHER_BASE.'siparis/add_pro/');
define('PRO_OPT_POST', FATHER_BASE.'siparis/pro_opt_post/');
define('DEL_OPT', FATHER_BASE.'siparis/del_opt/');
define('SRCH_PRO', FATHER_BASE.'siparis/srch_pro/');
define('SRCH_PRO2', FATHER_BASE.'siparis/srch_pro2/');
define('SRCH_PRO3', FATHER_BASE.'siparis/srch_pro3/');

define('GET_REST_PRICE', FATHER_BASE.'siparis/get_rest_price/');

define('ADD_PRO_TO_CAT', FATHER_BASE.'siparis/add_pro_to_cat/');

define('PURCHASE', FATHER_BASE.'siparis/purchase/');
define('STOCK_ENTRY', FATHER_BASE.'siparis/stock_entry/');
define('STOCK_ENTRY_DETAIL', FATHER_BASE.'siparis/stock_entry_detail/');
define('PURCHASE_POST', FATHER_BASE.'siparis/purchase_post/');
define('STOCK_ENTRY_POST', FATHER_BASE.'siparis/stock_entry_post/');
define('STOCK_ENTRY_UPDATE', FATHER_BASE.'siparis/stock_entry_update/');
define('STOCK_ENTRY_UPDATE_POST', FATHER_BASE.'siparis/stock_entry_update_post/');
define('STOCK_ENTRY_LIST', FATHER_BASE.'siparis/stock_entry_list/');
define('STOCK_DELETE', FATHER_BASE.'siparis/stock_delete/');

define('STOCK_COUNT_ENTRY', FATHER_BASE.'siparis/stock_count_entry/');
define('STOCK_COUNT_ENTRY_LIST', FATHER_BASE.'siparis/stock_count_entry_list/');
define('STOCK_COUNT_ENTRY_DETAIL', FATHER_BASE.'siparis/stock_count_entry_detail/');
define('STOCK_COUNT_ENTRY_POST', FATHER_BASE.'siparis/stock_count_entry_post/');
define('STOCK_COUNT_ENTRY_UPDATE', FATHER_BASE.'siparis/stock_count_entry_update/');
define('STOCK_COUNT_ENTRY_UPDATE_POST', FATHER_BASE.'siparis/stock_count_entry_update_post/');
define('STOCK_COUNT_DELETE', FATHER_BASE.'siparis/stock_count_delete/');


define('SEARCH_COMPANIES', FATHER_BASE.'siparis/search_companies/');


define('COMPANIES', FATHER_BASE.'siparis/companies/');
define('COMPANY_DETAILS_PAGE', FATHER_BASE.'siparis/company_details/');
define('ADD_COMPANY_POST', FATHER_BASE.'siparis/add_company_post/');
define('UPDATE_COMPANY_POST', FATHER_BASE.'siparis/update_company_post/');
define('COMPANY_PAYMENT_POST', FATHER_BASE.'siparis/company_payment_post/'); 
define('DELETE_COMPANY', FATHER_BASE.'siparis/delete_company/');


define('DEPOS', FATHER_BASE.'siparis/depos/');
define('DEPO_DETAILS', FATHER_BASE.'siparis/depo_details/');
define('ALL_STOCK_DETAILS', FATHER_BASE.'siparis/all_stock_details/');
define('STOCK_DETAILS', FATHER_BASE.'siparis/stock_details/');
define('STOCK_REPORT_DETAILS', FATHER_BASE.'siparis/stock_report_details/');
define('ADD_DEPO_POST', FATHER_BASE.'siparis/add_depo_post/');
define('SEARCH_DEPOS', FATHER_BASE.'siparis/search_depos/');
define('UPDATE_DEPO_POST', FATHER_BASE.'siparis/update_depo_post/');
define('UPDATE_PRODUCT_DEPO_POST', FATHER_BASE.'siparis/update_product_depo_post/');
define('DELETE_DEPO', FATHER_BASE.'siparis/delete_depo/');


define('SETTINGS', FATHER_BASE.'siparis/settings/');
define('WEB_SETTINGS', FATHER_BASE.'siparis/web_settings/');
define('UPDATE_SETTINGS', FATHER_BASE.'siparis/update_settings/');
define('BRANCH_LIST', FATHER_BASE.'siparis/branch_list/');
define('BRANCH_DETAILS_PAGE', FATHER_BASE.'siparis/branch_details_page/');
define('UPDATE_BRANCH_POST', FATHER_BASE.'siparis/update_branch_post/');
define('UPDATE_SETTINGS2', FATHER_BASE.'siparis/update_settings2/');
define('UPDATE_SLIDES', FATHER_BASE.'siparis/update_slides/');
define('UPDATE_GALLERY', FATHER_BASE.'siparis/update_gallery/');
define('UPDATE_FOOTER', FATHER_BASE.'siparis/update_footer/');
define('UPDATE_FOOTER_POST', FATHER_BASE.'siparis/update_footer_post/');
define('UPDATE_ABOUT_US', FATHER_BASE.'siparis/update_about_us/');
define('UPDATE_ABOUT_US_POST', FATHER_BASE.'siparis/update_about_us_post/');
define('UPDATE_ORDER_SETTINGS', FATHER_BASE.'siparis/update_order_settings/');
define('UPDATE_ORDER_SETTINGS_POST', FATHER_BASE.'siparis/update_order_settings_post/');
define('UPDATE_SETTINGS_POST', FATHER_BASE.'siparis/update_settings_post/');
define('GET_PAYMENTS', FATHER_BASE.'siparis/get_payments/');
define('ONLINE_ORDER_DETAILS', FATHER_BASE.'siparis/online_order_details/');
define('UPDATE_ORDER_STATUS', FATHER_BASE.'siparis/update_order_status/');

define('RESERVATION', FATHER_BASE.'siparis/reservation/');
define('RESERVATION_LIST', FATHER_BASE.'siparis/reservation_list/');
define('RESERVATION_OLD_LIST', FATHER_BASE.'siparis/reservation_old_list/');
define('RESERVATION_DAY_LIST', FATHER_BASE.'siparis/reservation_day_list/');
define('RESERVATION_DETAIL', FATHER_BASE.'siparis/reservation_detail/');
define('UPDATE_RESERVATION_POST', FATHER_BASE.'siparis/update_reservation_post/');
define('DELETE_RESERVATION', FATHER_BASE.'siparis/delete_reservation/');
define('CANCEL_RESERVATION', FATHER_BASE.'siparis/cancel_reservation/');
define('APPROVE_RESERVATION', FATHER_BASE.'siparis/approve_reservation/');
define('APPROVE2_RESERVATION', FATHER_BASE.'siparis/approve2_reservation/');

define('REPORTS_PAGE', FATHER_BASE.'siparis/reports/'); 
define('REPORTS_POST', FATHER_BASE.'siparis/reports_post/');
define('GET_ORDER_DETAILS', FATHER_BASE.'siparis/get_order_details/');
define('GET_ORDER_DETAILS_LOGS', FATHER_BASE.'siparis/get_order_details_logs/');

define('GET_ANALYSE_REPORTS', FATHER_BASE.'siparis/get_analyse_reports/');
define('GET_ADISYON_REPORTS', FATHER_BASE.'siparis/get_adisyon_reports/');

define('MENU_CATS', FATHER_BASE.'siparis/menu_categories/');
define('MENU_CATS2', FATHER_BASE.'siparis/menu_categories2/');
define('SORT_CATS', FATHER_BASE.'siparis/sort_cats/');
define('SORT_PRODUCTS', FATHER_BASE.'siparis/sort_products/');
define('ADD_MENU_POST', FATHER_BASE.'siparis/add_menu_post/');
define('ADD_MENU_CAT_POST', FATHER_BASE.'siparis/add_menu_cat_post/');
define('ADD_MENU_PRO_POST', FATHER_BASE.'siparis/add_menu_pro_post/');
define('ADD_MENU_SUB_CAT_POST', FATHER_BASE.'siparis/add_menu_sub_cat_post/');
define('CHECK_SUB_CATS', FATHER_BASE.'siparis/check_sub_cats/');
define('GET_MENUS', FATHER_BASE.'siparis/get_menus/');
define('GET_MENU_CATS', FATHER_BASE.'siparis/get_menu_cats/');
define('GET_MENU_CATS2', FATHER_BASE.'siparis/get_menu_cats2/');
define('GET_MENU_CATS3', FATHER_BASE.'siparis/get_menu_cats3/');
define('ADD_CATS_TO_MENU_POST', FATHER_BASE.'siparis/add_cats_to_menu_post/');
define('ADD_PRODUCTS_TO_CAT_POST', FATHER_BASE.'siparis/add_products_to_cat_post/');
define('ADD_MULTI_PRO_POST', FATHER_BASE.'siparis/add_multi_pro_post/');
define('GET_MENU_PRODUCTS', FATHER_BASE.'siparis/get_menu_products/');
define('GET_PRODUCTS22', FATHER_BASE.'siparis/get_products22/');
define('PRICE_UPDATE_POST', FATHER_BASE.'siparis/price_update_post/');
define('KUVER_SETTINGS_POST', FATHER_BASE.'siparis/kuver_settings_post/');
define('GARSONIYE_SETTINGS_POST', FATHER_BASE.'siparis/garsoniye_settings_post/');
define('GET_CAT_OR_PRODUCTS', FATHER_BASE.'siparis/get_cat_or_products/');
define('GET_PRO_OPTIONS', FATHER_BASE.'siparis/get_pro_options/');
define('GET_PRODUCT_OPTIONS', FATHER_BASE.'siparis/get_product_options/');
define('PRICE_FORM_POST', FATHER_BASE.'siparis/price_form_post/');
define('GET_MENU_SUB_CATS', FATHER_BASE.'siparis/get_menu_sub_cats/');
define('GET_CATS_OR_PRODUCTS', FATHER_BASE.'siparis/get_cats_or_products/');
define('CAT_SORT', FATHER_BASE.'siparis/cat_sort/');
define('PRO_SORT', FATHER_BASE.'siparis/pro_sort/');
define('DEL_MENU_CAT', FATHER_BASE.'siparis/del_menu_cat/');
define('CC_UPDATE_POST', FATHER_BASE.'siparis/cc_update_post/');
define('PRINT_RESERVATION', FATHER_BASE.'siparis/print_reservation/');
define('COST_LIST', FATHER_BASE.'siparis/cost_list/');
define('PRODUCT_COST', FATHER_BASE.'siparis/product_cost/');
define('PRINT_COST', FATHER_BASE.'siparis/print_pro_cost/');


/*NEW FUNCTIONS*/
define('G_SUB_CATS', FATHER_BASE.'siparis/g_sub_cats/');
define('G_PRODUCTS', FATHER_BASE.'siparis/g_products/');
define('ORDER_PRINTED', FATHER_BASE.'siparis/order_printed/');
define('MERGE_TABLES', FATHER_BASE.'siparis/merge_tables/');
define('CHANGE_TABLE', FATHER_BASE.'siparis/change_table/');
define('PERSON_POST', FATHER_BASE.'siparis/person_post/');
define('SUPPORT_POST', FATHER_BASE.'siparis/support_post/');

define('ADD_SUBPAYMENT_POST', FATHER_BASE.'siparis/add_subpayment_post/');
define('UPDATE_SUBPAYMENT_POST', FATHER_BASE.'siparis/update_subpayment_post/');
define('ADD_PRINTER_POST', FATHER_BASE.'siparis/add_printer_post/');
define('DELETE_PRINTER', FATHER_BASE.'siparis/delete_printer/');
define('UPDATE_PRINTER_POST', FATHER_BASE.'siparis/update_printer_post/');
define('CHANGE_SUB_P_STATUS', FATHER_BASE.'siparis/change_sub_p_status/');
define('CHECK_SP', FATHER_BASE.'siparis/check_sp/');
define('DELETE_SUBPAYMENT', FATHER_BASE.'siparis/delete_subpayment/');
define('GET_PAYMENT_TYPES', FATHER_BASE.'siparis/get_payment_types/');

define('ADD_ADDRESS_POST', FATHER_BASE.'siparis/add_address_post/');
define('GET_TOWNS', FATHER_BASE.'siparis/get_towns/');
define('GET_DISTRICT', FATHER_BASE.'siparis/get_district/');
define('DELETE_ADDRESS', FATHER_BASE.'siparis/delete_address/');

define('SYSTEM_TEST', FATHER_BASE.'siparis/system_test/');


?>
