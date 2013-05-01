<?php
/**
 * UrlShortener Connector
 *
 * @package urlshortener
 */
require_once dirname(dirname(dirname(dirname(__FILE__)))).'/config.core.php';
require_once MODX_CORE_PATH.'config/'.MODX_CONFIG_KEY.'.inc.php';
require_once MODX_CONNECTORS_PATH.'index.php';

$corePath = $modx->getOption('urlshortener.core_path',null,$modx->getOption('core_path').'components/urlshortener/');
require_once $corePath.'model/urlshortener/urlshortener.class.php';
$modx->urlshortener = new UrlShortener($modx);

$modx->lexicon->load('urlshortener:default');

/* handle request */
$path = $modx->getOption('processorsPath',$modx->urlshortener->config,$corePath.'processors/');
$modx->request->handleRequest(array(
    'processors_path' => $path,
    'location' => '',
));