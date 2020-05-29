<?php

if( ! function_exists('ArticledAdminNotice') ) {
    class ArticledAdminNotice {
        
        public static $active_plugins = [];

        final static public function init(){
            SELF::$active_plugins = get_option( 'active_plugins' );
            add_action( 'admin_notices', array( get_called_class(), 'admin_notices' ) );
        }
        
        final static public function admin_notices() {

            $found = false;
            foreach( SELF::$active_plugins as $plugin ){
                if( strpos( $plugin, 'AbuFramework' ) !== false ) $found = true;
            }

            if( !$found ) return;

            if( ! empty( $_GET['articled_plugin_recom_hide']) && $_GET['articled_plugin_recom_hide'] == 'yes' ) {
                set_theme_mod( 'articled_plugin_recom_hide', true );
            }
            if( get_theme_mod( 'articled_plugin_recom_hide' ) != true ) {
                $class = 'notice notice-success';
                $message = sprintf( __( '<a href="%1$s" target="_blank">AbuFramework</a> is Modern option framework and super recommended to add <a href="%1$s" target="_blank">this</a> plugin.', 'articled' ), esc_url('https://github.com/yourabusufiyan/abuframework') );
                printf( '<div class="%1$s"><p>%2$s <a href="?articled_plugin_recom_hide=yes">Dismiss</a></p></div>', esc_attr( $class ), wp_kses( $message, wp_kses_allowed_html() ) ); 
            }
        }
    }
}
ArticledAdminNotice::init();