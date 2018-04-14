<?php
/**
 * @package AlecadPlugin
 */

namespace Inc\Api\Callbacks;

class CptCallbacks
{


	public function cptSectionManager() {
		echo 'Manage your custom post types.';
    }
    
    public function cptSanitize ($input) {
        return $input;
    }

    public function textField($args) {
        $name = $args['label_for'];
		$option_name = $args['option_name'];
		$input = get_option($option_name);
        
        echo '<input type="text" class="regular-text" id="' . $name . '" name="' . $option_name . '[test][' . $name . ']" value="" placeholder="' . $args['placeholder'] . '" />';
    }

	public function checkboxField($args) {

		$name = $args['label_for'];
		$classes = $args['class'];
		$option_name = $args['option_name'];
		$checkbox = get_option($option_name);

		echo '<div class="' . $classes . '"><input type="checkbox" id="' . $name . '" name="' . $option_name . '[test][' . $name . ']" value="" class="" /><label for="' . $name . '"><div></div></label></div>';
	}

}