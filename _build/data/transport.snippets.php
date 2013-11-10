<?php
/**
 * UrlShortener
 * @package urlshortener
 */
/**
 * Add snippets to build
 * 
 * @package urlshortener
 * @subpackage build
 */
$snippets = array();

$snippets[0]= $modx->newObject('modSnippet');
$snippets[0]->fromArray(array(
    'id' => 0,
    'name' => 'UrlShortener',
    'description' => 'Shorten given URL',
    'snippet' => getSnippetContent($sources['snippets'] . 'urlshortener.snippet.php'),
),'',true,true);

//$properties = include $sources['build'].'properties/properties.urlshortener.php';
//$snippets[0]->setProperties($properties);
//unset($properties);

return $snippets;