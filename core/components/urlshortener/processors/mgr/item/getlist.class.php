<?php
/**
 * Get list Items
 *
 * @package urlshortener
 * @subpackage processors
 */
class UrlShortenerGetListProcessor extends modObjectGetListProcessor {
    public $classKey = 'UrlShortenerItem';
    public $languageTopics = array('urlshortener:default');
    public $defaultSortField = 'id';
    public $defaultSortDirection = 'DESC';
    public $objectType = 'urlshortener.items';

    public function prepareQueryBeforeCount(xPDOQuery $c) {   
        $query = $this->getProperty('query');
        if (!empty($query)) {
            $c->where(array(
                    'url:LIKE' => '%'.$query.'%',
                ));
        }
        return $c;
    }
}
return 'UrlShortenerGetListProcessor';