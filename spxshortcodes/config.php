<?php
/**
	Author: cfdev
	website: http://cfdev.fr/
	Shortcodes plugin: http://secretsitebox.fr/site/index.php?categorie2/pluxml-plugins#post-10/
	
*/     
   
   
/**
*/
function cfFBComments( $atts, $content = null ) {

	global $plxShow;

	return $plxShow->callHook('showFBComments',$atts);
}

add_shortcode('FBCOMMENTS', 'cfFBComments');

/**
*/
function cfFBComments_static( $atts, $content = null ) {

	global $plxShow;

	return $plxShow->callHook('showFBCommentsStatic',$atts);
}

add_shortcode('FBCOMMENTS_STATIC', 'cfFBComments_static');

?>

