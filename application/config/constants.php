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


/*
  |--------------------------------------------------------------------------
  | My Constants
  |--------------------------------------------------------------------------
  |
  | Other my origine consntants
  |
 */

/* site meta */
define('SITE_NAME', 'ELZ APPs');
define('SITE_DESCRIPTION', 'えるざっぷ製あぷり');

define('MODE_YOPPARATTER', 'yp');
define('MODE_NENSYATTER', 'nn');
define('MODE_TOKIMIKUJI', 'tk');
define('MODE_PSYCHOPASS', 'psychopass');

define('NAME_YOPPARATTER', 'ヨッパラッタ〜');
define('URL_YOPPARATTER', '//app.elzup.com/' . MODE_YOPPARATTER);
define('URL_YOPPARATTER_POST', '//app.elzup.com/' . MODE_YOPPARATTER . '/post');

define('NAME_NENSYATTER', '念写ったー');
define('URL_NENSYATTER', '//app.elzup.com/' . MODE_NENSYATTER);
define('URL_SHARE_URL', 'app.elzup.com/nn/sn/');

define('NAME_TOKIMIKUJI', '時みくじ');
define('URL_TOKIMIKUJI', '//app.elzup.com/' . MODE_TOKIMIKUJI);

define('NAME_PSYCHOPASS', 'ドミネーター');
define('URL_PSYCHOPASS', '//dominator.elzup.com/');
define('URL_SHARE_PSYCHOPASS_URL', 'app.elzup.com/');


/* nensyatter config */

define('IMG_SPLIT', 4);
define('IMG_CHAR_NUM', 10);
define('IMG_SIZE', IMG_CHAR_NUM * IMG_SPLIT);

define('IMG_AVG_DIFF', 10);


define('PATH_LOGIN', 'auth/start/');
define('PATH_LOGOUT', 'auth/logout/');
define('PATH_AUTH_END', 'auth/end/');

/* path */
define('PATH_TOP', '');
define('PATH_P', 'p/');
define('PATH_P_PRE', 'psychopass/p_pre/');

define('PATH_JS', 'js');
define('PATH_GOOGLE', 'google');
define('PATH_GOOGLE_ANALYTICS', PATH_GOOGLE . '/analyticstracking.php');
define('PATH_IMG', 'images');
define('PATH_LIB', 'lib');
define('PATH_STYLE', 'style');
define('PATH_LIB_FOUNDATION_CSS', PATH_LIB . '/foundation/css/foundation.css');
define('PATH_LIB_FOUNDATION_JS', PATH_LIB . '/foundation/js/foundation.min.js');
define('PATH_LIB_LESS', PATH_LIB . '/less-1.3.3.min.js');
define('PATH_LIB_PN_JP', PATH_LIB . '/pn_ja.dic');
define('PATH_LIB_PN_EN', PATH_LIB . '/pn_en.dic');
define('PATH_LIB_PN_JP_P', PATH_LIB . '/pn_ja_posi.dic');
define('PATH_LIB_PN_EN_P', PATH_LIB . '/pn_en_posi.dic');
define('PATH_LIB_PN_JP_N', PATH_LIB . '/pn_ja_nega.dic');
define('PATH_LIB_PN_EN_N', PATH_LIB . '/pn_en_nega.dic');
define('PATH_LIB_IGO_DICT', PATH_LIB . '/ipadic');

define('PATH_IMG_LOADING', PATH_IMG . '/loading-l-3.gif');


/* Psychopass config */
define('PS_CACHE_TIME_MINITS', 10);
define('PS_TOP_USER_NUM', 8);
define('PS_USER_TWEET_NUM', 100);
define('PS_GET_TIMELINE_NUM', 50);

define('PS_DB_SHIFT', 10);


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

/** DB constants */
define('DB_TN_USERS', 'users');
define('DB_CN_USERS_USER_ID', 'user_id');
define('DB_CN_USERS_TWITTER_USER_ID', 'twitter_user_id');
define('DB_CN_USERS_PRE_SCORE', 'pre_score');
define('DB_CN_USERS_MAX_SCORE', 'max_score');
define('DB_CN_USERS_LAST_UPDATE', 'last_update');

define('GET_DEBUG_USER', 'd');

/* End of file constants.php */
/* Location: ./application/config/constants.php */

/* End of file constants.php */
/* Location: ./application/config/constants.php */