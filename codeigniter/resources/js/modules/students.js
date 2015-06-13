/**
 * Student View Methods
 */

define('students', ['jquery', 'app', 'bootstrap'],
    function ($, app) {
        var module = 'students';

        return {
            /**
             * Initialize this module
             */
            init: function(){
                this.loadFunctions();
                this.get();
            },

            /**
             * Load DOM related actions
             */
            loadFunctions: function(){
                var self = this;

                /*
                 * Randomize all student names and passwords
                 */
                $('body').on('click', '#student-chaos', function(){
                    self.chaos();
                });

                /*
                 * Search for a specific student
                 */
                $('body').on('click', '#student-search', function(){
                    self.search(
                        $('#student-search-input').val()
                    );
                });

                /**
                 * Search for a specific student when doing "enter" on the search bar
                 */
                $('body').on('keypress', '#student-search-input', function (e) {
                    var key = e.which;

                    //Enter key
                    if(key == 13){
                        self.search(
                            $('#student-search-input').val()
                        );
                    }
                });

            },

            /**
             * Get the list of students
             */
            get: function(){
                var self = this;

                app.doAjax(
                    {
                        controller: module,
                        method: 'get'
                    },
                    function(objData){
                        self.renderStudents(objData);
                    }
                );
            },

            /**
             * Seed chaos in our database
             */
            chaos: function(){
                var self = this;

                app.toggleLoadingOverlay();
                app.doAjax(
                    {
                        controller: module,
                        method: 'chaos'
                    },
                    function(objData){
                        self.renderStudents(objData);
                    }
                );
            },

            /**
             * Search a student
             */
            search: function(strQuery){
                var self = this;

                app.toggleLoadingOverlay();
                app.doAjax(
                    {
                        controller: module,
                        method: 'search',
                        data: {
                            username: strQuery
                        }
                    },
                    function(objData){
                        self.renderStudents(objData);
                    }
                );
            },

            /**
             * Render the table with the students data
             */
            renderStudents: function(objData){
                //Always hide the message
                var elMessage = $('#students-no-result');
                elMessage.fadeOut();

                //Always toggle the overlay
                app.toggleLoadingOverlay();


                //Add the table
                app.addTable(
                    {
                        id: 'students-table',
                        parent: '#students-table-placeholder',
                        header: ['#', 'Username', 'Password', 'Added', 'Modified', 'Actions'],
                        body: objData
                    }
                );

                //Lets add some custom actions
                $('#students-table tbody tr').append('<td><i class="fa fa-minus-square student-erase"></i><i class="fa fa-refresh student-refresh"></i></td>');

                //If results are empty
                if(!app.objectLength(objData)) elMessage.fadeIn();
            }

        }
    }
);
