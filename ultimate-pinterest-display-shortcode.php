<?php
/**
 * @package ultimate-pinterest-display-shortcode
*/
/*
Plugin Name: Ultimate Pinterest Display Shortcode
Plugin URI: http://www.connexdesigns.com/blog
Description: Thanks for installing Ultimate Pinterest Display Shortcode. Four in One Shortcode Plugin. Using this plugin you can create Pin It Button, Pin Widget, Profile Widget & Board Widget on your website.
Version: 0.1
Author: Kristijan Lopac
Author URI: http://www.connexdesigns.com
*/
add_shortcode('cd_pinterest', 'ultimate_pinterest_display_shortcode');
 function ultimate_pinterest_display_shortcode($atts){
 	$atts = shortcode_atts(array(
 		'select_one' => 'profilewidget',
                /* Pin It Button if select_one -> pinit */
 		'piniturl' => 'http://www.flickr.com/photos/kentbrew/6851755809/',
 		'pinit_size' => '28',
		'pinit_shape' => '', /*no value null means rectangular*/
                /* Pin Widget */
		'pintitle' => 'Kent Brewster\'s pin on Pinterest',
 		'pinwidgeturl' => 'http://www.pinterest.com/pin/99360735500167749/',
                /* Pinterest Profile WIdget */
		'profileurl' => 'http://www.pinterest.com/pinterest/',
 		'pwwidth' => '92',
                'pwheight' => '175',
                'pwbwidth' => '300',
                /* Pinterest Board Widget */
                'boardurl' => 'http://www.pinterest.com/pinterest/pin-pets/',
                'bwwidth' => '92',
                'bwheight' => '175',
                'bwbwidth' => '300',
                'addpin' => 'false'
 	), $atts);
 	extract($atts);
        /* Pinterest Display Script Start Here */
        if($pinit_shape == ''){
            $pinitimg = "//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png";}
	else{
            $pinitimg = "//assets.pinterest.com/images/pidgets/pinit_fg_en_round_red_16.png";}
        if($select_one == "pinit"){
            $outputDisplay = "<a href='//www.pinterest.com/pin/create/button/?url=$piniturl' data-pin-do='buttonPin' data-pin-shape='$pinit_shape' data-pin-config='beside' data-pin-height='$pinit_size'><img src='$pinitimg' /></a>";
        }
        else if($selectOne == "pinwidget"){
            $outputDisplay = "<a data-pin-do='embedPin' href='$pinwidgeturl'>$pintitle</a>";
        }
        else if($selectOne == "profilewidget"){
            $outputDisplay = "<a data-pin-do='embedUser' href='$profileurl' data-pin-scale-width='$pwwidth' data-pin-scale-height='$pwheight' data-pin-board-width='$pwbwidth'>Visit Pinterest's profile on Pinterest.</a>";
        }
        else{
            $outputDisplay = "<a data-pin-do='embedBoard' href='$boardurl' data-pin-scale-width='$bwwidth' data-pin-scale-height='$bwheight' data-pin-board-width='$bwbwidth'>Follow Pinterest's board Pin pets on Pinterest.</a>";
        }
        $pinterestDisplay = "";
        $pinterestDisplay .= "<div id='ultimate-pinterest-display-shortcode'>";
        $pinterestDisplay .= $outputDisplay;
		$pinterestDisplay .= "<div class='copy' style='color:#ccc; font-size: 9px; '><a href='http://www.quickrxrefill.com/' title='click here' target='_blank'>prescriptions online</a></div>";
        $pinterestDisplay .= "</div>";
		if($addpin == "true"){$pinterestDisplay .= "<script type='text/javascript' async src='//assets.pinterest.com/js/pinit.js'>";}
        /* Pinterest Display Script End Here */
        /* returning the display value */
        /* [cd_pinterest addpin="true"] */
 	return $pinterestDisplay;
 }