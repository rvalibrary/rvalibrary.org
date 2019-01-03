<?php
/*
 Plugin Name: Richweb WP Lockdown
 Plugin URI: http://forums.richweb.com/index.php?topic=16
 Description: Secures your site from potential exploitable security issues. Please view the <a href="admin.php?page=rw-lockdown"><b>RW Lockdown</b></a> link to the left for more info.
 Version: 2.6
 Requires at least: 3.5.0
 Author: Jordan Burch, Jacob Dunn & Doug Hazard
 Author URI: Richweb.com
 License: CC0 1.0 Universal
 Text Domain: rwwplockdown
*/

/**
 ** IMPORTANT: If you perform an update to this script, you need to change the version 
 ** number in several places:
 **
 ** * Under "Version" above (line 6)
 ** * Under "DEFINE VERSION HERE" below (line 35)
 ** * Under "About..." in the "view5" section (see note below)
 **
 ** Don't forget to note what updates you did under "VERSION HISTORY" (search
 ** for "view5". Version History is under the second instance of that.
 **
 **	When done updating, svn commit ALL files back up to the wplockdown SVN. Make SURE
 **	that you do all SVN updates properly! Once done, test on a single site and then
 **	deploy on all sites, if successful
 **/
require_once(ABSPATH.'wp-admin/includes/file.php' );
require_once(ABSPATH.'wp-admin/includes/plugin.php');

/** 
 ** DEFINE VERSION HERE
 **/
define('rwwpLockVersion', '2.6');
define('RW_LOCKDOWN', 'rw_lockdown');
global $emsURL, $rwwpLockDBTableName;

// LIVE EMS
$emsURL = 'https://secure.richweb.com/mobi/rw/wp_data_rcvr/';

// DEV EMS
//$emsURL = 'https://emsdev.ipengines.net/mobi/mobi_rw/wp_data_rcvr/';

// Set up database table name...
$rwwpLockDBTableName = $wpdb->prefix . 'rwwpLockLog';

/** 
 ** Turn off caching for this page.
 **/
nocache_headers();

class rw_lockdown {
/** 
 ** If this is running MultiSite, stick the link in the Network Admin, otherwise
 ** stick it in the normal Admin menu. Fix by Jordan.
 **/
	function __construct(){
		if(is_multisite()){
			add_action('network_admin_menu',array(&$this,'lockdown_init'));
		} else {
			add_action('admin_menu',array(&$this,'lockdown_init'));
		}
		add_action( 'wp_login', array( &$this , 'login' ), 10, 2 );
		add_action( 'clear_auth_cookie', array( &$this , 'logout' ), 10 );
		register_activation_hook( __FILE__, 'rwWPLockDB_install' );
	}

	function lockdown_init(){
/**
 ** Let's get the current locked/unlocked status and set the menu icon properly.
 ** If the Richweb Site ID or EMS ID is missing, then override the RW Lockdown
 ** icon with an Animated Alert icon.
 **/
		$status = get_option('RW_LOCKDOWN', '');
		if ($status == 'LOCKED') {
			$lockIcon='green.png';
		} else {
			$lockIcon='red.png';
		}

		$rwCUSTID = get_option('RW_CUSTID', '');
		if ($rwCUSTID == '') {
			$lockIcon='important.gif';
	}

		$rwCUSTOMTP = get_option('RW_CUSTOMTP', '');
		if ($rwCUSTOMTP == '') {
			$lockIcon='important.gif';
		}

		$rwSITEID = get_option('RW_SITEID', '');
		if ($rwSITEID == '') {
			$lockIcon='important.gif';
		}

/** 
 ** add menu item to admin menu
 **/
		add_menu_page(
			"RW Lockdown", 
			"RW Lockdown", 
			'manage_options', 
			'rw-lockdown',
			array(&$this,'rw_lockdown'),
			WP_PLUGIN_URL . '/rw-lockdown/images/' . $lockIcon,
			'2.1995314285'
		);

/** 
 ** Load the CSS and Javascript files for this plugin.
 **/
		wp_register_style('rwLockdown_css', plugins_url('rwwpLockdown.css',__FILE__ ));
		wp_enqueue_style('rwLockdown_css');
		wp_enqueue_script('the_js', plugins_url('/rwwpLockdown.js',__FILE__) );
	}

	function rw_lockdown(){
		$lock = '';
		global $rwwpLockDBTableName;

/** 
 ** check form submit. Depending on the form used, this will
 ** either lock/unlock the site OR update the database with
 ** the identified Internal Richweb Customer ID.
 ** 
 ** LOCKING AND UNLOCKING THE SITE
 ** connect to daemon and send lock status
 **/
		if(isset($_REQUEST) && isset($_REQUEST['lock'])){
			$lock = wp_filter_nohtml_kses($_REQUEST['lock']);
			$result = $this->daemon_connect($lock);

/** 
 ** if daemon shows change, update wp_options
 **/
			if ($result){
				if ($lock == 'LOCK'){
					update_option('RW_LOCKDOWN','LOCKED');
				} else {
					update_option('RW_LOCKDOWN','UNLOCKED');
				}
			}
		}

/** 
 ** Pull the current Lock/Unlock option, as well as the Unique Site ID
 ** and the Richweb EMS Client ID...
 **/
		$status = get_option('RW_LOCKDOWN', '');
		$rwCUSTID = get_option('RW_CUSTID', '');
		$rwCUSTOMTP = get_option('RW_CUSTOMTP', '');
		$rwSITEID = get_option('RW_SITEID', '');

/** 
 ** SUBMITTING THE INTERNAL RICHWEB USER ID
 **/
		if(isset($_REQUEST) && isset($_REQUEST['rwSITEID'])){
			$rwSITEID = wp_filter_nohtml_kses($_REQUEST['rwSITEID']);
			update_option('RW_SITEID', $rwSITEID);
		}

		if(isset($_REQUEST) && isset($_REQUEST['rwCUSTID'])){
			$rwCUSTID = wp_filter_nohtml_kses($_REQUEST['rwCUSTID']);
			update_option('RW_CUSTID', $rwCUSTID);
		}

		if(isset($_REQUEST) && isset($_REQUEST['rwCUSTOMTP'])){
			$rwCUSTOMTP = wp_filter_nohtml_kses($_REQUEST['rwCUSTOMTP']);
			update_option('RW_CUSTOMTP', $rwCUSTOMTP);
		}

/** 
 ** set wp_options if default value produced
 **/
		if ($status == 'LOCKED'){
			$statusCOLOR='#008800';
			$wpLocked = 'Y';
		} else {
			if($status == '') {
				update_option('RW_LOCKDOWN','UNLOCKED');
			}
			$status = 'UNLOCKED';
			$statusCOLOR='#ff0000';
			$wpLocked = 'N';
		}

/**
 ** Setting four arrays up (Overall json array, Core Wordpress info, RW User info, theme and plugin list)
 ** Also setting up the containers for the on-screen display of stats under the "WP Version Info" tab.
 ** Let's define the Wordpress Version PHP tag here, as well.
 **/
		$wpInfo = array();
		$wpNoLock = array();
		$wpCoreInfo = array();
		$rwAcctInfo = array();
		$wpThemePluginList = array();
		$coreWPInfo="";
		$coreRWUserInfo="";
		$themeSpecs="";
		$pluginSpecs="";
		$wpVersion = get_bloginfo('version');
		$rwAlertToggle=false;
		$msgAlert="";
		$msgEMS="";

/** 
 ** If the Richweb Client ID isn't set, let's set the wording properly!
 **/
		if ($rwCUSTID == '') {
			$richwebID = "Not set yet!";
		} else {
			$richwebID = "" . $rwCUSTID;
		}

		if ($rwCUSTOMTP == '') {
			$richwebCustomTP = "Not set yet!";
		} else {
			$richwebCustomTP = "" . $rwCUSTOMTP;
		}

		$unIDConstruct	 = str_replace("http://","",get_admin_url());
		$unIDConstruct	 = str_replace("/","+", $unIDConstruct);
		$wpCoreInfo[]	 = array('SITE_ID' => $rwSITEID);
		$wpCoreInfo[]	 = array('CUST_ID' => $richwebID);
		$wpCoreInfo[]	 = array('CUSTOM_TP' => $richwebCustomTP);
		$wpNoLock[]	 = array('SITE_ID' => $rwSITEID);
		$wpNoLock[]	 = array('CUST_ID' => $richwebID);
		$coreWPInfo	.="				<dt>Richweb Client ID</dt><dd>" . $richwebID . "</dd>";

/** 
 ** Get Wordpress Path
 **/
		$rwHostname = gethostname();
		$wpCoreInfo[] = array('HOST' => $rwHostname);
		$coreWPInfo .="				<dt>Hostname</dt><dd>" . $rwHostname . "</dd>";

		$sIP = dns_get_record($_SERVER['SERVER_NAME'], DNS_A);
		$siteIP = $sIP[0]['ip'];
		$wpCoreInfo[] = array('IP' => gethostbyname($_SERVER['SERVER_NAME']));
		$coreWPInfo .="				<dt>IP Address</dt><dd>" . $siteIP . "</dd>";

		$wpPath = constant('ABSPATH'); $wpCoreInfo[] = array('PATH' => $wpPath);
		$coreWPInfo .="				<dt>Path to WP</dt><dd>" . $wpPath . "</dd>";

/** 
 ** We're going to check to see if our Richweb User account exists and its status...
 **/
		$username = "richweb";
		if (username_exists($username)) {
			$rwUser = get_user_by('login', $username);
			$rwAcctInfo[] = array('USERNAME' => 'richweb');
			$coreRWUserInfo .="				<dt>Richweb username</dt><dd>richweb</dd>";

			$rwAcctInfo[] = array('EMAIL' => $rwUser->user_email);
			$coreRWUserInfo .="				<dt>Email Addy</dt><dd>" . $rwUser->user_email . "</dd>";

			$rwAcctInfo[] = array('WP_ROLE' => $rwUser->roles[0]);
			$coreRWUserInfo .="				<dt>WP Role(s)</dt><dd>" . $rwUser->roles[0] . "</dd>";
		} else {
			$rwUserStatus = "Richweb Login account: Not Present";

			$rwAcctInfo[] = array('USERNAME' => 'Not Present');
			$coreRWUserInfo .="				<dt>Richweb username</dt><dd>Not Present</dd>";

			$rwAcctInfo[] = array('EMAIL' => 'Not Present');
			$coreRWUserInfo .="				<dt>Email Addy</dt><dd>Not Present</dd>";

			$rwAcctInfo[] = array('WP_ROLE' => 'Not Present');
			$coreRWUserInfo .="				<dt>WP Role(s)</dt><dd>Not Present</dd>";
		}

/** 
 ** We're going to detect if this is a MultiSite or not, and whether a Network
 ** or Super Admin "richweb" user is enabled.
 **/
		if (is_multisite()) {
			$rwUserStatus .= "<br>MultiSite: Yes (Richweb user acct ";
			$wpCoreInfo[] = array('WP_MULTISITE' => 'Y');
			$wpNoLock[] = array('WP_MULTISITE' => 'Y');
			$coreWPInfo .="				<dt>WP MultiSite?</dt><dd>Yes</dd>";
			
			if (is_super_admin($rwUserID)) {
				$rwUserStatus .= "IS";
				$rwAcctInfo[] = array('WP_SUPER_ADMIN' => 'Y');
				$coreRWUserInfo .="				<dt>WP Super (Network Admin)</dt><dd>Yes</dd>";
			} else {
				$rwUserStatus .= "IS NOT";
				$rwAcctInfo[] = array('WP_SUPER_ADMIN' => 'N');
				$coreRWUserInfo .="				<dt>WP Super (Network Admin)</dt><dd>No</dd>";
			}
			$rwUserStatus .= " a Super/Network Admin.)";
		} else {
			$rwUserStatus	.= "<br>MultiSite: No (Standalone)";
			$wpCoreInfo[]	 = array('WP_MULTISITE' => 'N');
			$wpNoLock[]	 = array('WP_MULTISITE' => 'N');
			$coreWPInfo	.= "				<dt>WP MultiSite?</dt><dd>No</dd>";
		}
		$wpCoreInfo[]	 = array('NAME' => $_SERVER['SERVER_NAME']);
		$wpNoLock[]	 = array('NAME' => $_SERVER['SERVER_NAME']);
		$coreWPInfo	.="				<dt>Site Name</dt><dd>" . $_SERVER['SERVER_NAME'] . "</dd>";

		$wpCoreInfo[]	 = array('URL' => 'http://' . $_SERVER['SERVER_NAME']);
		$wpNoLock[]	 = array('URL' => 'http://' . $_SERVER['SERVER_NAME']);
		$coreWPInfo	.="				<dt>URL to Site</dt><dd>http://" . $_SERVER['SERVER_NAME'] . "</dd>";

		$wpCoreInfo[]	 = array('ADMIN_URL' => get_admin_url());
		$coreWPInfo	.= "				<dt>URL to WP Admin</dt><dd>" . get_admin_url() . "</dd>";

/** 
 ** String contains info about WP. Will also use it in the mailto link below.
 **/
		$rwwpInfo="Richweb Client ID: " . $rwCUSTID . "<br>WP Lockdown version: " . constant('rwwpLockVersion') . "<br>Host Node (VM): " . $rwHostname . "<br>Path to Wordpress installation: " . $wpPath . "<br>URL to your site: http://" . $_SERVER['SERVER_NAME'] . "<br>URL to WP Admin: " . get_admin_url() . "<br>" . $rwUserStatus;
		$mailInfo=str_replace(" ","%20",$rwwpInfo);$mailInfo=str_replace("<br>","%0A",$mailInfo);

/**
 ** If the RW WP Stats & Info is activated, let's nudge to deactivate it. It conflicts with
 ** the RW WP Lockdown plugin.
 **/
		if(is_plugin_active('rw-wpStatsInfo/index.php')) {
			$alertMsg[]="RW WP Stats & Info Plugin is active!|||Because the &quot;RW Stats &amp; Info&quot; Plugin is a derivative of the &quot;RW Lockdown&quot; Plugin, there are some conflicts within the CSS and JS files inside both plugins. Please head over to the <a href='" . get_admin_url() . "plugins.php'>WP Admin Plugins page</a> and deactivate the &quot;Richweb WP Stats &amp; Info&&quot; Plugin ASAP.";
		} 

/**
 ** Let's get the Active theme name, version and note that it's active...
 **/
		$my_theme = wp_get_theme();
		$wpThemePluginList[] = array(
			'NAME'				=> $my_theme->get('Name'), 
			'SLUGNAME'			=> $my_theme->get('TextDomain'),
			'TYPE'				=> 'Theme', 
			'VERSION'				=> $my_theme->get('Version'), 
			'STATUS'				=> 'Active', 
			'WP_NETWORK_ENABLED'	=> ' '
		);

		if (!$my_theme->get('Name')){
			$alertMsg[]="Primary Theme issue|||Primary theme is missing its Theme Name in styles.css.<br />" . $my_theme->template_dir;
		}

		if (!$my_theme->get('Version')){
			$alertMsg[]="Primary Theme &quot;" . $my_theme->get('Name') . "&quot;version issue|||Primary theme, &quot;" . $my_theme->get('Name') . "&quot; is missing its Version info in styles.css.<br />" . $my_theme->template_dir;
		}

		$dlhThemeList[] = $my_theme->get('Name');
		$themeSpecs .="				<dt>" . $my_theme->get('Name') . "</dt><dd>" . $my_theme->get('Version') . " (Active - " . $my_theme->get('TextDomain') . ")</dd>";

/**
 ** Let's get the the rest of the themes, too...
 **/
		$themes=wp_get_themes();
		$themeCount=0;
		foreach ($themes as $theme) {
			if (!$theme->get('Version')){
				$alertMsg[]="Theme &quot;" . $theme->get('Name') . "&quot; version issue|||Theme &quot;" . $theme->get('Name') . "&quot; is missing its Version info in styles.css.<br />" . $theme->template_dir;
			}

			if ($my_theme->get('Name') != $theme->get('Name')) {
				$wpThemePluginList[] = array(
					'NAME'				=> $theme->get('Name'), 
					'SLUGNAME'			=> $theme->get('TextDomain'),
					'TYPE'				=> $ptType, 
					'VERSION'				=> $theme->get('Version'), 
					'STATUS'				=> $blankIt, 
					'WP_NETWORK_ENABLED'	=> $blankIt
				);
				$themeSpecs .="				<dt>" . $theme->get('Name') . "</dt><dd>" . $theme->get('Version') . " (" . $theme->get('TextDomain') . ")</dd>";
				$themeCount++;
				$dlhThemeList[] = $theme->get('Name');
			}
		}

		$thmCnt = $themeCount + 1;
		$wpCoreInfo[] = array('WP_VERSION' => $wpVersion);
		$coreWPInfo .="				<dt>Wordpress Version</dt><dd>" . $wpVersion . "</dd>";

		$wpCoreInfo[] = array('WP_THEME_COUNT' => $thmCnt);
		$coreWPInfo .="				<dt># of Themes</dt><dd>" . $thmCnt . "</dd>";

/**
 ** Let's get the list of Plugins, versions, statuses, etc...
 **/
		$all_plugins = get_plugins();
		$pluginCount=0;
		$ptType="Plugin";
		$dlhPluginList=array();
		foreach ($all_plugins as $plugin_file => $plugin) {
			$thePlugin = get_plugin_data(WP_PLUGIN_DIR . "/" . $plugin_file);
			if (is_plugin_active($plugin_file)) {
				$pluginStatus="Active";
			} else {
				$pluginStatus="Inactive";
			}

			if(is_plugin_active_for_network($plugin_file)){
				$pluginNetAct = "Yes";
			} else {
				$pluginNetAct = "No";
			}

			$wpThemePluginList[] = array(
				'NAME'				=> $thePlugin['Name'], 
				'SLUGNAME'			=> $thePlugin['TextDomain'],
				'TYPE'				=> $ptType, 
				'VERSION'				=> $thePlugin['Version'], 
				'STATUS'				=> $pluginStatus, 
				'WP_NETWORK_ENABLED'	=> $pluginNetAct
			);

			if (!$thePlugin['Version']){
				$alertMsg[]="Plugin &quot;" . $thePlugin['Name'] . "&quot; version issue|||Plugin &quot;" . $thePlugin['Name'] . "&quot; is missing its Version info.<br />" . WP_PLUGIN_DIR . "/" . $plugin_file . "<br /><br />";
			}

			if (!$thePlugin['Name']){
				$alertMsg[]="Plugin &quot;" . $thePlugin['Name'] . "&quot; name issue|||Plugin is missing its name.<br />" . WP_PLUGIN_DIR . "/" . $plugin_file . "<br /><br />";
			}

			if(in_array(strtolower($thePlugin['Name']), array_map('strtolower', $dlhPluginList))) {
				$alertMsg[]="Plugin &quot;" . $thePlugin['Name'] . "&quot; duplicate issue|||Plugin &quot;" . $thePlugin['Name'] . "&quot; has two or more entries on this list.<br />" . WP_PLUGIN_DIR . "/" . $plugin_file . "<br /><br />";
			}
			
			$dlhPluginList[] = $thePlugin['Name'];

/**
 ** Applying a border to every other plugin to give visual separation.
 **/
			if ($pluginCount % 2 == 1 ) {
				$plCSS = " class='borderIt'";
			} else {
				$plCSS = "";
			}
			$pluginSpecs .="				<dt" . $plCSS . ">" . $thePlugin['Name'] . "</dt><dd" . $plCSS . ">Version: " . $thePlugin['Version'] . "<br />Status: " . $pluginStatus . "<br />Network Activated: " . $pluginNetAct . "<br />Slug Name: " . $thePlugin['TextDomain'] . "</dd>";
			$pluginCount++;
		}

		$wpCoreInfo[] = array('WP_PLUGIN_COUNT' => $pluginCount);
		$coreWPInfo .="				<dt># of Plugins</dt><dd>" . $pluginCount . "</dd>";

/** 
 ** Now we can note whether the site's locked or not.
 **/
		$wpCoreInfo[]	= array('WP_LOCKED' => $wpLocked);
		$wpNoLock[]	= array('WP_LOCKED' => $wpLocked);

/**
 ** If the site is being locked from EMS then set the user_login to EMS
 **/
		$dt = new DateTime("now", new DateTimeZone('America/New_York'));
		$dt->setTimestamp(time());
		$passhash = md5($rwSITEID . $dt->format('Y/m/d'));
		$lockerName = new stdClass();
		if($_REQUEST['passhash'] == $passhash && preg_match('/^\/wp-lockdown\/lock\/?\??passhash\=[A-Za-z0-9]{32}$/',$_SERVER['REQUEST_URI'])){
			$lockerName->user_login = 'EMS';
		} else {
			$lockerName = wp_get_current_user();		
		}

		$wpCoreInfo[]	 = array('WP_LOCKEDBYWHOM' => $lockerName->user_login);
		$wpNoLock[]	 = array('WP_LOCKEDBYWHOM' => $lockerName->user_login);
		$coreWPInfo	.= "				<dt>Site Locked?</dt><dd>" . $wpLocked . "</dd>";

/** 
 ** Set up the visual image indicator of locked/unlocked status, plus the RW logo (Branding!)
 **/
		$rwBranding = "<img src='" . WP_PLUGIN_URL . "/rw-lockdown/images/Richweb.png' alt='Richweb.com' title='Richweb.com' /><img src='" .WP_PLUGIN_URL . "/rw-lockdown/images/" . $status . ".png' alt='" . $status . "' title='" . $status . "' style='float: right;'/><br style='clear: right;'>";

/** 
 ** Let's tie this all into a neat bow and get it structured for EMS stuff
 **/
		$wpInfo[] = array('Core Wordpress Information' => $wpCoreInfo);
		$wpInfo[] = array('Richweb Account Information' => $rwAcctInfo);
		$wpInfo[] = array('Available Plugins and Themes' => $wpThemePluginList);
		$dt = new DateTime("now", new DateTimeZone('America/New_York'));
		$dt->setTimestamp(time());

		$thePhrase = md5("Pr3ss3d4W0rds1@1" . $dt->format('Y-m-d'));
		$wpInfo[] = array('passphrase' => $thePhrase);
		$wpInfoUnlock[] = array('Core Wordpress Information' => $wpNoLock);
		$wpInfoUnlock[] = array('passphrase' => $thePhrase);

		$rwwpLocked = json_encode($wpInfo);$rwwpLocked = str_replace("\\/","/", $rwwpLocked);
		$rwwpUnlocked = json_encode($wpInfoUnlock);$rwwpUnlocked = str_replace("\\/","/", $rwwpUnlocked);

/**
 ** Let's check to see if Version 2.3 of this plugin is set up properly. If not, ERROR MESSAGE IT!
 **/
		global $wpdb;
		if($wpdb->get_var("SHOW TABLES LIKE '$rwwpLockDBTableName'") != $rwwpLockDBTableName) {
			$alertMsg[]="Version 2.3.XX of the Lockdown not set up|||Please DEACTIVATE and then ACTIVATE this Plugin to complete the set up.";
		}

/** 
 ** Sending data into EMS now...
 **/
		if(isset($_REQUEST) && isset($_REQUEST['lock'])){
			global $emsURL, $EMSResult, $emsReturn;
			$rwTimeNow = time();
			$current_user = wp_get_current_user();
			$ipaddy=$_SERVER["HTTP_X_FORWARDED_FOR"];

			$lock = wp_filter_nohtml_kses($_REQUEST['lock']);

			if ($lock == 'LOCK'){
				$emsReturn = intoEMS($emsURL, $rwwpLocked);
				$wpdb->insert( 
					$rwwpLockDBTableName, 
					array( 
						'tstamp' => $rwTimeNow, 
						'myName' => $current_user->user_login, 
						'ipaddy' => $ipaddy, 
						'lockStatus' => $lock, 
					) 
				);
			} else {
				$emsReturn = intoEMS($emsURL, $rwwpUnlocked);
				$wpdb->insert( 
					$rwwpLockDBTableName, 
					array( 
						'tstamp' => $rwTimeNow, 
						'myName' => $current_user->user_login, 
						'ipaddy' => $ipaddy, 
						'lockStatus' => $lock, 
					) 
				);
			}

			if ($rwSITEID != $emsReturn['SITE_ID']) {
				$emsReturn['SITE_ID'] = wp_filter_nohtml_kses($emsReturn['SITE_ID']);
				update_option('RW_SITEID', $emsReturn['SITE_ID']);
				$rwSITEID = $emsReturn['SITE_ID'];
			}

			$emsCNT = count($emsReturn);
			if($emsCNT > 0 ) {
				$rwAlertToggle=true;
				$errEMS = $emsReturn['status'];
				$errMSG = $emsReturn['msg'];
				if($errEMS == "OK") {
					if ($lock == 'LOCK'){
						$rwAlertBG = "rwAlertGreen";
						$msgAlert = "Lockdown Status: Success!";
						$msgEMS = "<br />Your siste has successfully been LOCKED.";
					} else {
						$rwAlertBG = "rwAlertGreen";
						$msgAlert = "Lockdown Status: Success!";
						$msgEMS = "<br />Your site has successfully been UNLOCKED.<br /><br />Please remember to LOCK it as soon as you're done performing your changes.";
					}
				} else if($errEMS == "EXCEPTION") {
					$rwAlertBG = "rwAlertRed";
					$msgAlert = "Lockdown Status: Problem!";
					$msgEMS = $errMSG . "<br /><br />Please <a href='mailto:wecare@richweb.com?Subject=(EMS%20ID:%20" . $richwebID . ";%20Site:%20" . $_SERVER['SERVER_NAME'] . ")%20-%20Problem%20Locking%20SiteBody=" . $errMSG ."'>click here to email the Richweb team this error</a>.";
				} else if($errEMS == "ERR") {
					$rwAlertBG = "rwAlertRed";
					$msgAlert = "Lockdown Status: Problem!";
					$msgEMS = $errMSG . "<br /><br />Please <a href='mailto:wecare@richweb.com?Subject=(EMS%20ID:%20" . $richwebID . ";%20Site:%20" . $_SERVER['SERVER_NAME'] . ")%20-%20Problem%20Locking%20SiteBody=" . $errMSG ."'>click here to email the Richweb team this error</a>.";
				} else if($errEMS == "EMSIDERR") {
					$rwAlertBG = "rwAlertRed";
					$msgAlert = "Lockdown Status: Problem!";
					$msgEMS = $errMSG . "<br /><br />Please <a href='mailto:wecare@richweb.com?Subject=(EMS%20ID:%20" . $richwebID . ";%20Site:%20" . $_SERVER['SERVER_NAME'] . ")%20-%20Problem%20Locking%20SiteBody=" . $errMSG ."'>click here to email the Richweb team this error</a>.";
				} else {
					$rwAlertToggle=true;
					$rwAlertBG = "rwAlertRed";
					$msgAlert = "Problem!";
					$msgEMS = $errMSG . "<br /><br />Please <a href='mailto:wecare@richweb.com?Subject=(EMS%20ID:%20" . $richwebID . ";%20Site:%20" . $_SERVER['SERVER_NAME'] . ")%20-%20Problem%20Locking%20SiteBody=" . $errMSG ."'>click here to email the Richweb team this error</a>.";
				}
			}
		}
		$alertCNT=count($alertMsg);

/**
 ** We need to check to see if CURL is installed and ready to rock. If not, let's
 ** provide an alert and instructions on how to get it installed.
 **/
		if (!in_array('curl', get_loaded_extensions())) {
			$rwAlertToggle=true;
			$rwAlertBG = "rwAlertRed";
			$msgAlert = "Problem - CURL is not installed!";
			$msgEMS = "CURL is not installed on this server. Please follow these directions on EACH front end web server:<br /><br />Log into each front end server and issue the following commands:<br />&gt; apt-get update && apt-get install php5-curl<br />&gt; service apache2 restart<br /><br />When you have done that, refresh this page to ensure this error message goes away.";
		}

/**
 ** If the site is being locked from EMS then we don't need to show the typical result output
 ** Instead simply echo the current site status which will be captured by the EMS API call
 **/
		$dt = new DateTime("now", new DateTimeZone('America/New_York'));
		$dt->setTimestamp(time());
		$passhash = md5($rwSITEID . $dt->format('Y/m/d'));
		if($_REQUEST['passhash'] == $passhash && preg_match('/^\/wp-lockdown\/lock\/?\??passhash\=[A-Za-z0-9]{32}$/',$_SERVER['REQUEST_URI'])){
			echo 'Current Status: ' . $status;
			die;
		}
		
/** 
 ** The actual layout of the Plugin itself, starting with the current lock/unlock Status
 ** and Plugin name/version info
 **/
		echo "
		<h1 class='rwwpLockH2'>Richweb Wordpress Lockdown Plugin, v" . constant('rwwpLockVersion') . "</h1>
		<h2 class='rwwpLockH2'>Current Status: <u style='color: " . $statusCOLOR .";'>" . $status . "</u></h2>
		<br /><div class='rwwpLock'>";

/** 
 ** The Menu section itself
 **/
		echo "
			<ul class='tabs' data-persist='true'>";
		if($alertCNT > 0){
			echo "
				<li><a href='#view7'><img src=\"" . WP_PLUGIN_URL . "/rw-lockdown/images/important.gif\" /> ALERT</a></li>
";
		}
		echo "
				<li><a href='#view1'>Lock &amp; Unlock</a></li>
				<li><a href='#view2'>Core WP Info</a></li>
				<li><a href='#view3'>Need Help?</a></li>
				<li><a href='#view4'>Lock Logs</a></li>
				<li><a href='#view5'>About...</a></li>
				<li><a href='#view6'>Config</a></li>
			</ul>
";

/** 
 ** Locking or Unlocking the site itself, plus a caveat/heads up...
 **/
		echo "
			<div class='tabcontents'>
				<div id='view1'>
					<p>". $rwBranding . "</p>";

/**
 ** Count the number of files contained within the Wordpress Directory.
 ** If it's over 16,500 files (Approximately 5 seconds, at low count),
 ** we'll present them with a bold red warning, estimating the time to
 ** lock or unlock their site.
 **/
		$wpDirFileCounts = getFileCount($wpPath);
		$ttlTimeFast = round($wpDirFileCounts / 3750);
		$ttlTimeSlow = round($wpDirFileCounts / 1500);

		if($ttlTimeSlow >= 10) {
			echo "
				<p><img src=\"" . WP_PLUGIN_URL . "/rw-lockdown/images/important.gif\" align=\"left\" /> You have <b>" . number_format($wpDirFileCounts) . "</b> files in your Wordpress Directory.</p>
				<p style=\"font-weight: bold; color: #ff0000;\"><img src=\"" . WP_PLUGIN_URL . "/rw-lockdown/images/important.gif\" align=\"left\" /> It will take (approximately) " . $ttlTimeFast . " to " . $ttlTimeSlow . " seconds to Lock or Unlock your site.</p>
			";
		}

/** 
 ** Let's work through the config options... and display alerts, as needed.
 **/
		if ($rwCUSTID == '') {

/** 
 ** Let's nudge for the Internal Richweb Client ID here...
 **/
			echo "
			<div class='rwwpLock' style='font-weight: bold;'>Please use the form below to set the Richweb Client ID.&nbsp; If you do not know what your Richweb Client ID is, please contact us ASAP.</div>
			<div><br /><b>Richweb Employees:</b><br />* Use the &quot;CustID&quot; or &quot;Customer ID&quot; designator inside EMS, please.</div>
			";
		} else {
/**
 ** Let's display any alerts here...
 **/
			if($rwAlertToggle > 0){
				echo "
				<fieldset class='rwAlert " . $rwAlertBG . "'>
				<legend>" . $msgAlert . "</legend>
				<div>" . $msgEMS . "</div>";
				
				if ($rwAlertBG == "rwAlertRed") {
					echo "<div><br />Please fix/report this issue ASAP!</div>";
				}
				echo "</fieldset>";
			}

/** 
 ** Both configuration checks passed... let's let the customer lock/unlock the site now!
 **/
			echo "			<p>Use the radio buttons below to lock or unlock your site. <u>Please remember to re-lock your site, once you're done making changes!</u></p>";
			echo "			<form action='admin.php?page=rw-lockdown' method='post'>";

			echo "			<label for='LOCK' onclick=\"document.getElementById('rwBtn').value = 'Click to LOCK your site.';\">";
			echo "			<input type='radio' name='lock' id='LOCK' value='LOCK'";

			if ($status == 'LOCKED') {
				echo " checked='checked'";
				$btnTXT = "Click to LOCK your site.";
			}

			echo " />&nbsp; Lock</label><br>";
			echo "<label for='UNLOCK' onclick=\"document.getElementById('rwBtn').value = 'Click to UNLOCK your site.';\">";
			echo "<input type='radio' name='lock' id='UNLOCK' value='UNLOCK'";
			
			if ($status == 'UNLOCKED') {
				echo " checked='checked'";
				$btnTXT = "Click to UNLOCK your site.";
			}

			echo " />&nbsp; Unlock</label><br>";
			echo "<br><input id='rwBtn' type='submit' value='" . $btnTXT . "' />";
			echo "</form>";
		}

		echo "
		</div>
";

/** 
 ** This section shows data we've obtained on their site (Core Wordpress Stats, 
 ** WP RW User info, Theme and Plugin Stats.
 **
 **	 Core Wordpress Stats and Information
 **/
		echo "
		<div id='view2'>
			<p>". $rwBranding . "</p>
			<p>This section shows a list of Version information for Wordpress, its Plugins and Themes. VERY helpful information for us all.</p>
			<p>To understand how we use this information, please <a href='http://forums.richweb.com/index.php?topic=16.msg28#msg28' class='rwwpTitle' target='_blank'>visit this post on our forums...</a><br />(Data Richweb collects and how/why we use this information)</p>
			<h3 class='rwwpLockH1'>Core Wordpress Stats &amp; Information</h3>
			<dl class='rwList'>";
		echo $coreWPInfo;
		echo "
			</dl>";

/** 
 **	 The internal "richweb" user account information
 **/
		echo "
		<h3 class='rwwpLockH1'>The &quot;richweb&quot; user account information</h3>
			<dl class='rwList'>";
		echo $coreRWUserInfo;
		echo "			</dl>";


/** 
 **	 Theme information
 **/
		echo "
			<h3 class='rwwpLockH1'>Wordpress Theme information</h3>
			<dl class='rwList'>
				<dt>Theme Name</dt><dd><b>Version</b></dd>";
		echo $themeSpecs;
		echo "
			</dl>";
		if($themeCount == 0) {
			echo "			<br />Only one theme is present... (noted above)";
		}

/** 
 **	 Finally, we're going to get a list of ALL Plugins, their version and Active/Inactive status.
 **/
		echo "
			<h3 class='rwwpLockH1'>Plugin list, Active/Inactive Status &amp Versions</h3>
			<dl class='rwList'>
				<dt>Plugin Name</dt><dd><b>Related Info</b></dd>";
		echo $pluginSpecs;
		echo "
			</dl>
		</div>";

/** 
 ** Let's give them some love on how to get help! Plus basic Plugin info
 **/
		echo "
		<div id='view3'>
			<p>". $rwBranding . "</p>
			<p>If you run into an issue (especially one where it says &quot;Broken Pipe&quot; above), we'll be happy to help you fix it.</p>
			<p>When contacting us, please provide us with the following information:<br><blockquote class='rwwpldbq'>" . $rwwpInfo . "</blockquote></p>
			<p>You can send us a ticket via <a href='https://secure.richweb.com/osticket/' target='_blank'>our Help Desk</a> or by emailing us at <a href='mailto:wecare@richweb.com?Subject=Requesting%20Assistance%20with%20the%20RW%20WP%20Lockdown%20Plugin&Body=" . $mailInfo ."'>wecare@richweb.com</a></p>
			<p>Please be sure to describe, in detail, the issue you've come across.</p>
			<p>For more information about how we protect you with this plugin, please visit <a href='http://forums.richweb.com/index.php?topic=16' target='_blank'>THIS LINK</a> on our forums.</p>
			<p style='text-align: center; font-size: 10px;'>(All links open in new windows automatically.)</p>
		</div>";

/** 
 ** About this Plugin and why it's crucial for all Richweb WP customers.
 **/
		echo "
		<div id='view5'>
			<p>". $rwBranding . "</p>
			<p><span class='rwwpTitle'>RW-LOCKDOWN PLUGIN OVERVIEW:</span><br />Security of all of our clients web sites is crucially important to the Richweb team. WordPress inherently has many vulerabilities that allow hackers to inject code and files into a WordPress site. We developed this plugin to help protect your site against the most common forms of Wordpress website hacking methods.</p>
			<p>The Richweb Wordpress Lockdown Plugin is a tool, specifically designed for our Wordpress clients, that helps ensure your site is not susceptible to &quot;MySQL Injection&quot; or &quot;Cross-site Scripting&quot; (also called XSS) attacks.</p>
			<p><span class='rwwpTitle'>HOW THIS PLUGIN WORKS:</span><br />This plugin, along with a server side application, changes the ownership of your files from web-writeable to owned by the core system itself, which means that unless you are directly logged into the server as the root user, you (or more importantly, a hacker) will not be able to make any changes to any files within your website.</p>
			<p>It&#39;s essentially a body guard, protecting your website. If you don&#39;t have the &quot;secret code-word&quot; (Unlocking your site), you won&#39;t be able to make any changes to your site.</p>
			<p><span class='rwwpTitle'>WHEN TO USE THIS PLUGIN:</span><br />If you&#39;re only making changes to your content or uploading pictures, videos, etc, using the WordPress Admin interface, you do not need to unlock your site.</p>
			<p>The only time you should unlock your website is if you are making changes to:<ol><li>Any of the WordPress / Theme files directly (i.e., a CSS file, or a header file),</li><li>Adding or changing a theme,</li><li>Adding or updating a plugin, or</li><li>Performing an update to the WordPress application itself.</li></ol></p>
			<p>PLEASE REMEMBER TO RE-LOCK your site after you are done making your changes!</p>
			<p><span class='rwwpTitle'>MORE INFO:</span><br />For more information about how we protect you with this plugin, please visit <a href='http://forums.richweb.com/index.php?topic=16' target='_blank'>THIS LINK</a> on our forums.</p>
			<p style='text-align: center; font-size: 10px;'>(All links open in new windows automatically.)</p>
			<hr style='height: 12px; border: 0; box-shadow: inset 0 12px 12px -12px rgba(0, 0, 0, 0.5);'>

			<div><span class='rwwpTitle'><br />Version 2.6 - November 8th, 2017</div>
			<ul class='rwwpNSUL'>
				<li>Fixed a timezone bug that was impacting dates/timezone issues with certain calendar / events plugins.</li>
				<li>Removed version 2.3.2, 2.4 and 2.4.1 notes from plugin's &quot;About&quot; page (was put on forums in 2.5 update, but not removed from plugin version update details).</li>
			</ul>

			<div><span class='rwwpTitle'><br />Version 2.5 - April, 2017</div>
			<ul class='rwwpNSUL'>
				<li>Moved RW WP Lockdown configuration from &quot;Lock &amp; Unlock&quot; into a new &quot;Config&quot; tab.</li>
				<li>Changed Theme error handling (it was providing an incomplete error report).</li>
				<li>Removed duplicate theme checking. Wordpress improved theme handling, internally.</li>
 				<li>Changed &quot;RW WP Logs&quot; tab wording to &quot;Lock Logs&quot;.</li>
			</ul>

			<div><span class='rwwpTitle'><br />Version 2.4.2 - Dec 1st, 2016</div>
			<ul class='rwwpNSUL'>
				<li>Bug fixes and enhancements related to version 2.4.1 changes (Polling and remote locking).</li>
			</ul>

			<div>For older version history, please <a href='http://forums.richweb.com/index.php?topic=16.msg29#msg29' class='rwwpTitle' target='_blank'>visit this post on our forums...</a><br />(Richweb Wordpress Lockdown Plugin version history)</div>
		</div>";

/**
 ** Let's display any alerts here...
 **/
		if($alertCNT > 0){
			echo "<div id='view7'>";
			echo "<p>". $rwBranding . "</p>";
			foreach ($alertMsg as $yep => $yepyep) {
				list($alertHead, $alertBody) = explode("|||", $yepyep);
				echo "<fieldset class='rwAlert2 rwAlertRed'>";
				echo "<legend>" . $alertHead . "</legend>";
				echo "<div>" . $alertBody . "</div>";
				echo "</fieldset>";
			}
			echo "</div>";
		}

		echo "
		<div id='view4'>
			<p>". $rwBranding . "</p>
			<br /><table style='border-collapse: collapse; width: 95%; margin: 0 auto;'>
				<tr><td><b>Date/Time</b></td><td><b>Who</b></td><td><b>IP Address</b></td><td><b>Status</b></td></tr>
";

		global $wpdb;
		$rwResults = $wpdb->get_results("SELECT * FROM $rwwpLockDBTableName ORDER BY tstamp DESC LIMIT 50");
		foreach($rwResults as $rwWPres) {
			echo "<tr><td>" . date('Y-M-d h:i A',$rwWPres->tstamp) . "</td><td>" . $rwWPres->myName . "</td><td>" . $rwWPres->ipaddy . "</td><td>" . $rwWPres->lockStatus . "</td></tr>";
		}			
		echo "
			</table>
		</div>
";

/** 
 ** Moved the config options to its own tab, April 2017.
 **/
		echo "
		<div id='view6'>
			<p>". $rwBranding . "</p>
			<form action='admin.php?page=rw-lockdown' method='post'>
				<input type='hidden' name='rwSITEID' id='rwSITEID' value='" . $rwSITEID . "' />
				<div><br>Set the Richweb Customer ID here...</div>
				<div><b>Customer's EMS ID:</b> <input type='text' name='rwCUSTID' id='rwCUSTID' value='" . $rwCUSTID . "' /></div>

				<div><br><b>Are there any themes or plugins that have been directly customized?</b><br>
					<i>If any of this site's themes or plugin files have been customized directly, and a WP update would overwrite these changes, select &quot;Yes&quot; and save. Otherwise, select (or leave as) &quot;No&quot;...</i><br>
					<label for='CUSTOMTPY'><input type='radio' name='rwCUSTOMTP' id='CUSTOMTPY' value='Y'";

		if ($rwCUSTOMTP == 'Y') {
			echo " checked='checked'";
		}
		echo " />&nbsp; Yes</label><br>

					<label for='CUSTOMTPN'><input type='radio' name='rwCUSTOMTP' id='CUSTOMTPN' value='N'";
			
		if ($rwCUSTOMTP == 'N') {
			echo " checked='checked'";
		}
		echo " />&nbsp; No</label><br>
				</div>

				<div style='text-align: center;'><input type='submit' value='Save Client (EMS) ID'></div>
			</form>
		</div>
		<br class='cr' />&nbsp;
	</div>
</div>
";
	}

/** 	
 ** socket connetion to rw_wp_lockdown_daemon
 ** Jordan needs to better document the comments for each item below. :)
 **/	
	function daemon_connect($opt){
		try {
/** 
 ** checks to make sure we have a known update status string
 **/
			if($opt != 'LOCK' && $opt != 'UNLOCK'){
				return 0;
			}

// We need to make sure that we're dealing with the PROPER site credentialing here...
			$lockcode = md5_file(get_home_path()."/wp-config.php");
			$host = 'localhost';
			$port = 9002;
			$timeout = 15;
			$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)
			or die("Unable to create socket");
			socket_connect($socket,$host,$port);

/** 
 ** get_home_path() gets the wordpress absolute file path for current site
 **/
			$send = $opt . ": " . get_home_path()." : ".$lockcode;
			socket_send($socket, $send,strlen($send),0);

/** 
 ** socket errors self catch so I print the error to screen and return 0 for not updated
 **/
			if (socket_last_error($socket)){
				$e = socket_last_error($socket);
				$this->err(socket_strerror($e));
				return 0;
			}
			socket_close($socket);
			return 1;
		}

		catch (Exception $e) {
			$this->err($e->getMessage());
		}
	}

/** 
 ** default error message for this plugin
 **/
	function err($str){
		echo "<h3>Plugin error: Contact Richweb and send following error<br>";
		echo 'Err:', $str, "</h3>";
	}

	public function login( $user_login, $user ) {
		$users = get_option( 'rw-lockdown-users', array() );

		if(array_key_exists($user->ID,$users)){
			$users = array_map(
				function($u) use($user){
					if($u->ID == $user->ID){
						$timestamp = new DateTime('America/New_York');
						$u->status = "Online";
						$u->timestamp = $timestamp->format("Y-m-d h:ia");
					}
					return $u;
				}, 
				$users
			);
		} else {
			$timestamp = new DateTime('America/New_York');
			$user->status = "Online";
			$user->timestamp = $timestamp->format("Y-m-d h:ia");
			$users[strval($user->ID)] = $user;
		}
		update_option( 'rw-lockdown-users', $users );
	}

	public function logout() {
		$users = get_option( 'rw-lockdown-users', array() );
		$user = wp_get_current_user();
		if(array_key_exists($user->ID,$users)){
			$users = array_map(
				function($u) use($user){
					if($u->ID == $user->ID){
						$timestamp = new DateTime('America/New_York');
						$u->status = "Offline";
						$u->timestamp = $timestamp->format("Y-m-d h:ia");
					}
					return $u;
				},
				$users
			);
		} else {
			$timestamp = new DateTime('America/New_York');
			$user->status = "Offline";
			$user->timestamp = $timestamp->format("Y-m-d h:ia");
			$users[strval($user->ID)] = $user;
		}
		update_option( 'rw-lockdown-users', $users );
	}

	public function get_users(){

// Retrieve the users from Database
		$users = get_option( 'rw-lockdown-users', array() );

// Remove all non existent users
// $users = array_map( array( &$this, 'user_exists' ), $users );
// Guarantee that the array is safe for usage
// $users = array_filter( (array) $users );
		return $users;
	}

	public function user_exists( $user_id ){
		$user = new WP_User( $user_id );

// Check if the users exists
		if ( ! $user->exists() ){
			return false;
		}
		return $user;
	}
}

// End Class rw_lockdown
$rw_lockdown = new rw_lockdown();

function getFileCount($path) {
	$size = 0;
	$ignore = array('.','..','cgi-bin','.DS_Store');
	$files = scandir($path);
	foreach($files as $t) {
		if(in_array($t, $ignore)) continue;

		if (@is_dir(rtrim($path, '/') . '/' . $t)) {
			$size += getFileCount(rtrim($path, '/') . '/' . $t);
		} else {
			$size++;
		}
	}
	return $size;
}

function intoEMS($url, $data) {
	$fields = array(
		'data' => urlencode($data)
	);

//url-ify the data for the POST
	foreach($fields as $key=>$value) {
		$fields_string .= $key.'='.$value.'&';
	}
	rtrim($fields_string, '&');

	$doEMS = curl_init();
	curl_setopt($doEMS, CURLOPT_URL, $url);
	curl_setopt($doEMS, CURLOPT_POST, count($fields));
	curl_setopt($doEMS, CURLOPT_POSTFIELDS, $fields_string);
	curl_setopt($doEMS, CURLOPT_RETURNTRANSFER, TRUE);

//	this is used because rw likes to use invalid ssl certs :P
	curl_setopt($doEMS, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($doEMS, CURLOPT_SSL_VERIFYPEER, 0);

//	grab our info, we can output this if we want to see errors :)
//	curl dumps the output from the html to the screen by default, we want to prevent that;
	ob_start();
	$EMSResult = curl_exec($doEMS);

	if(curl_exec($EMSResult) === false){
		echo '<br>Curl error: ' . curl_error($EMSResult);
	} else {
		echo '<br>Operation completed without any errors';
	}

	curl_close($doEMS);
	$html = ob_end_clean();
	$emsReturn = json_decode ($EMSResult, TRUE);
	return $emsReturn;
}

function rwWPLockDB_install() {
	global $wpdb;
	$rwwpLockDBTableName = $wpdb->prefix . 'rwwpLockLog';
	if($wpdb->get_var("SHOW TABLES LIKE '$rwwpLockDBTableName'") != $rwwpLockDBTableName) {
		$charset_collate = $wpdb->get_charset_collate();
		$sql = "
			CREATE TABLE $rwwpLockDBTableName (
				id int(9) NOT NULL AUTO_INCREMENT,
				tstamp varchar(12) NOT NULL,
				myName text NOT NULL,
				ipaddy varchar(15) NOT NULL,
				lockStatus varchar(55) NOT NULL,
				UNIQUE KEY id (id)
			) $charset_collate;
		";
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
	}
}

/**
 ** Function to handle API calls to the lockdown plugin
 ** API call for polling currently logged in or recently logged in users
 ** API call to lock the website remotely
 **/
function api_status_lock(){
	$dt = new DateTime("now", new DateTimeZone('America/New_York'));
	$dt->setTimestamp(time());
	$passhash = md5(get_option('RW_SITEID', '') . $dt->format('Y/m/d'));
	if($_REQUEST['passhash'] == $passhash){
		if(preg_match('/^\/wp-lockdown\/status\/?\??passhash\=[A-Za-z0-9]{32}$/',$_SERVER['REQUEST_URI'])){
			$rw_lockdown = new rw_lockdown();
			$users = $rw_lockdown->get_users();
			$response = json_encode(array('result'=>$users));
			echo $response;
			exit;
		} else 
		if(preg_match('/^\/wp-lockdown\/lock\/?\??passhash\=[A-Za-z0-9]{32}$/',$_SERVER['REQUEST_URI'])) {
			$rw_lockdown = new rw_lockdown();
			$_REQUEST['lock'] = 'LOCK';
			$result = $rw_lockdown->rw_lockdown();
			$response = json_encode(array('result'=>$result));
			echo $response;
			exit;
		}
	}
}
add_action( 'template_redirect', 'api_status_lock', 9999 );
?>