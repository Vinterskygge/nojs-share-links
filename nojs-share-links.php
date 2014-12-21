<?php

/*
Plugin Name: NO-JS Share Links
Plugin URI: http://github.com/dmakabr
Description: Adds simplest share links to posts.
Version: 0.0.1
Author: Wojciech M. Wnuk
Author URI: https://twitter.com/wojciechmwnuk
*/

function nojs_share_links()
{

    global $post;
    $content = get_the_content( $post->ID );

	if (is_page()) return $content;

	$permalink = esc_url( get_the_permalink( $post->ID ) );
	$title = get_the_title( $post->ID );

    $html = <<<NOJS
<a href="https://www.facebook.com/sharer/sharer.php?u={$permalink}" target="_blank">Facebook</a>
<a href="https://twitter.com/home?status={$title}:%20{$permalink}" target="_blank">Twitter</a>
<a href="https://plus.google.com/share?url={$permalink}" target="_blank">Google+</a>
NOJS;

	return $content . '<hr />' .$html;
}

add_action('nojs_share_links', 'nojs_share_links');

add_filter('the_content', 'nojs_share_links');