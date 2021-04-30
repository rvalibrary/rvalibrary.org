<?php

function my_theme_enqueue_styles() {

    $parent_style = 'rpl-libraria-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
	$theme = wp_get_theme();
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css', array(),  $theme->parent()->get('Version'));
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ), wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

//Register and Enqueue Custom Stylesheets
function load_custom_styles(){

	$home_page = 5;
	$history = 634;
	$board_page = 18671;
	$new_yava_page = 19749;
	$local_author = 16690;
	$gellman_page = 16387;
	$art_page = 20145;
	$mg_landing = 20317;
	$mg_private_edit_answers = 20403;
	$mg_private_unanswered = 26735;
	$mg_private_answer = 20405;
	$mg_private_edit_form = 26739;
	$mg_public_answer = 20401;
	$mg_public_search = 22270;
	$bookologist = 21097;
	$volunteen = 22386;
	$sol = 22631;
	$kids_landing = 23141;
	$teens_landing = 13474;
	$exhibit_voter_supp = 23594;
	$exhibit_timeline = 23646;
	$exhibit_zoom = 23645;
	$reopening = 27224;
	$law = 27701;

	wp_register_style('art-event-style', get_template_directory_uri() . '/assets/css/art_card.css', array(), '20210324', 'all');
	wp_register_style('history-style', get_template_directory_uri() . '/assets/css/history_styles.css', array(), '20210324', 'all');
	wp_register_style('local-author-style', get_template_directory_uri() . '/assets/css/local_author_styles.css', array(), '20210324', 'all');
	wp_register_style('logo-animate-style', get_template_directory_uri() . '/assets/css/logo-animate.css', array(), '20210324', 'all');
	wp_register_style('board-style', get_template_directory_uri() . '/assets/css/new-board.css', array(), '20210324', 'all');
	wp_register_style('new-yava-style', get_template_directory_uri() . '/assets/css/new-yava.css', array(), '20210430', 'all');
	wp_register_style('new-art-style', get_template_directory_uri() . '/assets/css/art_page.css', array(), '20210324', 'all');
	wp_register_style('mg-style', get_template_directory_uri() . '/assets/css/master-gardeners.css', array(), '20210324', 'all');
	wp_register_style('bookologist-style', get_template_directory_uri() . '/assets/css/bookologist.css', array(), '20210324', 'all');
	wp_register_style('landing-style', get_template_directory_uri() . '/assets/css/landing.css', array(), '20210324', 'all');
	wp_register_style('voter-suppression-style', get_template_directory_uri() . '/assets/css/voter-suppression.css', array(), '20210324', 'all');

	if( is_page( $history )){
		wp_enqueue_style('history-style');
	}

	if( is_page( array($exhibit_voter_supp, $exhibit_timeline, $exhibit_zoom) ) ) {
		wp_enqueue_style('voter-suppression-style');
	}

	if( is_page( array($kids_landing, $teens_landing, $law) ) ) {
		wp_enqueue_style('landing-style');
	}

	if( is_page($bookologist) ){
		wp_enqueue_style('bookologist-style');
	}

	if( is_page( array($mg_landing, $mg_private_answer, $mg_public_answer, $mg_public_search, $mg_private_edit_answers, $mg_private_edit_form) ) ){
		wp_enqueue_style('mg-style');
	}

	if( is_page( $board_page ) ){
		wp_enqueue_style('board-style');
	}

	if( is_page($home_page)){
		wp_enqueue_style('logo-animate-style');
	}

	if( is_page( array( $new_yava_page, 19749 )  ) ){
		wp_enqueue_style('new-yava-style');
	}

	if( is_page( array($local_author, $gellman_page) ) ){
		wp_enqueue_style('art-event-style');
	}

	if( is_page( array($local_author, $mg_private_unanswered, $mg_public_answer, $mg_public_search, $volunteen, $mg_private_edit_answers, $sol, $reopening) ) ) {
		wp_enqueue_style('local-author-style');
	}

	if( is_page($art_page)){
		wp_enqueue_style('new-art-style');
	}

}

add_action('wp_enqueue_scripts', 'load_custom_styles');
//End Custom Stylesheet Function

//Register and Enqueue Custom Javascript
function load_js_assets() {

	$unknown_page = 15877;
	$gellman_page = 16387;
	$local_author_page = 16690;
	$yava_page = 19749;
	$new_art_page = 20145;
    $mg_landing = 20317;
	$mg_private_edit_answers = 20403;
	$mg_private_edit_form = 26739;
	$mg_private_unanswered = 26735;
	$mg_private_answer = 20405;
	$mg_public_answer = 20401;
	$mg_public_search = 22270;
	$volunteen = 22386;
	$sol = 22631;
	$kids_landing = 23141;
	$teens_landing = 13474;
	$exhibit_voter_supp = 23594;
	$exhibit_timeline = 23646;
    $exhibit_zoom = 23645;
	$reopening = 27224;
	$law = 27701;

	wp_register_script('art-card-js', get_template_directory_uri() . '/assets/js/art-card_click.js', array(), '20201029', true);
	wp_register_script('master-gardener-landing-js', get_template_directory_uri() . '/assets/js/master_gardener.js', array(), '20210227', true);
	wp_register_script('gellman-js', get_template_directory_uri() . '/assets/js/gellman.js', array(), '20201119, true');
	wp_register_script('local-author-js', get_template_directory_uri() . '/assets/js/local_author_collapse.js');
	wp_register_script('yava-js', get_template_directory_uri() . '/assets/js/yava.js');
	wp_register_script('art-js', get_template_directory_uri() . '/assets/js/art_page.js', array(), '20200820', all);
	wp_register_script('law-js', get_template_directory_uri() . '/assets/js/law.js', array(), '20210426', all);
	wp_register_script('mg-answer-form-js', get_template_directory_uri() . '/assets/js/answer-form.js', array(), '20210304', true);
	wp_register_script('mg-edit-answer-js', get_template_directory_uri() . '/assets/js/master-gardener-edit.js', array(), '20210311', true);
	wp_register_script('parallax-landing', get_template_directory_uri() . '/assets/js/parallax.js', array(), '20200422', true);
	wp_register_script('exhibit-voter-suppression-js', get_template_directory_uri() . '/assets/js/voter-supp.js', array(), '20201009', true);
	wp_register_script('exhibit-timeline-js', get_template_directory_uri() . '/assets/js/exhibit-timeline.js', array(), '20201107', true);
	wp_register_script('exhibit-zoom-js', get_template_directory_uri() . '/assets/js/zoom.js', array(), '20201015', true);

	if( is_page($law) ){
		wp_enqueue_script('law-js');
	}

	if( is_page($mg_private_edit_form) ){
		wp_enqueue_script('mg-edit-answer-js');
	}

	if( is_page($exhibit_zoom) ){
		wp_enqueue_script('exhibit-zoom-js');
	}

	if( is_page($mg_landing) ){
		wp_enqueue_script('master-gardener-landing-js');
	}

	if( is_page($exhibit_timeline) ){
		wp_enqueue_script('exhibit-timeline-js');
	}

	if( is_page($exhibit_voter_supp) ){
		wp_enqueue_script('exhibit-voter-suppression-js');
	}

	if( is_page( array($kids_landing, $teens_landing) ) ) {
		wp_enqueue_script('parallax-landing');
	}

	if( is_page($gellman_page) ) {
		wp_enqueue_script('art-card-js');
		wp_enqueue_script('local-author-js');
		wp_enqueue_script('gellman-js');

	}

    if( is_page( array($unknown_page, $art_page, $local_author_page, $reopening) ) ) {
       wp_enqueue_script('art-card-js');
		wp_enqueue_script('local-author-js');
    }

	if( is_page( array( $yava_page, 19749 ) ) ){
		wp_enqueue_script('yava-js');
	}

	if( is_page($mg_private_answer)){
		wp_enqueue_script('mg-answer-form-js');
	}

	if( is_page($new_art_page)){
		wp_enqueue_script('art-js');
	}

	if( is_page( array($mg_private_unanswered, $mg_public_answer, $mg_public_search, $volunteen, $sol, $mg_private_edit_answers) ) ) {
		wp_enqueue_script('local-author-js');
	}

}

add_action('wp_enqueue_scripts', 'load_js_assets');

$subRole = get_role( 'subscriber' );
$subRole->add_cap( 'read_private_pages' );
?>
