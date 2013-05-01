Ext.onReady(function() {
    MODx.load({ xtype: 'urlshortener-page-home'});
});

UrlShortener.page.Home = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        components: [{
            xtype: 'urlshortener-panel-home'
            ,renderTo: 'urlshortener-panel-home-div'
        }]
    });
    UrlShortener.page.Home.superclass.constructor.call(this,config);
};
Ext.extend(UrlShortener.page.Home,MODx.Component);
Ext.reg('urlshortener-page-home',UrlShortener.page.Home);