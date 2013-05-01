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
        $items = $this->modx->getCollection($this->classKey);

        $this->setProperty('position', count($items));

        return parent::beforeSet();
    }

    public function beforeSave() {
        $name = $this->getProperty('name');

        if (empty($name)) {
            $this->addFieldError('name',$this->modx->lexicon('urlshortener.item_err_ns_name'));
        } else if ($this->doesAlreadyExist(array('name' => $name))) {
            $this->addFieldError('name',$this->modx->lexicon('urlshortener.item_err_ae'));
        }
        return parent::beforeSave();
    }
}
return 'UrlShortenerCreateProcessor';
