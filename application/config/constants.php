<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/*
|--------------------------------------------------------------------------
| My Constants
|--------------------------------------------------------------------------
|
| Other my origine consntants
|
*/

/* site meta */
define('SITE_NAME', 'elzup.com');
define('SITE_DESCRIPTION', 'えるざっぷの創作物などのHP');

define('YOPPARATTER_URL', '//elzup.com/yopparatter');
//define('YOPPARATTER_URL_S', '//elzup.com/yp');
define('YOPPARATTER_URL_S', '//elzup.com/yopparatter');
define('YOPPARATTER_URL_POST', '//elzup.com/yopparatter/post');

define('PATH_LOGIN_Y', 'auth/start/yopparatter');
define('PATH_LOGOUT', 'auth/logout');
define('PATH_AUTH_END_Y', 'auth/end/y');
define('PATH_AUTH_END', 'auth/end');

/* path */
define('PATH_TOP', '');

define('PATH_JS', 'js');
define('PATH_GOOGLE', 'google');
define('PATH_GOOGLE_ANALYTICS', PATH_GOOGLE . '/analyticstracking.php');
define('PATH_IMG', 'images');
define('PATH_LIB', 'lib');
define('PATH_STYLE', 'style');
define('PATH_LIB_BOOTSTRAP_JS', PATH_LIB . '/bootstrap/js/bootstrap.min.js');
define('PATH_LIB_BOOTSTRAP_CSS', PATH_LIB . '/bootstrap/css/bootstrap.min.css');
define('PATH_LIB_BOOTSTRAP_CSS2', PATH_LIB . '/bootstrap/css2/bootstrap.min.css');
define('PATH_LIB_LESS', PATH_LIB . '/less-1.3.3.min.js');

/* online lib url */
define('URL_TWITTER_WIDGETS', 'http://platform.twitter.com/widgets.js');
define('URL_YAHOO_RESET_CSS', 'http://yui.yahooapis.com/3.0.0/build/cssreset/reset-min.css');
define('FONT_GOOGLE_ALDRICH', 'http://fonts.googleapis.com/css?family=Aldrich');
define('URL_JQUERY', 'https://code.jquery.com/jquery.js');

define('URL_YUI', 'http://yui.yahooapis.com/3.16.0/build/yui/yui-min.js');

/* icon */
define('ICON_HOT', 'glyphicon glyphicon-fire');
define('ICON_NEW', 'glyphicon glyphicon-time');
define('ICON_MAKE', 'glyphicon glyphicon-edit');
define('ICON_TIME', 'glyphicon glyphicon-time');
define('ICON_OK', 'glyphicon glyphicon-ok');
define('ICON_VOTE', 'glyphicon glyphicon-import');
define('ICON_RESULT', 'glyphicon glyphicon-stats');
define('ICON_FRIEND', 'glyphicon glyphicon-user');
define('ICON_USER', 'glyphicon glyphicon-user');
define('ICON_TAG', 'glyphicon glyphicon-tags');
define('ICON_FLAG', 'glyphicon glyphicon-flag');
define('ICON_VOTED', 'glyphicon glyphicon-ok');
define('ICON_SEARCH', 'glyphicon glyphicon-search');
define('ICON_SEARCHTAG', 'glyphicon glyphicon-zoom-in');
define('ICON_LOGOUT', 'glyphicon glyphicon-off');
define('ICON_PLUS', 'glyphicon glyphicon-plus');
define('ICON_REMOVE', 'glyphicon glyphicon-remove');
define('ICON_CHECK', 'glyphicon glyphicon-check');
define('ICON_CHECK_EMPTY', 'glyphicon glyphicon-checkboxempty');

define('ICON_TWITTER', 'fa fa-twitter');
define('ICON_HOME', 'fa fa-home');
define('ICON_DESCRIPTION', 'fa fa-comment');
define('ICON_TARGET', 'fa fa-eye');
define('ICON_AWARD', 'fa fa-trophy');
define('ICON_LOGIN', 'fa fa-login');

// TODO: change to hook
/* keys */
define('YAHOO_APP_KEY', 'dj0zaiZpPUJXQW1QVlROZGFSUCZzPWNvbnN1bWVyc2VjcmV0Jng9MGM-');
define('YAHOO_APP_KEY_SECRET', 'e9d1576e6c8e9a8f10b19b18f115456cf530eee8');

/* End of file constants.php */
/* Location: ./application/config/constants.php */