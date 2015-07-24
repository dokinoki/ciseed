define(['header-test'], function(header){

    describe("header", function(){
        describe("loadFunctions", function(){
            it("Should bind the header module DOM to JS methods", function(){
                expect(header.loadFunctions()).toEqual("nothing so far");
            });
        });
    });

});