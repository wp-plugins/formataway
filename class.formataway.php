<?php
class Formataway {
	private static $initiated = false;
	
	// Store the formats to take away so they can be fetched only once.
	private static $formats;

	public static function init() {
		if(!self::$initiated) {
		    self::$formats = apply_filters('formataway_formats', get_option('formataway_formats', array()));
		    
		    // To be used in modifying the main query, we need to transform the formats array.
		    // We need to turn post formats like "quote" into their taxonomy slugs: "post-format-quote".
		    for($i = count(self::$formats) - 1; $i >= 0; --$i) {
		        self::$formats[$i] = 'post-format-' . self::$formats[$i];
		    }
		    
			self::init_hooks();
		}
	}

	public static function init_hooks() {
		self::$initiated = true;
		
		if(count(self::$formats) != 0) {
		    add_action('pre_get_posts', array('Formataway', 'pre_get_posts'));
		}
	}
	
	/**
	 * pre_get_posts is run before a query queries, allowing us to modify what
	 * it will and will not return. This is where we'll formataway!
	 */
	public static function pre_get_posts($query) {
	    // http://codex.wordpress.org/Function_Reference/is_home
	    // Only true for the "blog posts index page", which is what we want.
	    if(!$query->is_home())
	        return;
	        
	    // We only want to modify the main query here.
	    if(!$query->is_main_query())
	        return;
	    
	    // TODO: Don't use ->set (because it'll overwrite any existing tax_query
	    // constraints. Not sure how to get around this yet :(
	    
        $query->set('tax_query', array(
            array(
                'taxonomy'  => 'post_format',   // Post formats are queried as taxonomies
                'field'     => 'slug',
                'terms'     => self::$formats,
                'operator'  => 'NOT IN'
            )
        ));
	}
}