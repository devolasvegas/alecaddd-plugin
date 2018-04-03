<?php
/**
 * @package AlecadPlugin
 */

namespace Inc\Base;

class Activate
{
	public static function activate(){
		flush_rewrite_rules();

		if(get_option('alecad_plugin')) {
			return;
		}

		$default = array();

		update_option('alecad_plugin', $default);
	}
}