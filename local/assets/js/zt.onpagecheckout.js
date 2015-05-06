/**
 * Zt onepagecheckout
 * @param {type} w
 * @param {type} z
 * @param {type} $
 * @returns {undefined}
 */
(function (w, z, $) {
    /* Reject if zt is not defined */
    if (typeof (z) === 'undefined') {
        console.log('Error: Zt Javsacript Framework not available.');
        return false;
    }
    /* Reject if ajax isn't loaded */
    if (typeof(z.ajax) === 'undefined'){
        console.log('Error: Zt ajax not available.');
        return false;
    }

    /* Local onpagecheckout class */
    var _onepagecheckout = {
        /* Local settings */
        _settings: {
            namespace: 'Ztonepage'
        },
        _init: function(){},
        login: function() {
            var self = this;
            z.ajax.formRequest('#zt-opc-login', {
                data: {
                    zt_cmd: 'ajax.execute',
                    zt_namespace: self._settings.namespace,
                    zt_task: 'userLogin'
                }
            });
        }
    };

    /* Append to Zt JS Framework */
    z.onepagecheckout = _onepagecheckout;
    z.onepagecheckout._init();
    
})(window, zt, zt.$);