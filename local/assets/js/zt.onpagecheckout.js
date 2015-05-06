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
            namespace: 'Ztonepage',
            option: "com_virtuemart"
        },
        _init: function(){
            var self = this;
            /* Hook login form */
            $(w.document).ready(function(){
                z.ajax.formHook('#zt-opc-login', {
                    data: {
                        zt_cmd: "ajax",
                        zt_namespace: self._settings.namespace,
                        option: self._settings.option,
                        zt_task: "userLogin",
                        view: "cart"
                    }
                }); 
            });
        }
    };

    /* Append to Zt JS Framework */
    z.onepagecheckout = _onepagecheckout;
    z.onepagecheckout._init();
    
})(window, zt, zt.$);