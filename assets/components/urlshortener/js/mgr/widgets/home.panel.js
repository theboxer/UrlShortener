UrlShortener.panel.Home = function(config) {
    config = config || {};
    Ext.apply(config,{
        border: false
        ,baseCls: 'modx-formpanel'
        ,cls: 'container'
        ,items: [{
            html: '<h2>'+_('urlshortener')+'</h2>'
            ,border: false
            ,cls: 'modx-page-header'
        },{
            xtype: 'modx-tabs'
            ,defaults: { border: false ,autoHeight: true }
            ,border: true
            ,activeItem: 0
            ,hideMode: 'offsets'
            ,items: [{
                title: _('urlshortener.items')
                ,items: [{
                    html: '<p>'+_('urlshortener.intro_msg')+'</p>'
                    ,border: false
                    ,bodyCssClass: 'panel-desc'
                },{
                    xtype: 'urlshortener-grid-items'
                    ,preventRender: true
                    ,cls: 'main-wrapper'
                }]
            }]
        }]
    });
    UrlShortener.panel.Home.superclass.constructor.call(this,config);
};
Ext.extend(UrlShortener.panel.Home,MODx.Panel);
Ext.reg('urlshortener-panel-home',UrlShortener.panel.Home);