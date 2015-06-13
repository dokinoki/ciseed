/**
 * Header JS methods
 */

define('header', ['app', 'students'],
    function (app, students) {
        var module = 'header';

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
                 * Reload the main page again when clicking on the logo
                 */
                $('body').on('click', '.navbar-brand', function(){
                    //Toggle loading overlay
                    app.toggleLoadingOverlay();

                    //Render the list of students
                    students.get();

                    //Clear the search input
                    $('#student-search-input').val('');
                });
            }

        }
    }
);
