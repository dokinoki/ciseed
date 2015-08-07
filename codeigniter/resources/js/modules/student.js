/**
 * Student View Methods
 */

define('student', ['jquery', 'app', 'bootstrap'],
    function ($, app) {
        var module = 'student';

        return {
            /**
             * Initialize this module
             */
            init: function(){
                this.loadFunctions();
            },

            /**
             * Load DOM related actions
             */
            loadFunctions: function(){
                var self = this;

                /*
                 * Add a new student with random username/password
                 */
                $('body').on('click', '#student-add', function(){
                    self.insert();
                });

                /**
                 * Erase a user
                 */
                $('body').on('click', '.student-erase', function(){
                    self.erase(
                        $(this).closest("tr").attr('numid')
                    );
                });

                /**
                 * Update the user with a random username & pass
                 */
                $('body').on('click', '.student-refresh', function(){
                    self.chaos(
                        $(this).closest("tr").attr('numid')
                    );
                });
            },

            /**
             * Add a new user/student
             */
            insert: function(){
                //Show loading overlay
                app.toggleLoadingOverlay();

                app.doAjax(
                    {
                        controller: module,
                        method: 'insert'
                    },
                    function(objData){
                        //Add the row to the DOM
                        app.addRow($('#students-table tbody'), objData[0]);

                        //Scroll to the bottom, if the list is long in order to show the newly created user
                        app.scrollBottom();

                        //Add custom actions
                        $('tr[numid="' + objData[0].ID + '"]').append('<td><i class="fa fa-minus-square student-erase"></i><i class="fa fa-refresh student-refresh"></i></td>');

                        //Remove overlay
                        app.toggleLoadingOverlay();
                    }
                );
            },

            /**
             * Erase a single user
             *
             * @param numID int The user ID
             */
            erase: function(numID){
                app.doAjax(
                    {
                        controller: module,
                        method: 'erase',
                        data: {
                            id: numID
                        }
                    },
                    function(objData){
                        app.removeRow(objData.ID);
                    }
                );
            },

            /**
             * Randomize one user
             *
             * @param numID int The user ID
             */
            chaos: function(numID){
                var el = $('tr[numid="' + numID + '"]');

                //Little flashing animation on update (1)
                el.fadeTo( "slow", 0.3);

                //Request data
                app.doAjax(
                    {
                        controller: module,
                        method: 'chaos',
                        data: {
                            id: numID
                        }
                    },
                    function(objData){
                        //Little flashing animation on update (2)
                        el.fadeTo( "slow", 1);

                        //Change the row
                        $('tr[numid="' + objData[0].ID + '"] td:eq( 1 )').text(objData[0].USERNAME);
                        $('tr[numid="' + objData[0].ID + '"] td:eq( 2 )').text(objData[0].PASSWORD);
                        $('tr[numid="' + objData[0].ID + '"] td:eq( 4 )').text(objData[0].MODIFIED);
                    }
                );
            }

        }
    }
);
