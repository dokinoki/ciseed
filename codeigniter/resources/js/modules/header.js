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
                 * Load Jasmine
                 */
                $('body').on('click', '#student-test-frontend', function(){
                    //Check if Jasmine has already been loaded
                    if(!$('.jasmine_html-reporter').length) require(['test'], function () {});
                    else $('#jasmine-container').fadeIn();

                    $('.students-body').hide();
                });

                /*
                 * Reset view after loading Jasmine
                 */
                $('body').on('click', '.student-option', function(){
                    var el = $('#jasmine-container');
                    if (el.is(':visible')) {
                        el.fadeOut('fast', function(){
                            $('.students-body').fadeIn();
                        });
                    };

                });

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
