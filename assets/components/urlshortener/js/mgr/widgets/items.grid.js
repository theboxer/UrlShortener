
UrlShortener.grid.Items = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        id: 'urlshortener-grid-items'
        ,url: UrlShortener.config.connectorUrl
        ,baseParams: {
            action: 'mgr/item/getlist'
        }
        ,fields: ['id','url','short', 'clicks']
        ,autoHeight: true
        ,paging: true
        ,remoteSort: true
        ,columns: [{
            header: _('id')
            ,dataIndex: 'id'
            ,width: 70
            ,hidden: true
        },{
            header: _('urlshortener.url')
            ,dataIndex: 'url'
            ,width: 200
        },{
            header: _('urlshortener.short')
            ,dataIndex: 'short'
            ,width: 250
        },{
            header: _('urlshortener.clicks')
            ,dataIndex: 'clicks'
            ,width: 250
        }]
        ,tbar: [{
            text: _('urlshortener.item_create')
            ,handler: this.createItem
            ,scope: this
        },'->',{
            xtype: 'textfield'
            ,id: 'urlshortener-search-filter'
            ,emptyText: _('urlshortener.search') + '...'
            ,listeners: {
                'change': {fn:this.search,scope:this}
                ,'render': {fn: function(cmp) {
                    new Ext.KeyMap(cmp.getEl(), {
                        key: Ext.EventObject.ENTER
                        ,fn: function() {
                            this.fireEvent('change',this);
                            this.blur();
                            return true;
                        }
                        ,scope: cmp
                    });
                },scope:this}
            }
        }]
    });
    UrlShortener.grid.Items.superclass.constructor.call(this,config);
};
Ext.extend(UrlShortener.grid.Items,MODx.grid.Grid,{
    windows: {}

    ,getMenu: function() {
        var m = [];
        m.push({
            text: _('urlshortener.item_remove')
            ,handler: this.removeItem
        });
        this.addContextMenuItem(m);
    }
    
    ,createItem: function(btn,e) {
        this.createUpdateItem(btn, e, false);
    }

    ,updateItem: function(btn,e) {
        this.createUpdateItem(btn, e, true);
    }

    ,createUpdateItem: function(btn,e,isUpdate) {
        var r;

        if(isUpdate){
            if (!this.menu.record || !this.menu.record.id) return false;
            r = this.menu.record;
        }else{
            r = {};
        }
        this.windows.createUpdateItem = MODx.load({
            xtype: 'urlshortener-window-item-create-update'
            ,isUpdate: isUpdate
            ,title: (isUpdate) ?  _('urlshortener.item_update') : _('urlshortener.item_create')
            ,record: r
            ,listeners: {
                'success': {fn:function() { this.refresh(); },scope:this}
            }
        });

        this.windows.createUpdateItem.fp.getForm().reset();
        this.windows.createUpdateItem.fp.getForm().setValues(r);
        this.windows.createUpdateItem.show(e.target);
    }
    
    ,removeItem: function(btn,e) {
        if (!this.menu.record) return false;
        
        MODx.msg.confirm({
            title: _('urlshortener.item_remove')
            ,text: _('urlshortener.item_remove_confirm')
            ,url: this.config.url
            ,params: {
                action: 'mgr/item/remove'
                ,id: this.menu.record.id
            }
            ,listeners: {
                'success': {fn:function(r) { this.refresh(); },scope:this}
            }
        });
    }

    ,search: function(tf,nv,ov) {
        var s = this.getStore();
        s.baseParams.query = tf.getValue();
        this.getBottomToolbar().changePage(1);
        this.refresh();
    }
});
Ext.reg('urlshortener-grid-items',UrlShortener.grid.Items);

UrlShortener.window.CreateUpdateItem = function(config) {
    config = config || {};
    this.ident = config.ident || 'urlshortener-window-item-create-update';
    Ext.applyIf(config,{
        id: this.ident
        ,height: 150
        ,width: 475
        ,closeAction: 'close'
        ,url: UrlShortener.config.connectorUrl
        ,action: (config.isUpdate)? 'mgr/item/update' : 'mgr/item/create'
        ,fields: [{
            xtype: 'textfield'
            ,name: 'id'
            ,id: this.ident+'-id'
            ,hidden: true
        },{
            xtype: 'textfield'
            ,fieldLabel: _('urlshortener.url')
            ,name: 'url'
            ,id: this.ident+'-url'
            ,anchor: '100%'
        }]
    });
    UrlShortener.window.CreateUpdateItem.superclass.constructor.call(this,config);
};
Ext.extend(UrlShortener.window.CreateUpdateItem,MODx.Window);
Ext.reg('urlshortener-window-item-create-update',UrlShortener.window.CreateUpdateItem);

