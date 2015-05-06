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
        _settings: {},
        _init: function(){},
        login: function(username,password) {
            z.ajax.request({
                data: {
                    zt_cmd: 'ajax.execute',
                    zt_namespace: 'Ztonepage',
                    zt_task: 'userLogin',
                    username: 'admin',
                    password: 'admin'
                }
            })
        }
    };

    /* Append to Zt JS Framework */
    z.onepagecheckout = _onepagecheckout;
    z.onepagecheckout._init();
    
})(window, zt, zt.$);

function login (username,password) {
            zt.ajax.request({
                data: {
                    zt_cmd: 'ajax.execute',
                    zt_namespace: 'Ztonepage',
                    zt_task: 'userLogin',
                    username: 'admin',
                    password: 'admin'
                }
            })
        }
