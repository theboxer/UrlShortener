<?php
$urlshortener = $modx->getService('urlshortener','UrlShortener',$modx->getOption('urlshortener.core_path',null,$modx->getOption('core_path').'components/urlshortener/').'model/urlshortener/',$scriptProperties);
if (!($urlshortener instanceof UrlShortener)) return '';


$m = $modx->getManager();
$m->createObjectContainer('UrlShortenerItem');
return 'Table created.';