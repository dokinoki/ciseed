/**
 * Config setup vars
 */
var strAssetsPath = "./resources/js/",
    strModulesPath = strAssetsPath + "/modules/",
    strLibsPath = strAssetsPath + "/libs/";

/*
 * Load dependencies
 */
requirejs.config({
    baseUrl: "./",
    paths: {
        //CDN with local backup
        jquery: [
            "https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min",
            strLibsPath + "jquery-2.1.4.min"
        ],
        bootstrap: [
            "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min",
            strLibsPath + "bootstrap/bootstrap-3.3.4.min"
        ],

        //Local application modules
        app: strModulesPath + "app.min",
        intro: strModulesPath + "intro.min",
        start: strModulesPath + "start.min",
        header: strModulesPath + "header.min",
        student: strModulesPath + "student.min",
        students: strModulesPath + "students.min"
    },

    shim: {
        //Party time
    }
});

/*
 * Initialize our stuff
 */
require(['start'], function (start) {
    start.init();
});