<?php

//====================URL==========================
define('LKT_PLUGIN_URL'		, plugin_dir_url(__FILE__));
define('LKT_PUBLIC_URL'		, LKT_PLUGIN_URL . 'public');
define('LKT_CSS_URL'		, LKT_PUBLIC_URL . '/css');
define('LKT_IMAGES_URL'		, LKT_PUBLIC_URL . '/images');
define('LKT_JS_URL'			, LKT_PUBLIC_URL . '/js');

//====================PATH==========================
define('DS'								, DIRECTORY_SEPARATOR);
define('LKT_PLUGIN_PATH'			, plugin_dir_path(__FILE__));
define('LKT_CONFIG_PATH'			, LKT_PLUGIN_PATH . 'configs');
define('LKT_CONTROLLER_PATH'		, LKT_PLUGIN_PATH . 'controllers');
define('LKT_HELPER_PATH'			, LKT_PLUGIN_PATH . 'helpers');
define('LKT_INCLUDE_PATH'			, LKT_PLUGIN_PATH . 'includes');
define('LKT_MODELS_PATH'			, LKT_PLUGIN_PATH . 'models');
define('LKT_PUBLIC_PATH'			, LKT_PLUGIN_PATH . 'public');
define('LKT_TEMPLATE_PATH'		, LKT_PLUGIN_PATH . 'templates');
define('LKT_VALIDATE_PATH'		, LKT_PLUGIN_PATH . 'validates');

//====================ORTHER==========================
define('LKT_PREFIX'			, 'LKT_');

//echo LKT_PLUGIN_URL;