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
            /* Local ajax settings */
            _settings: {
                data: {
                    zt_cmd: "ajax",
                    zt_namespace: "Ztonepage",
                    option: "com_virtuemart",
                    view: "cart",
                    format: "json"
                }
            },
            /**
             * Form hook
             * @param {type} selector
             * @param {type} data
             * @returns {Boolean}
             */
            formHook: function (selector, data) {
                if ($(selector).length <= 0) {
                    return false;
                }
                var self = this;
                var data = (typeof (data) === 'undefined') ? {} : data;
                var buffer = {};
                $.extend(true, buffer, self._settings);
                $.extend(true, buffer, data);
                z.ajax.formHook(selector, buffer, true, function () {
                    self._parent._rebind();
                });
            },
            /**
             * Ajax request
             * @param {type} data
             * @returns {undefined}
             */
            request: function (data) {
                var self = this;
                var data = (typeof (data) === 'undefined') ? {} : data;
                var buffer = {};
                $.extend(true, buffer, self._settings);
                $.extend(true, buffer, data);
                z.ajax.request(buffer).done(function () {
                    self._parent._rebind();
                });
            }
        },
        /**
         * Request Joomla user login
         * @returns {undefined}
         */
        login: function () {
            z.ajax.unHook('#zt-opc-login');
            this.ajax.formHook('#zt-opc-login', {
                data: {
                    zt_task: "userLogin"
                }
            });
        },
        guestCheckout: function () {
            z.ajax.unHook('#zt-opc-user');
            this.ajax.formHook('#zt-opc-user', {
                data: {
                    zt_task: "guestCheckout"
                }
            });
        },
        /**
         * Display
         * @returns {undefined}
         */
        display: function () {
            this.ajax.request({
                data: {
                    zt_task: 'display'
                }
            });
        },
        /**
         * Request Joomla user register
         * @returns {undefined}
         */
        register: function () {
            z.ajax.unHook('#zt-opc-registration');
            this.ajax.formHook('#zt-opc-registration', {
                data: {
                    zt_task: "registerUser"
                }
            });
        },
        /*
         * Update purchase form
         * @returns {undefined}
         */
        updateCartForm: function () {
            /* Term of service check */
            var $form = $('#zt-opc-cart-form');
            if ($form.length > 0) {
                var $tos = $form.find('[type="checkbox"]');
                var $submit = $form.find('[type="submit"]');
                if ($tos.length > 0) {
                    $tos.off('click');
                    $submit.prop('disabled', true);
                    $tos.on('click', function () {
                        if ($(this).is(':checked')) {
                            $submit.removeAttr('disabled');
                        } else {
                            $submit.prop('disabled', true);
                        }
                    });
                }
            }
            /* Even hook for form submit */
            z.ajax.unHook('#zt-opc-cart-form');
            this.ajax.formHook('#zt-opc-cart-form', {
                data: {
                    zt_task: "updateCartForm",
                    confirm: 1,
                    checkout: 1
                }
            });
        },
        /**
         * Auto update bill to
         * @returns {undefined}
         */
        autoUpdate: function () {
            var self = this;
            /* Auto update bill to */
            $('#zt-opc-billto-wrap').on('blur', 'input', function () {
                if ($('#zt-opc-billto-wrap').isValid()) {
                    self.ajax.request({data: {
                            zt_task: "updateBillTo"
                        }});
                }
            });
        },
        /**
         * Form validation
         * @returns {undefined}
         */
        formValidation: function () {
            $('.required').filter(':not("#email_field")').attr('data-validation', 'required');
            $('#email_field').attr('data-validation', 'email');
            $.validate();
        },
        /**
         * Update cart quantity
         * @param {type} pKey
         * @returns {undefined}
         */
        updateCartQuantity: function (pKey) {
            var value = $('tr.product-hover').find('#zt-opc-shoppingcart-pid-' + pKey).val();
            this.ajax.request({
                data: {
                    zt_task: "updateCartQuantity",
                    pKey: pKey,
                    quantity: value
                }
            });
        },
        /**
         * Remove cart item
         * @param {type} pKey
         * @returns {undefined}
         */
        removeCartItem: function (pKey) {
            $('#zt-opc-shoppingcart-pid-' + pKey).val(0);
            this.updateCartQuantity(pKey);
        },
        /**
         * Rebind function
         * @returns {undefined}
         */
        _rebind: function () {
            var self = this;
            self.login();
            self.register();
            self.guestCheckout();
            self.formValidation();
            self.updateCartForm();
            self.autoUpdate();
        }
    };

    /* Append to Zt JS Framework */
    z.onepagecheckout = _onepagecheckout;
    z.onepagecheckout._init();

})(window, zt, zt.$);
