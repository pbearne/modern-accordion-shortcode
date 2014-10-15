<?php
/*
Plugin Name: Modern Accordion Shortcode
Description: A quick and easy shortcode for adding accordions to posts and pages.
Author: Ryan Adolphson
Version: 0.5
Author URI: http://ryanadolphson.me
*/

/**
 * MOD_Accordion_Shortcode class.
 */
class MOD_Accordion_Shortcode
{

	static $add_script;
	static $shortcode_count;
	static $shortcode_js_data;

	/**
	 * init function.
	 *
	 * @access public
	 * @static
	 * @return void
	 */
	static function init()
	{

		add_shortcode('accordion', array(__CLASS__, 'accordion_shortcode'));
		add_shortcode('accordions', array(__CLASS__, 'accordions_shortcode'));

		add_action('init', array(__CLASS__, 'register_script'));
		add_action('wp_footer', array(__CLASS__, 'print_script'));

		self::$shortcode_count = 0;

	}

	/**
	 * accordion_shortcode function.
	 *
	 * @access public
	 * @static
	 * @param mixed $atts
	 * @param mixed $content
	 * @return void
	 */
	public static function accordion_shortcode( $atts, $content = null )
	{
		global $post;

		$shortcode_atts = shortcode_atts(array(
			'title' => null,
			'class' => null,
			'icontype' => null,
		), $atts);

		$title 		= array_key_exists( 'title',  $shortcode_atts ) ? $shortcode_atts['title'] :null;
		$icontype 	= array_key_exists( 'icontype',  $shortcode_atts ) ? $shortcode_atts['icontype'] : null;
		$class 		= array_key_exists( 'class',  $shortcode_atts ) ? $shortcode_atts['class'] : null;

		ob_start();

		if ( $title ): ?>
			<h3 id="<?php echo esc_attr( $title . "-" . self::$shortcode_count ); ?>">
				<div class="mas-icon mas-<?php echo esc_attr( $icontype ); ?>"></div>
				<a href="#<?php echo esc_attr( $title . "-" . self::$shortcode_count ); ?>"><?php echo $title; ?> </a>
			</h3>

			<div class="mas-content <?php echo esc_attr( $class ); ?>">
				<?php echo do_shortcode( $content ); ?>
			</div>
		<?php elseif ($post->post_title): ?>
			<h3 id="<?php echo esc_attr( $post->post_title . "-" . self::$shortcode_count ); ?>">
				<a href="#<?php echo esc_attr( $post->post_title . "-" . self::$shortcode_count ); ?>"><?php echo $post->post_title; ?> </a>
			</h3>

			<div class="mas-content <?php echo esc_attr( $class ); ?>">
				<?php echo do_shortcode($content); ?>
			</div>
		<?php
		else:
			// TODO: translate this string
			?>
			<span style="color:red">Please enter a title attribute like [accordion title="title name"]accordion content[accordion]</span>
		<?php endif;

		self::$shortcode_count++;

		return ob_get_clean();
	}

	/**
	 * eval_bool function.
	 *
	 * @access public
	 * @static
	 * @param mixed $item
	 * @return void
	 */
	static function eval_bool($item, $index)
	{
		if ( ! array_key_exists( $index, $item ) ) {
			return false;
		}

		return ( (string)$item[$index] == 'false' || (string)$item[$index] == 'null' || (string)$item[$index] == '0' || empty($item[$index]) ? false : true );
	}

	/**
	 * accordions_shortcode function.
	 *
	 * @access public
	 * @static
	 * @param mixed $atts
	 * @param mixed $content
	 * @return void
	 */
	public static function accordions_shortcode( $atts, $content )
	{
		//	var_dump($atts);
		self::$add_script = true;
		if ( is_string( $atts ) )
			$atts = array();

		$attr['autoHeight']  = self::eval_bool( $atts, 'autoheight' );
		$attr['disabled']    = self::eval_bool( $atts, 'disabled' );
		$attr['active']      = ( array_key_exists( 'active', $atts ) ) ? (int)$atts['active'] : 0;
		$attr['clearStyle']  = self::eval_bool( $atts, 'clearstyle' );
		$attr['collapsible'] = self::eval_bool( $atts, 'collapsible' );
		$attr['fillSpace']   = self::eval_bool( $atts, 'fillspace' );
		//	var_dump($attr);
		$query_atts = shortcode_atts(array(
			'autoHeight' => false,
			'disabled' => false,
			'active' => 1,
			'animated' => 'slide',
			'clearStyle' => false,
			'collapsible' => false,
			'event' => 'click',
			'fillSpace' => false,
			'heightStyle' => 'content',
			'animate' => 500,
		), $attr);
		//$query_atts['active'] = (int)$query_atts['active'];
		$id = "random-accordion-id-" . rand( 0, 1000 );

		$content = str_replace( "]<br />", "]", ( substr( $content, 0, 6 ) == "<br />" ? substr( $content, 6 ) : $content ) );

		self::$shortcode_js_data[$id] = $query_atts;

		return str_replace( "\r\n", '', '<div id="' . esc_attr( $id ) . '" class="mas">' . do_shortcode( $content ) . '</div>' );

	}

	/**
	 * register_script function.
	 *
	 * @access public
	 * @static
	 * @return void
	 */
	static function register_script()
	{
		wp_enqueue_style( 'modern-accordion-style', plugins_url( 'accordion.css', __FILE__ ), true );
		wp_register_script( 'modern-accordion-shortcode', plugins_url( 'accordion.js', __FILE__ ), array( 'jquery', 'jquery-ui-core', 'jquery-ui-accordion' ), '1.0', true );
	}


	/**
	 * print_script function.
	 *
	 * @access public
	 * @static
	 * @return void
	 */
	static function print_script()
	{

		if ( ! self::$add_script )
			return;

		wp_enqueue_script( 'modern-accordion-shortcode' );
		wp_localize_script( 'modern-accordion-shortcode', 'accordion_shortcode', self::$shortcode_js_data );
	}
}

// lets play
MOD_Accordion_Shortcode::init();
