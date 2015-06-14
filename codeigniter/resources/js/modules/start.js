/**
 * Bootstrap View Methods
 */

define('start', ['header', 'student', 'students', 'intro'],
    function (header, student, students, intro) {
        return {
            /**
             * Initialize all application modules
             */
            init: function(){
                intro.init();
                header.init();
                student.init();
                students.init();
            }
        }
    }
);
