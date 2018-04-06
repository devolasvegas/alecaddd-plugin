<?php
/**
 * @package AlecadPlugin
 */

namespace Inc\Base;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;


class TemplateController extends BaseController
{
    public $settings;
    public $callbacks;
	public $subpages = array();

    public function register() {

        if(!$this->activated('templates_manager')) {
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
				'page_title' => 'Templates Manager',
				'menu_title' => 'Templates Manager',
				'capability' => 'manage_options',
				'menu_slug' => 'alecad_templates',
				'callback' => array($this->callbacks, 'adminTemplates')
			)
		);
	}

}