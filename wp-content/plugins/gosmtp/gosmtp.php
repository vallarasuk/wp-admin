<?php
/*
Plugin Name: GoSMTP
Plugin URI: https://gosmtp.net
Description: Send emails from your WordPress site using your preferred SMTP provider like Gmail, Outlook, AWS, Zoho, SMTP.com, Sendinblue, Mailgun, Postmark, Sendgrid, Sparkpost, Sendlayer or any custom SMTP provider.
Version: 1.0.7
Author: Softaculous Team
Author URI: https://softaculous.com
Text Domain: gosmtp
*/

/*
* GoSMTP
* https://gosmtp.net
* (c) GoSMTP Team
*/

/*
GoSMTP's Mailer API connecters are derived from Fluent SMTP:
https://wordpress.org/plugins/fluent-smtp/
(C) FluentSMTP & WPManageNinja Team

FluentSMTP is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.	
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
*/

// We need the ABSPATH
if (!defined('ABSPATH')) exit;

if(!function_exists('add_action')){
	echo 'You are not allowed to access this page directly.';
	exit;
}

// If GOSMTP_VERSION exists then the plugin is loaded already !
if(defined('GOSMTP_VERSION')) {
	return;
}

define('GOSMTP_FILE', __FILE__);

include_once(dirname(__FILE__).'/init.php');
