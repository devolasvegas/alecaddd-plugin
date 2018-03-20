<?php
/**
 * @package AlecadPlugin
 */

namespace Inc\Api\Callbacks;

use \Inc\Base\BaseController;

class ManagerCallbacks extends BaseController
{

	public function checkboxSanitize($input) {
		return $input;
	}

}