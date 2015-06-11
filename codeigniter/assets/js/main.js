/**
 * Config setup vars
 */
var strAssetsPath = "./assets/js/",
    strLocalPath = strAssetsPath + "/local/",
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
            strLibsPath + "jquery/jquery-2.1.4.min"
        ],
        bootstrap: [
            "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min",
            strLibsPath + "bootstrap/bootstrap-3.3.4.min"
        ],

        //General local modules
        app: strAssetsPath + "app",

        //Application local modules
        student: strLocalPath + "student"
    },

    shim: {
        //Party time
    }
});

/*
 * Initialize our stuff
 * If we had more modules, we would create a start.js that would handle the instantiation, instead of doing it here
 */
require(['student'], function (student) {
    student.init();
});