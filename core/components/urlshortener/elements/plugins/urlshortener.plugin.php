<?php
if ($modx->event->name == 'OnPageNotFound') {
    $urlshortener = $modx->getService('urlshortener','UrlShortener',$modx->getOption('urlshortener.core_path',null,$modx->getOption('core_path').'components/urlshortener/').'model/urlshortener/',$scriptProperties);
    if (!($urlshortener instanceof UrlShortener)) return '';

    $get = $modx->getOption('GET', $modx->request->parameters, '');
    $short = $get['q'];

    $url = $modx->getObject('UrlShortenerItem', $urlshortener->decodeHash($short));
    if($url){
        $url->set('clicks', $url->clicks + 1);
        $url->save();

        $modx->sendRedirect($url->url);
    }
}