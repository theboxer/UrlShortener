<?php
/**
 * UrlShortener
 *
 * Copyright 2010 by Shaun McCormick <shaun+urlshortener@modx.com>
 *
 * UrlShortener is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * UrlShortener is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * UrlShortener; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
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
    'description' => 'Displays Items.',
    'snippet' => getSnippetContent($sources['source_core'].'/elements/snippets/snippet.urlshortener.php'),
),'',true,true);
$properties = include $sources['build'].'properties/properties.urlshortener.php';
$snippets[0]->setProperties($properties);
unset($properties);

return $snippets;