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
    if (typeof (z.ajax) === 'undefined') {
        console.log('Error: Zt ajax not available.');
        return false;
    }

    /* Local onpagecheckout class */
    var _onepagecheckout = {
        /* Local settings */
        _settings: {
        },
        _init: function () {
            var self = this;
            /* Hook login form */
            $(w.document).ready(function () {
                self._rebind();
            });
            self.ajax._parent = self;
        },
        /* Local ajax */
        ajax: {
            _settings: {
                data: {
                    zt_cmd: "ajax",
                    zt_namespace: "Ztonepage",
                    option: "com_virtuemart",
                    view: "cart",
                    format: "json"
                }
            },
            formHook: function (selector, data) {
                var self = this;
                var data = (typeof (data) === 'undefined') ? {} : data;
                var buffer = {};
                $.extend(true, buffer, self._settings);
                $.extend(true, buffer, data);
                z.ajax.formHook(selector, buffer, true, function(){
                    self._parent._rebind();
                });
            }
        },
        /**
         * Request Joomla user login
         * @returns {undefined}
         */
        login: function () {
            var self = this;
            self.ajax.formHook('#zt-opc-login', {
                data: {
                    zt_task: "userLogin"
                }
            });
        },
        /**
         * Request Joomla user register
         * @returns {undefined}
         */
        register: function () {
            var self = this;
            self.ajax.formHook('#zt-opc-register', {
                data: {
                    zt_task: "userRegister"
                }
            });
        },
        /**
         * Update bill to function
         * @returns {undefined}
         */
        updateBillTo: function () {
            var self = this;
            z.ajax.formHook('#zt-opc-billto-form', {
                data: {
                    zt_task: "updateBillTo"
                }
            });
        },
        /**
         * Rebind function
         * @returns {undefined}
         */
        _rebind: function () {
            var self = this;
            self.updateBillTo();
            self.login();
            self.register();
        }
    };

    /* Append to Zt JS Framework */
    z.onepagecheckout = _onepagecheckout;
    z.onepagecheckout._init();

})(window, zt, zt.$);
