/**
 * Tests for the app.js module
 */
define('app-test', ['app'], function(app){

    describe("app", function(){
        
        describe("objectLength", function(){
            it("Should count the number of elements in an object", function(){
                var objTest = {1: 'marco', 2: 'polo'};
                expect(app.objectLength(objTest)).toEqual(2);
            });
        });

        describe("isObject", function(){
            it("Should check if a variable is an object", function(){
                var objTest = {1: 'marco', 2: 'polo'};
                expect(app.isObject(objTest)).toBe(true);

                var strTest;
                expect(app.isObject(strTest)).toBe(false);
            });
        });

        describe("isFunction", function(){
            it("Should check if a variable is a function", function(){
                var objTest = function(){};
                expect(app.isFunction(objTest)).toBe(true);

                var strTest;
                expect(app.isFunction(strTest)).toBe(false);
            });
        });

        describe("isDefined", function(){
            it("Should check if a variable is defined", function(){
                var objTest = 1;
                expect(app.isDefined(objTest)).toBe(true);

                var strTest;
                expect(app.isDefined(strTest)).toBe(false);
            });
        });
    });

});