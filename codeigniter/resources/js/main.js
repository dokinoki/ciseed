/**
 * Config setup vars
 */
var strAssetsPath = "./resources/js/",
    strModulesPath = strAssetsPath + "modules/",
    strLibsPath = strAssetsPath + "libs/",
    strTestsPath = strAssetsPath + "tests/";

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
            strLibsPath + "bootstrap-3.3.4.min"
        ],
        jasmine: [
            "https://cdnjs.cloudflare.com/ajax/libs/jasmine/2.3.4/jasmine.min",
            strLibsPath + "jasmine-2.3.4.min"
        ],
        'jasmine-boot': [
            //"https://cdnjs.cloudflare.com/ajax/libs/jasmine/2.3.4/boot.min",
            strLibsPath + "jasmine-boot-2.3.4"
        ],
        'jasmine-html': [
            "https://cdnjs.cloudflare.com/ajax/libs/jasmine/2.3.4/jasmine-html.min",
            strLibsPath + "jasmine-html-2.3.4.min"
        ],
        'jasmine-jquery': [
            strLibsPath + "jasmine-jquery.min"
        ],

        //Local application modules
        app: strModulesPath + "app.min",
        test: strModulesPath + "test.min",
        intro: strModulesPath + "intro.min",
        start: strModulesPath + "start.min",
        header: strModulesPath + "header.min",
        student: strModulesPath + "student.min",
        students: strModulesPath + "students.min",

        //Local tests
        'app-test': strTestsPath + "app-test.min"
    },

    shim: {
        //Load non-AMD dependencies
        'bootstrap': {
            deps : ['jquery']
        },
        'jasmine-boot': {
            deps : ['jasmine', 'jasmine-html']
        },
        'jasmine-html': {
            deps : ['jasmine']
        },
        'jasmine-jquery': {
            deps : ['jasmine-boot', 'jquery']
        }
    }
});

/*
 * Initialize our stuff
 */
require(['start'], function (start) {
    start.init();
});