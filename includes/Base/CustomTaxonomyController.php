<?php
/**
 * @package AlecadPlugin
 */

namespace Inc\Base;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;


class CustomTaxonomyController extends BaseController
{
    public $settings;
    public $callbacks;
	public $subpages = array();

    public function register() {

        $option = get_option('alecad_plugin');
        $activated = isset($option['taxonomy_manager']) ? $option['taxonomy_manager'] : false;

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
				'page_title' => 'Custom Taxonomies',
				'menu_title' => 'Taxonomy Manager',
				'capability' => 'manage_options',
				'menu_slug' => 'alecad_taxonomy',
				'callback' => array($this->callbacks, 'adminTaxonomy')
			)
		);
	}

}