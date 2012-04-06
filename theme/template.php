<?php



/**
 * Return a themed set of links.
 *
 * @param $links
 *   A keyed array of links to be themed.
 * @param $attributes
 *   A keyed array of attributes
 * @return
 *   A string containing an unordered list of links.
 *
 * -------------------------------------------------
 * This was copied from a core function called
 * 'theme_links' located in 'includes/theme.inc'
 * and modified as needed.
 *
 * --MAA
 * -------------------------------------------------
 */
 

function phptemplate_links($links, $attributes = array('class' => 'links')) {
  $output = '';

  if (count($links) > 0) {
    $output = '<ul'. drupal_attributes($attributes) .'>';

    $num_links = count($links);
    $i = 1;

    foreach ($links as $key => $link) {
      $class = $key;

      // Add first, last and active classes to the list of links to help out themers.
      //if ($i == 1) {
      //  $class .= ' first';
      //}
      //if ($i == $num_links) {
      //  $class .= ' last';
      //}
      //if (isset($link['href']) && ($link['href'] == $_GET['q'] || ($link['href'] == '<front>' && drupal_is_front_page()))) {
      //  $class .= ' active';
      //}
      //$output .= '<li'. drupal_attributes(array('class' => $class)) .'>';
	  $output .= '<li>';
	  
      if (isset($link['href'])) {
        // Pass in $link as $options, they share the same keys.
        $output .= l($link['title'], $link['href'], $link);
      }
      else if (!empty($link['title'])) {
        // Some links are actually not links, but we wrap these in <span> for adding title and class attributes
        if (empty($link['html'])) {
          $link['title'] = check_plain($link['title']);
        }
        $span_attributes = '';
        //if (isset($link['attributes'])) {
        //  $span_attributes = drupal_attributes($link['attributes']);
        //}
        $output .= '<span'. $span_attributes .'>'. $link['title'] .'</span>';
      }

      $i++;
      $output .= "</li>\n";
    }

    $output .= '</ul>';
  }

  return $output;
}




/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return a string containing the breadcrumb output.
 *
 * -------------------------------------------------
 * This was copied from a core function called
 * 'theme_breadcrumb' located in 'includes/theme.inc'
 * and modified as needed.
 *
 * --MAA
 * -------------------------------------------------
 */
function phptemplate_breadcrumb($breadcrumb) {
  if (!empty($breadcrumb)) {
    return '<div class="wrapper">'. implode(' > ', $breadcrumb) .'</div>';
  } else {
  	return '<div class="wrapper">&nbsp;</div>';
  }
}





/**
 * Sets the body-tag class attribute.
 *
 * Adds 'sidebar-left', 'sidebar-right' or 'sidebars' classes as needed.
 */
function phptemplate_body_class($left, $right, $secondary_links) {
	
	$class = 'nosidebars';

 if (($left != '' || $secondary_links != '') && $right != '') {
    $class = 'sidebars';
  }
  else {	
    if ($left != '') {
      $class = 'left-sidebar';
    }
    if ($right != '') {
      $class = 'right-sidebar';
    } 
  }

  if (isset($class)) {
    print ' class="'. $class .'"';
  }
}



