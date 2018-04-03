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
        $activated = isset($option['cpt_manager']) ? $option['cpt_manager'] : false;

        if(!$activated) {
            return;
        }
        
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setSubpages();

        $this->settings->addSubPages($this->subpages)->register();

        add_action('init', array($this, 'activate'));
    }

    public function setSubpages( ){
		$this->subpages = array(
			array(
				'parent_slug' => 'alecad_plugin',
				'page_title' => 'Custom Post Types',
				'menu_title' => 'CPT Manager',
				'capability' => 'manage_options',
				'menu_slug' => 'alecad_cpt',
				'callback' => array($this->callbacks, 'adminCpt')
			)
		);
	}

    public function activate() {
        register_post_type('alecad_products',
            array(
                'labels' => array(
                    'name' => 'Products',
                    'singular_name' => 'Product'
                ),
                'public' => true,
                'has_archive' => true
            )
        );
    }
}