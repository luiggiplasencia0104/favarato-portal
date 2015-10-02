<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

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
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/* DEFINICION DE CONSTANTES */
if (defined('ENVIRONMENT')) {
    switch (ENVIRONMENT) {
        case 'development':
            define('SERVER_NAME', 'localhost:8081/favarato');
            define('DB_USER', 'root');
            define('DB_PASS', '');
            define('DB_NAME', 'bd_favarato');
            define('EXT_JS', '');
            define('EXT_CSS', '');
            define('SMPT_HOST', 'ssl://smtp.gmail.com');
            define('SMPT_PORT', 465);
            define('SMPT_USER', 'gino.chirinos@ibusplus.com');
            define('SMPT_PASS', 'chelsea_chelsea');
            define('SMPT_IDENTITY', 'Web Master Favarato Express Inc.');
            break;

        case 'testing':
            define('SERVER_NAME', 'test.favaratotrade.com');
            define('DB_USER', 'favaratoadmin');
            define('DB_PASS', 'favarato_admin');
            define('DB_NAME', 'test_favarato_express');
            define('EXT_JS', '');
            define('EXT_CSS', '');
            define('SMPT_HOST', 'ssl://smtp.gmail.com');
            define('SMPT_PORT', 465);
            define('SMPT_USER', '');
            define('SMPT_PASS', '');
            define('SMPT_IDENTITY', 'Web Master Favarato Express Inc.');
            break;

        case 'production':
            define('SERVER_NAME', 'www.favaratotrade.com');
            define('DB_USER', 'favaratoadmin');
            define('DB_PASS', 'favarato_admin');
            define('DB_NAME', 'favarato_express');
            define('EXT_JS', '.min');
            define('EXT_CSS', '.min');
            define('SMPT_HOST', 'mail.favaratotrade.com');
            define('SMPT_PORT', 25);
            define('SMPT_USER', 'favarato@favaratotrade.com');
            define('SMPT_PASS', 'favarato_admin');
            define('SMPT_IDENTITY', 'Web Master Favarato Express Inc.');
            break;

        default:
            exit('The application environment is not set correctly.');
    }
}

define('PROJECT_NAME', 'portal');
define('PROJECT_NAME_OV', 'intranet');
define('URL_CSS', 'http://' . SERVER_NAME . '/' . PROJECT_NAME . '/css/');
define('URL_JS', 'http://' . SERVER_NAME . '/' . PROJECT_NAME . '/js/');
define('URL_IMG', 'http://' . SERVER_NAME . '/' . PROJECT_NAME . '/img/');
define('URL_MAIN', 'http://' . SERVER_NAME . '/' . PROJECT_NAME . '/');
define('URL_UPLOADS', 'http://' . SERVER_NAME . '/' . PROJECT_NAME_OV . '/uploads/');

/* ------------------------------------------------------------------------ */

/*
  |--------------------------------------------------------------------------
  | File Stream Modes
  |--------------------------------------------------------------------------
  |
  | These modes are used when working with fopen()/popen()
  |
 */

define('FOPEN_READ', 'rb');
define('FOPEN_READ_WRITE', 'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 'ab');
define('FOPEN_READ_WRITE_CREATE', 'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/* End of file constants.php */
/* Location: ./application/config/constants.php */