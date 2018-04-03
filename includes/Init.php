<?php
/**
 * @package AlecadPlugin
 */

namespace Inc;

final class Init
{
    /**
     * Store all the classes inside an array
     * @return array Full list of classes
     * */
	public static function get_services() {
		return [
			Pages\Dashboard::class,
			Base\Enqueue::class,
			Base\SettingsLinks::class,
			Base\CustomPostTypeController::class
		];
	}

	/**
	 * Loop through the classes, initialize them,
	 * and call the register() method if it exists
	 * @return null
	 */
	public static function register_services() {
		foreach (self::get_services() as $class) {
			$service = self::instantiate($class);
			if(method_exists($service, 'register')) {
				$service->register();
			}
		}
	}

	/**
	 * Initialize the class
	 * @param $class from the services array
	 *
	 * @return mixed class instance new instance of the class
	 */
	private static function instantiate($class) {
		$service = new $class();

		return $service;
	}

}