<?php
if ($modx->event->name == 'OnPageNotFound') {
    $UrlShortener = $modx->getService('urlshortener','UrlShortener',$modx->getOption('urlshortener.core_path',null,$modx->getOption('core_path').'components/urlshortener/').'model/urlshortener/',$scriptProperties);
    if (!($UrlShortener instanceof UrlShortener)) return '';

    $get = $modx->getOption('GET', $modx->request->parameters, '');
    $short = $get['q'];

    $url = $modx->getObject('UrlShortenerItem', $UrlShortener->decodeHash($short));
    if($url){
        $url->set('clicks', $url->clicks + 1);
        $url->save();

        $modx->sendRedirect($url->url);
    }
}