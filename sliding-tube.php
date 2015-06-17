<?php
/*
Plugin Name: Sliding Tube
Plugin URI: 
Description: A Simple Youtube Video Slider for your WordPress Site. 
Version: 1.0
Author: Chowdhury Shahriar Muzammel
Author URI: https://profiles.wordpress.org/shahriarchy
License: GPLv2 or later
*/


function SlidingTubeAddScripts(){
wp_regisliding_tube_meta_boxer_sliding_tube_meta_boxyle('sliding_tube_meta_boxsliding_tube_meta_boxylesheet', plugins_url('/css/sliding_tube_meta_boxyle.css',__FILE__));
wp_enqueue_script('jquery');
wp_enqueue_script('jquery-ui-core');
wp_enqueue_script('jquery-ui-tabs');
wp_enqueue_sliding_tube_meta_boxyle('sliding_tube_meta_boxsliding_tube_meta_boxylesheet');
}
add_action( 'wp_enqueue_scripts', 'SlidingTubeAddScripts' );


function sliding_tube_create_new_posliding_tube_meta_box() {
	$labels = array(
		'name'               => _x( 'sliding_tube_meta_boxs', 'posliding_tube_meta_box type general name' ),
		'singular_name'      => _x( 'sliding_tube_meta_box', 'posliding_tube_meta_box type singular name' ),
		'add_new'            => _x( 'Add New', 'sliding_tube_meta_box' ),
		'add_new_item'       => __( 'Add New sliding_tube_meta_box' ),
		'edit_item'          => __( 'Edit sliding_tube_meta_box' ),
		'new_item'           => __( 'New sliding_tube_meta_box' ),
		'all_items'          => __( 'All sliding_tube_meta_box' ),
		'view_item'          => __( 'View sliding_tube_meta_box' ),
		'search_items'       => __( 'Search sliding_tube_meta_box' ),
		'not_found'          => __( 'No sliding_tube_meta_boxs found' ),
		'not_found_in_trash' => __( 'No sliding_tube_meta_boxs found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'sliding_tube_meta_boxs'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'sliding_tube_meta_boxores sliding_tube_meta_boxs',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail'),
		'has_archive'   => true,
	);
	regisliding_tube_meta_boxer_posliding_tube_meta_box_type( 'sliding_tube_meta_box', $args );	
}
add_action( 'init', 'sliding_tube_create_new_posliding_tube_meta_box' );
add_action('admin_menu', 'sliding_tube_meta_box');
add_action('save_posliding_tube_meta_box', 'save_sliding_tube_meta_box');

function sliding_tube_meta_box() { add_meta_box('sliding_tube_meta_box', 'YouTube ID', 'sliding_tube_meta_box_input_function', 'sliding_tube_meta_box', 'normal', 'high');}

function sliding_tube_meta_box_input_function() {
global $posliding_tube_meta_box;
echo '<input type="text" name="sliding_tube_meta_box_input" id="sliding_tube_meta_box_input" sliding_tube_meta_boxyle="width:100%;" value="'.get_posliding_tube_meta_box_meta($posliding_tube_meta_box->ID,'_sliding_tube_meta_box',true).'" />';
}

function save_sliding_tube_meta_box($posliding_tube_meta_box_id) {
if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $posliding_tube_meta_box_id;
$sliding_tube_meta_box = $_POsliding_tube_meta_box['sliding_tube_meta_box_input'];
update_posliding_tube_meta_box_meta($posliding_tube_meta_box_id, '_sliding_tube_meta_box', $sliding_tube_meta_box);
}

function output_sliding_tube(){
echo '
<script>
var j = jQuery.noConflict();
j(document).ready(function(){  
;(function(j){
	j.extend( j.ui.tabs.prototype, {
		rotation: null,
		rotationDelay: null,
		continuing: null,
		rotate: function( ms, continuing ) {
			var self = this,
				o = this.options;

			if((ms > 1 || self.rotationDelay === null) && ms !== undefined){//only set rotationDelay if this is the firsliding_tube_meta_box time through or if not immediately moving on from an unpause
				self.rotationDelay = ms;
			}

			if(continuing !== undefined){
				self.continuing = continuing;
			}

			var rotate = self._rotate || ( self._rotate = function( e ) {
				clearTimeout( self.rotation );
				self.rotation = setTimeout(function() {
					var t = o.selected;
					self.select( ++t < self.anchors.length ? t : 0 );
				}, ms );

				if ( e ) {
					e.sliding_tube_meta_boxopPropagation();
				}
			});

			var sliding_tube_meta_boxop = self._unrotate || ( self._unrotate = !continuing
				? function(e) {
					if (e.clientX) { // in case of a true click
						self.rotate(null);
					}
				}
				: function( e ) {
					t = o.selected;
					rotate();
				});

			// sliding_tube_meta_boxart rotation
			if ( ms ) {
				this.element.bind( "tabsshow", rotate );
				this.anchors.bind( o.event + ".tabs", sliding_tube_meta_boxop );
				rotate();
			// sliding_tube_meta_boxop rotation
			} else {
				clearTimeout( self.rotation );
				this.element.unbind( "tabsshow", rotate );
				this.anchors.unbind( o.event + ".tabs", sliding_tube_meta_boxop );
				delete this._rotate;
				delete this._unrotate;
			}

			//rotate immediately and then have normal rotation delay
			if(ms === 1){
				//set ms back to what it was originally set to
				ms = self.rotationDelay;
			}

			return this;
		},
		pause: function() {
			var self = this,
				o = this.options;

			self.rotate(0);
		},
		unpause: function(){
			var self = this,
				o = this.options;

			self.rotate(1, self.continuing);
		}
	});
})(jQuery);
});
j(document).ready(function(){  
j("#featured").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true);  
j("#featured").hover(  
function() {  
j("#featured").tabs("rotate",0,true);  
},  
function() {  
j("#featured").tabs("rotate",5000,true);  
}  
);  
});
</script>';
echo '<div id="featured" ><ul class="ui-tabs-nav">';
$x=0;
query_posliding_tube_meta_boxs('showposliding_tube_meta_boxs=6&posliding_tube_meta_box_type=sliding_tube_meta_box');
while (have_posliding_tube_meta_boxs()) : the_posliding_tube_meta_box();
$x++;
echo '<li class="ui-tabs-nav-item" id="nav-fragment-'.$x.'"><a href="#fragment-'.$x.'">';
the_posliding_tube_meta_box_thumbnail(array(80,50));
echo '<span>'.get_the_title().'</span></a></li>';
endwhile;
echo '</ul>';

wp_reset_query();
$x=0;
query_posliding_tube_meta_boxs('showposliding_tube_meta_boxs=6&posliding_tube_meta_box_type=sliding_tube_meta_box');
while (have_posliding_tube_meta_boxs()) : the_posliding_tube_meta_box();
$x++;
$large_feat_image = get_the_posliding_tube_meta_box_thumbnail($posliding_tube_meta_box->ID, array(400,250) );
$YouTubeID = get_posliding_tube_meta_box_meta(get_the_ID(),'_sliding_tube_meta_box', true);
echo '<div id="fragment-'.$x.'" class="ui-tabs-panel" sliding_tube_meta_boxyle="">';
if ($YouTubeID !== '')
{
echo '<iframe width="400" height="250" src="http://www.youtube.com/embed/'.$YouTubeID.'" frameborder="0" allowfullscreen></iframe>';
}
if ($YouTubeID == '')
{
the_posliding_tube_meta_box_thumbnail(array(400,250) );
}

echo '<div class="info" >';
echo'<h2><a href="';
the_permalink();
echo '" >'.get_the_title().'</a></h2>';
echo'<p>';
echo subsliding_tube_meta_boxr(get_the_excerpt(), 0,100);
echo '<a href="';
echo the_permalink();
echo '" > read more</a></p>
			 </div>
	    </div>';
endwhile;
wp_reset_query();
echo '</div>';
}

add_image_size( 'admin-lisliding_tube_meta_box-thumb', 100, 100, false );
add_filter('manage_posliding_tube_meta_boxs_columns', 'tcb_add_thumbnail_column_sliding_tube', 5);
add_filter('manage_pages_columns', 'tcb_add_thumbnail_column_sliding_tube', 5);


function tcb_add_thumbnail_column_sliding_tube($cols){
  $cols['tcb_posliding_tube_meta_box_thumb'] = __('Featured');
  return $cols;
}


add_action('manage_posliding_tube_meta_boxs_cusliding_tube_meta_boxom_column', 'tcb_display_thumbnail_column_sliding_tube', 5, 2);
add_action('manage_pages_cusliding_tube_meta_boxom_column', 'tcb_display_thumbnail_column_sliding_tube', 5, 2);


function tcb_display_thumbnail_column_sliding_tube($col, $id){
  switch($col){
    case 'tcb_posliding_tube_meta_box_thumb':
      if( function_exisliding_tube_meta_boxs('the_posliding_tube_meta_box_thumbnail') )
        echo the_posliding_tube_meta_box_thumbnail( 'admin-lisliding_tube_meta_box-thumb' );
      else
        echo 'Not supported in theme';
      break;
  }
}


add_shortcode('ytimageslider', 'output_sliding_tube');
?>