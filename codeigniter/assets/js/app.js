/**
 * General application methods
 */

define('app', ['jquery', 'mustache'],
    function ($, mustache) {

        return {
            /**
             * Encapsulate all calls through this function
             *
             * @param strRequestType string The type of request "POST", "GET"...
             * @param strRequestController string The REST path of the controller we are calling
             * @param objParams object The parameters to send
             * @param callback function The callback function on success
             */
            doAjax: function (strRequestType, strRequestController, objParams, callback) {
                var app = this;

                //Checks
                if(!strRequestType) return console.error('doAjax() Error: Missing type of request POST, GET, PUT, ...');
                if(!strRequestController) return console.error('doAjax() Error: Missing controller path');
                if(!objParams) return console.error('doAjax() Error: Missing AJAX parameters');
                if(!callback) return console.warn('doAjax() Warning: Uh oh, results are sent to interstellar space');

                //Do request
                $.ajax({
                    url: strRequestController,
                    type: strRequestType,
                    data: JSON.stringify(objParams),
                    contentType: "application/json",
                    headers: {
                        "Accept": "application/json; charset=utf-8",
                        "Content-Type": "application/json; charset=utf-8"
                    },
                    success: function (result) {
                        if (result && app.isObject(result)) {
                            callback(result);
                        }
                    }
                });
            },

            /**
             * Is a variable defined?
             *
             * @param value
             * @returns {boolean}
             */
            isDefined: function (value) {
                if (typeof value != 'undefined') return true;
                return false;
            },

            /**
             * Is the variable an object?
             *
             * @param value
             * @returns {boolean}
             */
            isObject: function (value) {
                if (typeof value == 'object') return true;
                return false;
            },

            /**
             * Is the variable a function?
             *
             * @param value
             * @returns {boolean}
             */
            isFunction: function (value) {
                if (typeof value == 'function') return true;
                return false;
            },

            /**
             * Returns the length of a 2D object ex: a = {'a':1,'b':2,'c':3 }
             *
             * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/keys
             * @param obj
             * @returns {number}
             */
            objectLength: function (obj) {
                var count = 0;

                //Array or object?
                if (Object.prototype.toString.call(obj) != '[object Array]') {
                    //Old environments that don't support Object.keys :(
                    if (!Object.keys) {
                        var i;
                        for (i in obj) {
                            if (obj.hasOwnProperty(i)) {
                                count++;
                            }
                        }
                    } else {
                        count = Object.keys(obj).length;
                    }
                } else {
                    count = obj.length;
                }

                return count;
            }
        }
    }
);