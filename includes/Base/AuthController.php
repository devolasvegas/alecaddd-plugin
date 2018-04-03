<?php
/**
 * @package AlecadPlugin
 */

namespace Inc\Base;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;


class AuthController extends BaseController
{
    public $settings;
    public $callbacks;
	public $subpages = array();

    public function register() {

        $option = get_option('alecad_plugin');
        $activated = isset($option['login_manager']) ? $option['login_manager'] : false;

        if(!$activated) {
            return;
        }
        
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setSubpages();

        $this->settings->addSubPages($this->subpages)->register();

    }

    public function setSubpages( ){
		$this->subpages = array(
			array(
				'parent_slug' => 'alecad_plugin',
				'page_title' => 'Login Manager',
				'menu_title' => 'Login Manager',
				'capability' => 'manage_options',
				'menu_slug' => 'alecad_auth',
				'callback' => array($this->callbacks, 'adminAuth')
			)
		);
	}

}