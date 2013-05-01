<?php
/**
 * @package urlshortener
 */
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\', '/') . '/urlshorteneritem.class.php');
class UrlShortenerItem_mysql extends UrlShortenerItem {}
?>