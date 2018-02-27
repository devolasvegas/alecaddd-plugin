<?php
/**
 * @package AlecadPlugin
 */

namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\CptCallbacks;
use \Inc\Api\Callbacks\AdminCallbacks;
use \Inc\Api\Callbacks\WidgetsCallbacks;
use \Inc\Api\Callbacks\TaxonomiesCallbacks;




class Admin extends BaseController
{

	public $settings;
	public $callbacks;
	public $pages = array();
	public $subpages = array();

	public function register() {
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->setPages();

		$this->setSubpages();

		$this->settings->addPages($this->pages)->withSubPage('Dashboard')->addSubPages($this->subpages)->register();
	}

	public function setPages() {
		$this->pages = array(
			array(
				'page_title' => 'Alecad Plugin',
				'menu_title' => 'Alecad',
				'capability' => 'manage_options',
				'menu_slug' => 'alecad_plugin',
				'callback' => array($this->callbacks, 'adminDashboard'),
				'icon_url' => 'dashicons-store',
				'position' => '110'
			)
		);
	}

	public function setSubpages( ){
		$this->subpages = array(
			array(
				'parent_slug' => 'alecad_plugin',
				'page_title' => 'Custom Post Types',
				'menu_title' => 'CPT',
				'capability' => 'manage_options',
				'menu_slug' => 'alecad_cpt',
				'callback' => array($this->callbacks, 'adminCpt')
			),
			array(
				'parent_slug' => 'alecad_plugin',
				'page_title' => 'Taxonomies',
				'menu_title' => 'Taxonomies',
				'capability' => 'manage_options',
				'menu_slug' => 'alecad_taxonomies',
				'callback' => array($this->callbacks, 'adminTaxonomy')
			),
			array(
				'parent_slug' => 'alecad_plugin',
				'page_title' => 'Widgets',
				'menu_title' => 'Widgets',
				'capability' => 'manage_options',
				'menu_slug' => 'alecad_widgets',
				'callback' => array($this->callbacks, 'adminWidget')
			)
		);
	}

}