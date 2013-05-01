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
      'dbtype' => 'varchar',
      'precision' => '255',
      'phptype' => 'string',
      'null' => false,
    ),
    'short' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '32',
      'phptype' => 'string',
      'null' => false,
    ),
    'clicks' => 
    array (
      'dbtype' => 'int',
      'precision' => '16',
      'phptype' => 'integer',
      'null' => false,
    ),
  ),
);
