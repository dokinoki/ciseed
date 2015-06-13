/**
 * General application methods
 */

define('app', ['jquery'],
    function ($) {

        return {
            /**
             * Encapsulate all calls through this function
             *
             * @param objRequest.request string The type of request "POST", "GET"...
             *        objRequest.controller string What controller are we calling ex: students/get
             *        objRequest.method string The method of the controller we are calling
             * @param objParams object The parameters to send
             * @param callback function The callback function on success (to avoid async race conditions)
             */
            doAjax: function (objRequest, callback) {
                var app = this;

                //Default values
                if(!objRequest.request) objRequest.request = 'POST';
                if(!objRequest.data) objRequest.data = {};

                //Checks
                if(!objRequest.controller) return console.error('doAjax() Error: Missing controller path');
                if(!objRequest.method) return console.error('doAjax() Error: Missing method');
                if(!callback) return console.warn('doAjax() Warning: Uh oh, results are sent to interstellar space');

                //Do request
                $.ajax({
                    url: objRequest.controller + '/' + objRequest.method,
                    type: objRequest.request,
                    data: JSON.stringify(objRequest.data),
                    contentType: "application/json",
                    headers: {
                        "Accept": "application/json; charset=utf-8",
                        "Content-Type": "application/json; charset=utf-8"
                    },
                    success: function (objData) {
                        if (objData && app.isObject(objData)) {
                            callback(objData);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        //do something with timeout/error/abort
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
             * Returns the length of a 2D object ex: a = { 'a':1,'b':2,'c':3 }
             *
             * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/keys
             * @param obj
             * @returns {number}
             */
            objectLength: function (obj) {
                var count = 0;

                //Ver si es un array o un objeto
                if (Object.prototype.toString.call(obj) != '[object Array]') {
                    //Old environments
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
            },

            /**
             * Add a new row to a table
             *
             * @param objParent object The parent jQuery selector ex: $('#partytime')
             * @param objData object The object to be used as data input ex: {"0":{"ID":1,"USERNAME":"asf"}}
             */
            addRow: function(objParent, objData){
                var row = $('<tr/>');

                //Data for one row
                $.each(objData, function( key, value ) {
                    row.append($('<td/>').html(value));
                });

                //Add the row ID
                row.attr('numID', objData.ID);

                objParent.append(row);
            },

            /**
             * Add a column to a row
             *
             * @param objParent object The parent jQuery selector ex: $('#partytime')
             * @param strData string The content of the column (can be HTML)
             *
             */
            addColumn: function(objParent, strData){
                var column = $('<td/>');

                column.html(strData);
                objParent.append(column);
            },

            /**
             * Add a table
             *
             * @param objData object
             *        objData.parent string The ID where the table is going to be added to ex: '#students-placeholder'
             *        objData.id string The ID the table is going to have ex: 'students-table'
             *        objData.header array Texts for the header ex: ['Username', 'Password', 'Added']
             *        objData.body object Texts for the rows ex: {"0":{"ID":1,"USERNAME":"asf"}}
             */
            addTable: function(objData){
                var self = this;

                //Create the basic elements
                var table = $('<table class="table table-striped"/>');
                var thead = $('<thead/>');
                var tbody = $('<tbody/>');
                var row = $('<tr/>');

                //Add the ID to the table
                table.attr('id', objData.id);

                //Add data to the header
                if(self.isObject(objData.header)) {
                    $.each(objData.header, function( key, value ) {
                        self.addColumn(row, value);
                    });
                } else console.warn('addTable() Warning: header data missing');

                //Add data to the body
                if(self.isObject(objData.body)) {
                    $.each(objData.body, function( key, value ) {
                        self.addRow(tbody, value);
                    });
                } else console.warn('addTable() Warning: body data missing');

                //Create the table
                $(objData.parent).html(
                    table.append(thead.append(row))
                         .append(tbody)
                );
            },

            /**
             * Remove a row
             *
             * @param numID int The row ID
             */
            removeRow: function(numID){
                $('tr[numid="' + numID + '"]').fadeOut('slow', function(){
                    $(this).remove();
                });
            },

            /**
             * Scroll to the bottom of the page
             */
            scrollBottom: function(){
                $("html, body").animate({ scrollTop: $(document).height() }, "slow");
            },

            /**
             * Toggle the loading overlay
             */
            toggleLoadingOverlay: function(){
                $('.overlay').fadeToggle();
            }
        }
    }
);