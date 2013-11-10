<?php
require_once dirname(__FILE__) . '/model/urlshortener/urlshortener.class.php';

abstract class UrlShortenerBaseManagerController extends modExtraManagerController {
    /** @var UrlShortener $urlshortener */
    public $urlshortener;
    public function initialize() {
        $this->urlshortener = new UrlShortener($this->modx);

        $this->addCss($this->urlshortener->config['cssUrl'].'mgr.css');
        $this->addJavascript($this->urlshortener->config['jsUrl'].'mgr/urlshortener.js');
        $this->addHtml('<script type="text/javascript">
        Ext.onReady(function() {
            UrlShortener.config = '.$this->modx->toJSON($this->urlshortener->config).';
            UrlShortener.config.connector_url = "'.$this->urlshortener->config['connectorUrl'].'";
        });
        </script>');
        return parent::initialize();
    }
    public function getLanguageTopics() {
        return array('urlshortener:default');
    }
    public function checkPermissions() { return true;}
}

/**
 * @package urlshortener
 */
class IndexManagerController extends UrlShortenerBaseManagerController {
    public static function getDefaultController() { return 'home'; }
}