/**
 * An introduction to the site
 */

define('intro', ['jquery', 'app'],
    function ($, app) {
        return {
            /**
             * Initialize module
             */
            init: function(){
                this.loadFunctions();
            },

            /**
             * Load DOM functions
             */
            loadFunctions: function(){
                $('body').on('click', '.intro-1', function(){
                    $(this).fadeOut('slow');
                });
            }
        }
    }
);
