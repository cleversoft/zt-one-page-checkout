/**
 * Zt Ajax
 * @param {type} w
 * @param {type} z
 * @param {type} $
 * @returns {undefined}
 */
jQuery(document).ready(function(){
    
(function (w, z, $) {
    /* Reject if zt is not defined */
    if (typeof (zt.onepagecheckout) === 'undefined')
        return false;

    /* Local ajax class */
    var _onepagecheckout = {
        /* Local settings */
        _settings: {},
        /**
         * Init function
         * @returns {undefined}
         */
        _init: function () {
            this._settings = {
                url: z.settings.frontendUrl,
                type: "POST",
                data: {
                },
                success: function(data){
                    console.log("Reponse data: ", data);
                    $.each(data, function(key, item){
                        switch(key){
                            case 'html':
                                z.ui.replace(item.target, item.html);
                                break;
                            case 'appendHtml':
                                z.ui.append(item.target, item.html);
                                break;
                            case 'exec':
                            case 'execute':
                                eval(item);
                                break;
                            default:
                                break;
                        };
                    });
                }
            };
            this._settings.data[z.settings.token] = 1;
        },
        /**
         * Ajax request manually
         * @param {type} data
         * @returns {jqXHR}
         */
        request: function (data) {
            var temp = $.extend({}, this._settings, (typeof (data) === 'undefined') ? {} : data);
            console.log("Ajax data: ", temp);
            return $.ajax(temp);
        },
        /**
         * Ajax request by form data
         * @param {type} formSelector
         * @param {type} data
         * @param {type} getArray
         * @returns {jqXHR}
         */
        formRequest: function (formSelector, data, getArray) {
            var $form = $(formSelector);
            var data = (typeof (data) === 'undefined') ? {} : data;
            var getArray = (typeof (getArray) === 'undefined') ? false : getArray;
            var settings = {};
            var formData = {};
            var arrayDetect = {};
            var arrayValue = {};
            if ($form.length > 0) {
                var $inputs = $form.find("input, texarea, select, button");
                $inputs.each(function () {
                    var $me = $(this);
                    var type = $me.attr('type');
                    var value = $me.val();
                    var name = $me.attr('name');
                    if (typeof (name) !== 'undefined') {
                        if (typeof (type) !== 'undefined') {
                            if (type === 'checkbox' || type === 'radio') {
                                /* Convert to boolean value if checkbox/radio value is empty */
                                if (value === '') {
                                    value = ($me.is(':checked')) ? true : false;
                                }
                            }
                        }
                        formData[name] = value;
                        if (getArray) {
                            arrayDetect[name] = (arrayDetect.hasOwnProperty(name)) ? arrayDetect[name] + 1 : 1;
                            if (!arrayValue.hasOwnProperty(name)) {
                                arrayValue[name] = [];
                            }
                            arrayValue[name].push(value);
                        }
                    }
                });
                if (getArray) {
                    /* If many fields has same name convert it to an array */
                    $.each(arrayDetect, function (index, value) {
                        if (value > 1) {
                            formData[index] = arrayValue[index];
                        }
                    });
                }
            }
            var temp = $.extend({}, {data: formData}, data);
            return this.request(temp);
        },
        login: function(username,password) {
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
    };

    /* Append to Zt JS Framework */
    z.ajax = _ajax;
    z.ajax._init();
    
})(window, zt, zt.$);

});
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
