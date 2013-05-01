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
 * Properties for the UrlShortener snippet.
 *
 * @package urlshortener
 * @subpackage build
 */
$properties = array(
    array(
        'name' => 'tpl',
        'desc' => 'prop_urlshortener.tpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'Item',
        'lexicon' => 'urlshortener:properties',
    ),
    array(
        'name' => 'sortBy',
        'desc' => 'prop_urlshortener.sortby_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'name',
        'lexicon' => 'urlshortener:properties',
    ),
    array(
        'name' => 'sortDir',
        'desc' => 'prop_urlshortener.sortdir_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'ASC',
        'lexicon' => 'urlshortener:properties',
    ),
    array(
        'name' => 'limit',
        'desc' => 'prop_urlshortener.limit_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 5,
        'lexicon' => 'urlshortener:properties',
    ),
    array(
        'name' => 'outputSeparator',
        'desc' => 'prop_urlshortener.outputseparator_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'urlshortener:properties',
    ),
    array(
        'name' => 'toPlaceholder',
        'desc' => 'prop_urlshortener.toplaceholder_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => true,
        'lexicon' => 'urlshortener:properties',
    ),
/*
    array(
        'name' => '',
        'desc' => 'prop_urlshortener.',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'urlshortener:properties',
    ),
    */
);

return $properties;