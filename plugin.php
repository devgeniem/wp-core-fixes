<?php
/**
 * Plugin name: WP Core Fixes
 * Plugin URI: https://github.com/devgeniem/wp-core-fixes
 * Description: Adds small fixes for bugs in certain versions of WordPress Core
 * Author: Onni Hakala / Geniem Oy
 * Author URI: https://github.com/onnimonni
 * License: MIT
 * License URI: https://opensource.org/licenses/MIT
 * Version: 1.0
 */

global $wp_version;

if ( $wp_version == "4.7" ) {

    /**
     * Version 4.7 has bug which causes rss feeds to be invalid
     * - https://core.trac.wordpress.org/ticket/39141
     */
    add_filter( 'date_i18n', 'core_fixes_rssfeeds_date_donttranslate', 10, 4 );
    function core_fixes_rssfeeds_date_donttranslate( $j, $req_format, $i, $gmt ) {
        if( is_feed() )
            return date($req_format);
        else
            return $j;
    }

}
