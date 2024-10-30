<?php
/**
 * @package Motivational_Wordpress
 * @version 1.00
 */
/*
Plugin Name: Motivational_Wordpress
Plugin URI: http://wordpress.org/extend/plugins/motivational-wordpress/
Description: This plugin adds motivational quotes to your WP admin panel.
Author: @wordpressowicz
Version: 1.00
Author URI: http://firma.likala.com/
*/

function motivational_wp_get_lyric() {
	/** These are motivational quotes that are used by the plugin */
	$lyrics = "Challenges are what make life interesting and overcoming them is what makes life meaningful.
If you want to lift yourself up, lift up someone else.
I have been impressed with the urgency of doing. Knowing is not enough; we must apply. Being willing is not enough; we must do.
Limitations live only in our minds.  But if we use our imaginations, our possibilities become limitless.
You take your life in your own hands, and what happens? A terrible thing, no one to blame.
What’s money? A man is a success if he gets up in the morning and goes to bed at night and in between does what he wants to do.
I didn’t fail the test. I just found 100 ways to do it wrong.
In order to succeed, your desire for success should be greater than your fear of failure.
A person who never made a mistake never tried anything new.
The person who says it cannot be done should not interrupt the person who is doing it.
There are no traffic jams along the extra mile.
It is never too late to be what you might have been.
You become what you believe.
I would rather die of passion than of boredom.
A truly rich man is one whose children run into his arms when his hands are empty.
It is not what you do for your children, but what you have taught them to do for themselves, that will make them successful human beings.
If you want your children to turn out well, spend twice as much time with them, and half as much money.
Build your own dreams, or someone else will hire you to build theirs.
The battles that count aren’t the ones for gold medals. The struggles within yourself–the invisible battles inside all of us–that’s where it’s at.
Education costs money.  But then so does ignorance.
I have learned over the years that when one’s mind is made up, this diminishes fear.
It does not matter how slowly you go as long as you do not stop.
If you look at what you have in life, you’ll always have more. If you look at what you don’t have in life, you’ll never have enough.";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function motivational_wp() {
	$chosen = motivational_wp_get_lyric();
	echo "<p id='motivational_wp'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'motivational_wp' );

// We need some CSS to position the paragraph
function motivational_wp_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#motivational_wp {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'motivational_wp_css' );

?>