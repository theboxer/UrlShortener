<?php
/**
 * @package urlshortener
 */
$xpdo_meta_map['UrlShortenerItem']= array (
  'package' => 'urlshortener',
  'version' => NULL,
  'table' => 'urlshortener_items',
  'extends' => 'xPDOSimpleObject',
  'fields' => 
  array (
    'url' => NULL,
    'short' => NULL,
    'clicks' => NULL,
  ),
  'fieldMeta' => 
  array (
    'url' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => false,
    ),
    'short' => 
    array (
      'dbtype' => 'text',
      'phptype' => 'string',
      'null' => false,
      'default' => '',
    ),
    'clicks' => 
    array (
      'dbtype' => 'int',
      'precision' => '16',
      'phptype' => 'integer',
      'null' => false,
      'default' => 0,
    ),
  ),
);
