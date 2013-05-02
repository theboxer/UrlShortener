<?php
/**
 * Loads the home page.
 *
 * @package urlshortener
 * @subpackage controllers
 */
class UrlShortenerHomeManagerController extends UrlShortenerBaseManagerController {
    public function process(array $scriptProperties = array()) {

    }
    public function getPageTitle() { return $this->modx->lexicon('urlshortener'); }
    public function loadCustomCssJs() {
        $this->addJavascript($this->urlshortener->config['jsUrl'].'mgr/widgets/items.grid.js');
        $this->addJavascript($this->urlshortener->config['jsUrl'].'mgr/widgets/home.panel.js');
        $this->addLastJavascript($this->urlshortener->config['jsUrl'].'mgr/sections/home.js');
    }
    public function getTemplateFile() { return $this->urlshortener->config['templatesPath'].'home.tpl'; }
}