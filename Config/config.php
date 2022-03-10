<?php
/*@author: paybuymax application
 * @developer: paybuymax Tech Ltd
 * @year: 2022
 * @rights: Application rights reserved by paybuymax
 * @website: www.paybuymax.com
 * */
//===================WEBSITE CONFIGURARTION====================

//=============WEBSITE DESCRIPTION CONFIGURATIONS=====================//
Config::set('SITE_NAME', 'EXAMPLE SITE');
Config::set('SITE_MOTO', ' ');
Config::set('SITE_TITLE', '');
Config::set('SITE_KEYWORDS', '');
Config::set('SITE_DESCRIPTION', '');
Config::set('SITE_AUTHOR', '');
Config::set('SITE_MISSION', ' ');
Config::set('WEBSITE_DOMAIN_LINK', 'https://www.example.com');
Config::set('WEBSITE_DOMAIN_LINK_LOCAL', 'localhost');
Config::set('SITE_LUNCHED_YEAR', '2021 ');
Config::set('APPENDER', "KXBIZ");
//==================CSS FOLDER LINKS============================
Config::set('DEFAULT_STYLE', 'Webroot/Style/Default');
Config::set('BACKEND_STYLE', 'Webroot/Style/BackEndStyle');
Config::set('FRONTEND_STYLE', 'Webroot/Style/FrontEndStyle');
Config::set('FRAMEWORK_STYLE', 'Webroot/Style/Frameworks');
Config::set('MERCHANT_STYLE', 'Webroot/Style/MerchantDashboardStyle');
Config::set('COMPACTIBILITY_STYLE', 'Webroot/Style/Compactibility');
Config::set("ADMIN_STYLE", 'Webroot/Style/AdminStyle');

//==================JAVASCRIPT FOLDER LINKS============================
Config::set('DEFAULT_JAVASCRIPT', 'Webroot/JavaScript/Default');
Config::set('BACKEND_JAVASCRIPT', 'Webroot/JavaScript/BackEndJs');
Config::set('FRONTEND_JAVASCRIPT', 'Webroot/JavaScript/FrontEndJs');
Config::set('FRAMEWORK_JAVASCRIPT', 'Webroot/JavaScript/Frameworks');
Config::set('MERCHANT_JAVASCRIPT', 'Webroot/JavaScript/MerchantDashboardJs');
Config::set('COMPACTIBILITY_JAVASCRIPT', 'Webroot/JavaScript/Compactibility');
Config::set("ADMIN_JAVASCRIPT", 'Webroot/JavaScript/AdminJs');
//========ERROR FILES AND DIRECTORY==================//
Config::set("ERROR_DIRECTORY", "/Apps/Views/Errors");
Config::set("ERROR_FILE_NAME", "logs");

//=website images directory========
Config::set('WEBSITE_IMAGES','Webroot/Images/SiteImages');
//=============FONTS FOLDER======================//
Config::set('DEFAULT_FONTS_FOLDER', 'Webroot/Fonts');
//=========SOCKET SETTINGS=======================//
Config::set("SOCKET_IP_HOST", "127.0.0.1");
Config::set("SOCKET_PORT", "5006");
//================MANIFEST JSON FILE FOR THE WEBSITE=====================//
Config::set("WEBSITE_MINIFEST_FILE", "/Webroot/site.webmanifest");

//===========assign the number of seconds in a month==============//
Config::set("NUMBER_OF_SECONDS_IN_MONTH", 2.628e+6);
Config::set("NUMBER_OF_SECONDS_IN_DAY", 86400);
Config::set("NUMBER_OF_SECONDS_IN_WEEK", 604800);
// Application Config
Config::set("APP_API_KEY", "");

//=============USER POST IMAGE RESIZING WIDTH AND HEIGHT===============//
Config::set("USER_POST_IMAGE_WIDTH", 600);
Config::set("USER_POST_IMAGE_HEIGHT", 400);

Config::set("PACKAGE_DISCOUNT", 1);
//=============THIS SHOW THE WORD NEW ON TOP OF A PRODUCT IF THE PRODUCT WAS POSTED LESS OR EQUAL THE NUMBER OF DAYS ENTER HERE================//
//========ENTER NUMBER IN DAYS===================//
Config::set("PRODUCT_NEW_WORDS_TIME_IN_DAYS", 5);
//================SLIDER CONFIG IN MILI SECONDS===============================//
Config::set("SLIDER_INTERVAL_TIME", 5000);
Config::set("SLIDER_DURATION_TIME", 100);
//===============FAV ICONS FOLDER================================//
Config::set("SITE_IMAGES_ICON", "/Webroot/favs/");
Config::set("MAX_UPLOAD_FILE", 5);

//==================PAYMENT GATEWAYS CONFIGURATIONS====================//
Config::set("FLUTTERWAVE_SECRET_KEY", "");
Config::set("FLUTTERWAVE_PUBLIC_KEY", "");

Config::set("PAYSTACK_API_SEC_KEY", "");
Config::set("PAYSTACK_API_PUB_KEY", "");
Config::set("PAYMENT_CALLBACK_HOOK_URL", "");
//======GOOGLE MAP API KEY=======================//
Config::set("GMAP_KEY", "");
//==================FONTS FOLDER LINKS============================
Config::set('FONTS_FOLDER', 'Webroot/Fonts');

//==================IMAGES FOLDER LINKS============================
Config::set('SITE_IMAGES_FOLDER', '/Webroot/Images/');
Config::set('USER_IMAGES', 'Webroot/Images/Users');
Config::set('USER_PRODUCTS', 'Webroot/Images/Products');

//==================FILES FOLDER LINKS============================
Config::set('FILES_INCLUDES_FOLDER', '/Core/');
Config::set('LANGUAGE_FILES_FOLDER', '/Lang/Common/');


//==================CURRENCY SETTINGS=====================
Config::set('DEFAULT_CURRENCY', 'USD');
Config::set('DEFAULT_CURRENCY_SYMBOL', '&#x0024;');
Config::set('DEFAULT_CURRENCY_RATE', 1);
//=================SET COOKIE TIME OUT===================
Config::set('COOKIE_EXPIRATION_TIME_IN_HOURS', 90);
//===================SET PRODUCT NEW TAG MESSAGE===========
Config::set("NEW_ITEM_NAME", "New");
Config::set("NEW_ITEM_NAME_DAYS_TO_LAST", 0);
//=====================THEMING===========================
Config::set('PRIMARY_THEME', '#ffffff');
Config::set('SECONDARY_THEME', '#1F2833');
//==================LANGUAGE SETTINGS=====================
Config::set('DEFAULT_LANGUAGE', 'en');
Config::set('LANGUAGES', array('en','cn'));
//===================URL DEFAULTS=======================
Config::set('DEFAULT_CONTROLLER', 'home');
Config::set('DEFAULT_ACTION', 'index');
Config::set('DEFAULT_PARAMETER', '');
//=============USERS ADMIN SETTINGS=======================
Config::set('ADMIN', 'admin');
Config::set('USER_DASH_TITLE_TEXT', 'Example Site');
//=============FILE EXTENSIONS===========================
Config::set('FILE_EXTENSION', array('png', 'gif', 'jpeg', 'jpg', 'JPG', 'webp'));
Config::set('IMAGE_MAX_SIZE', '12097152'); //This is 2MB
//===================DATABASE SETTINGS=================
Config::set('DBHOST', 'localhost');
Config::set('DBTYPE', 'mysql');
Config::set('DBNAME', '');
Config::set('DBUSER', '');
Config::set('DBPASS', '');
Config::set('DBCHARSET', 'utf8mb4');
Config::set('USING_DB_STATUS', TRUE);//when it is false the connection to db is deactiavted, website will run in static mode
