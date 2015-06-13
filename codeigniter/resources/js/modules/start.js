/**
 * Bootstrap View Methods
 */

define('start', ['header', 'student', 'students'],
    function (header, student, students) {
        return {
            /**
             * Initialize all application modules
             */
            init: function(){
                header.init();
                student.init();
                students.init();
            }
        }
    }
);
