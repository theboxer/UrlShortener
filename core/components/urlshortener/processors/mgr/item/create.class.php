<?php
/**
 * Create an Item
 * 
 * @package urlshortener
 * @subpackage processors
 */
class UrlShortenerCreateProcessor extends modObjectCreateProcessor {
    public $classKey = 'UrlShortenerItem';
    public $languageTopics = array('urlshortener:default');
    public $objectType = 'urlshortener.items';

    public function beforeSet(){
        $url = $this->getProperty('url');

        if (empty($url)) {
            $this->addFieldError('url',$this->modx->lexicon('urlshortener.item_err_ns_url'));
        } else if ($this->doesAlreadyExist(array('url' => $url))) {
            $this->addFieldError('url',$this->modx->lexicon('urlshortener.item_err_ae'));
        }

        return parent::beforeSet();
    }

    public function afterSave(){
        $urlShortener = new UrlShortener($this->modx);

        $short = $urlShortener->encodeId($this->object->id);

        while($this->modx->getObject('modResource', array('alias' => $short))){
            $newObject = $this->modx->newObject('UrlShortenerItem');
            $newObject->set('url', $this->object->url);
            $newObject->save();
            $short = $urlShortener->encodeId($newObject->id, true);
            $newObject->set('short', $short);
            $newObject->save();
            $this->object->remove();
            $this->object = $newObject;
        }

        $siteUrl = $this->modx->getOption('site_url');

        $this->object->set('short', $siteUrl.$short);
        $this->object->save();

        return parent::afterSave();
    }

}
return 'UrlShortenerCreateProcessor';
