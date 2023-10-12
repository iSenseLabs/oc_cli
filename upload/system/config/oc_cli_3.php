<?php


// Site
$_['site_url']         = substr(HTTP_SERVER, 7);
$_['site_ssl']          = false;

// Url
$_['url_autostart']      = false;

// Database
$_['db_autostart']      = true;
$_['db_engine']           = DB_DRIVER; // mpdo, mssql, mysql, mysqli or postgre
$_['db_hostname']       = DB_HOSTNAME;
$_['db_username']       = DB_USERNAME;
$_['db_password']       = DB_PASSWORD;
$_['db_database']       = DB_DATABASE;
$_['db_port']           = DB_PORT;

// Session
$_['session_autostart'] = true;
$_['session_engine']     = 'db';
$_['session_name']       = 'OCSESSID';

// Template
$_['template_engine']    = 'twig';
$_['template_directory'] = '';
$_['template_cache']     = true;

// Autoload Libraries
$_['library_autoload']   = array(
	'openbay'
);

// Actions
$_['action_pre_action'] = array(
    'oc_cli/startup',
    'startup/startup',
    'startup/error',
    'startup/event'
);

// Actions
$_['action_default']       = 'oc_cli/welcome';
$_['action_router']        = 'oc_cli/router';
$_['action_error']         = 'oc_cli/not_found';

// Action Events
$_['action_event'] = array(
    'view/*/before' => array(
        'event/theme'
    ),
);

