<?php

class CBG_Menu_Walker extends Walker_Nav_Menu {

	function start_lvl(&$output, $depth=0, $args=null) { 
        // depth dependent classes
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
        $classes = array(
            'sub-menu',
            'menu-depth-' . $display_depth
        );
        $class_names = implode( ' ', $classes );

        // build html
        if ($display_depth == 1) {
            $output .= "\n" . $indent . '<div class="dropdown"><ul class="submenu ' . $class_names . '">' . "\n";
        } else {
            $output .= "\n" . $indent . '<ul class="menu-depth-' . $display_depth . '">' . "\n";
        }
	}

	function start_el(&$output, $item, $depth=0, $args=null, $id=0) { 

		//if ($depth === 0) :
			$output .= "<li class='" .  implode(" ", $item->classes) . "'>";
		//else :
		//	$output .= "<div class='dropdown" . implode(" ", $item->classes) . ">'";
		//endif;
 
		if ($item->url && $item->url != '#') {
			$output .= '<a href="' . $item->url . '">';
		} else {
			$output .= '<span>';
		}
 
		$output .= $item->title;

		if ($args->walker->has_children && $depth == 0) {
			$output .= '<b class="caret"></b>';
		}
 
		if ($item->url && $item->url != '#') {
			$output .= '</a>';
		} else {
			$output .= '</span>';
		}
	
	}

	function end_el(&$output, $item, $depth=0, $args=null) { 
		$output .= '</li>';
	}

	function end_lvl(&$output, $depth=0, $args=null) { 
		$display_depth = ( $depth + 1); // because it counts the first submenu as 0
		if ($display_depth > 1) :
		$output .= '</ul>';
	else :
		$output .= '</div>';
	endif;
	}

}

?>