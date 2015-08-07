require(['jasmine-boot'], function () {
    require(
        [
            'jasmine-jquery',
            'app-test'
        ],

        function(){
            //trigger Jasmine
            window.onload();
        }
    );
});