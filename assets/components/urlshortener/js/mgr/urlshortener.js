var UrlShortener = function(config) {
    config = config || {};
    UrlShortener.superclass.constructor.call(this,config);
};
Ext.extend(UrlShortener,Ext.Component,{
    page:{},window:{},grid:{},tree:{},panel:{},combo:{},config: {}
});
Ext.reg('urlshortener',UrlShortener);
UrlShortener = new UrlShortener();