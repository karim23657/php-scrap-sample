<?php


namespace PHPSimpleWebScraper;

/**
 * Stores the basic information of the program.
 * @package PHPSimpleWebScraper
 */
class Registry {

    const NAME              = 'Simple Web Scraper';
    const SLUG              = 'SimpleWebScraper';
    const SUBTITLE          = 'Fetches even JavaScript generated contents.';
    const DESCRIPTION       = 'A web page content proxy scraper, supporting JavaScript generated contents, a cross domain solution.';
    const PROGRAM_URI       = 'https://github.com/michaeluno/php-simple-web-scraper';
    const VERSION           = '1.4.3';
    const AUTHOR            = 'Michael Uno';
    const AUTHOR_URI        = 'http://en.michaeluno.jp';

    static public $sFilePath;
    static public $sDirPath;
    static public $sTempDirPath;

    static public function setUp( $sFilePath ) {
        self::$sFilePath    = $sFilePath;
        self::$sDirPath     = dirname( self::$sFilePath );
        self::$sTempDirPath = sys_get_temp_dir() . '/' . self::SLUG;
        // Includes
        require dirname( self::$sDirPath ) . '/vendor/autoload.php';    // composer
        self::registerClasses( include( self::$sDirPath . '/include/class-map.php' ) );
    }

   static public function registerClasses( array $aClasses ) {
        self::$___aAutoLoadClasses = $aClasses + self::$___aAutoLoadClasses;
        spl_autoload_register( array( __CLASS__, 'replyToLoadClass' ) );
    }
        static private $___aAutoLoadClasses = array();
        static public function replyToLoadClass( $sCalledUnknownClassName ) {
            if ( ! isset( self::$___aAutoLoadClasses[ $sCalledUnknownClassName ] ) ) {
                return;
            }
            include( self::$___aAutoLoadClasses[ $sCalledUnknownClassName ] );
        }

}