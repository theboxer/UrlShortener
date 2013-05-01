<?php
/**
 * Update an Item
 * 
 * @package urlshortener
 * @subpackage processors
 */

class UrlShortenerUpdateProcessor extends modObjectUpdateProcessor {
    public $classKey = 'UrlShortenerItem';
    public $languageTopics = array('urlshortener:default');
    public $objectType = 'urlshortener.items';

    public function beforeSave() {
//        $name = $this->getProperty('name');
//        $id = $this->getProperty('id');
//
//        /** @var UrlShortenerItem $currentItem */
//        $currentItem = $this->modx->getObject($this->classKey, $id);
//
//        if (empty($name)) {
//            $this->addFieldError('name',$this->modx->lexicon('urlshortener.item_err_ns_name'));
//
//        } else if ($this->modx->getCount($this->classKey, array('name' => $name)) && $currentItem->get('name') != $name) {
//            $this->addFieldError('name',$this->modx->lexicon('urlshortener.item_err_ae'));
//        }
//
//        die(var_dump($this->getProperties()));

        return parent::beforeSave();
    }

}
return 'UrlShortenerUpdateProcessor';