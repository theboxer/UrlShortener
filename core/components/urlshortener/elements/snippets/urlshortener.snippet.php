<?php
/**
 * UrlShortener
 *
 * DESCRIPTION
 *
 * Shorten a given URL and output the shortened version
 *
 * PROPERTIES:
 *
 * &url string required Full URL that has to be shortened
 *
 * USAGE:
 *
 * [[!UrlShortener? &url=`http://www.google.com`]]
 *
 */
$urlshortener = $modx->getService('urlshortener','UrlShortener',$modx->getOption('urlshortener.core_path',null,$modx->getOption('core_path').'components/urlshortener/').'model/urlshortener/',$scriptProperties);
if (!($urlshortener instanceof UrlShortener)) return '';

$url = (string) $modx->getOption('url', $scriptProperties, '');

if (empty($url)) {
    return false;
}

/** @var UrlShortenerItem $hash */
$hash = $modx->getObject('UrlShortenerItem', array('url' => $url));
if ($hash) {
    return $hash->short;
} else {
    $oldObject = $modx->newObject('UrlShortenerItem');
    $oldObject->set('url', $url);
    $oldObject->save();

    $short = $urlshortener->encodeId($oldObject->id);

    while($modx->getObject('modResource', array('alias' => $short))){
        $newObject = $modx->newObject('UrlShortenerItem');
        $newObject->set('url', $url);
        $newObject->save();

        $short = $urlshortener->encodeId($newObject->id);

        $newObject->set('short', $short);
        $newObject->save();
        $oldObject->remove();

        $oldObject = $newObject;
    }

    $siteUrl = $modx->getOption('site_url');

    $oldObject->set('short', $siteUrl.$short);
    if ($oldObject->save()) {
        return $siteUrl.$short;
    } else {
        $modx->log(MODx::LOG_LEVEL_ERROR, '[UrlShortener] Something went wrong while trying to save new shortened URL');
        return false;
    }
}