<?php
/**
 * @package AlecadPlugin
 */

namespace Inc\Api\Callbacks;

use \Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{
	public function adminDashboard() {
		return require_once("$this->plugin_path/templates/admin.php");
	}

	public function adminCpt() {
		return require_once("$this->plugin_path/templates/cpt.php");
	}

	public function adminTaxonomy() {
		return require_once("$this->plugin_path/templates/taxonomy.php");
	}

	public function adminWidget() {
		return require_once("$this->plugin_path/templates/widget.php");
	}

	public function alecadOptionsGroup($input) {
		return $input;
	}

	public function alecadAdminSection() {
		echo 'Check this section out';
	}

	public function alecadTextExample() {
		$value = esc_attr(get_option('text_example'));
		echo '<input type="text class="regular-text" name="text_example" value="' . $value . '" placeholder="Write Something" />';
	}

	public function alecadFirstName() {
		$value = esc_attr(get_option('first_name'));
		echo '<input type="text class="regular-text" name="text_example" value="' . $value . '" placeholder="Write Your First Name" />';
	}
}