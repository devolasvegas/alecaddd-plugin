<?php
/**
 * @package AlecadPlugin
 */

namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;


class Admin extends BaseController
{

	public $settings;
	public $callbacks;
	public $callbacks_mngr;
	public $pages = array();
	public $subpages = array();

	public function register() {
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->callbacks_mngr = new ManagerCallBacks();

		$this->setPages();

		$this->setSubpages();

		$this->setSettings();
		$this->setSections();
		$this->setFields();

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

	public function setSettings() {
		$args = array(
			array(
				'option_group' => 'alecad_plugin_settings',
				'option_name' => 'cpt_manager',
				'callback' => array($this->callbacks, 'checkboxSanitize')
			),
			array(
				'option_group' => 'alecad_plugin_settings',
				'option_name' => 'taxonomy_manager',
				'callback' => array($this->callbacks, 'checkboxSanitize')
			),
			array(
				'option_group' => 'alecad_plugin_settings',
				'option_name' => 'media_widget',
				'callback' => array($this->callbacks, 'checkboxSanitize')
			),
			array(
				'option_group' => 'alecad_plugin_settings',
				'option_name' => 'gallery_manager',
				'callback' => array($this->callbacks, 'checkboxSanitize')
			),
			array(
				'option_group' => 'alecad_plugin_settings',
				'option_name' => 'testimonial_manager',
				'callback' => array($this->callbacks, 'checkboxSanitize')
			),
			array(
				'option_group' => 'alecad_plugin_settings',
				'option_name' => 'templates_manager',
				'callback' => array($this->callbacks, 'checkboxSanitize')
			),
			array(
				'option_group' => 'alecad_plugin_settings',
				'option_name' => 'login_manager',
				'callback' => array($this->callbacks, 'checkboxSanitize')
			),
			array(
				'option_group' => 'alecad_plugin_settings',
				'option_name' => 'membership_manager',
				'callback' => array($this->callbacks, 'checkboxSanitize')
			),
			array(
				'option_group' => 'alecad_plugin_settings',
				'option_name' => 'chat_manager',
				'callback' => array($this->callbacks, 'checkboxSanitize')
			)
		);

		$this->settings->setSettings($args);
	}

	public function setSections() {
		$args = array(
			array(
				'id' => 'alecad_admin_index',
				'title' => 'Settings',
				'callback' => array($this->callbacks, 'alecadAdminSection'),
				'page' => 'alecad_plugin'
			)
		);

		$this->settings->setSections($args);
	}

	public function setFields() {
		$args = array(
			array(
				'id' => 'text_example',
				'title' => 'Text Example',
				'callback' => array($this->callbacks, 'alecadTextExample'),
				'page' => 'alecad_plugin',
				'section' => 'alecad_admin_index',
				'args' => array(
					'label_for' => 'text_example',
					'class' => 'example-class'
				)
			),
			array(
				'id' => 'first_name',
				'title' => 'First Name',
				'callback' => array($this->callbacks, 'alecadFirstName'),
				'page' => 'alecad_plugin',
				'section' => 'alecad_admin_index',
				'args' => array(
					'label_for' => 'text_example',
					'class' => 'example-class'
				)
			)
		);

		$this->settings->setFields($args);
	}

}