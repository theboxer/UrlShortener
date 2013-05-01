<?php
/**
 * Remove an Item.
 * 
 * @package urlshortener
 * @subpackage processors
 */
class UrlShortenerRemoveProcessor extends modObjectRemoveProcessor {
    public $classKey = 'UrlShortenerItem';
    public $languageTopics = array('urlshortener:default');
    public $objectType = 'urlshortener.items';
}
return 'UrlShortenerRemoveProcessor';