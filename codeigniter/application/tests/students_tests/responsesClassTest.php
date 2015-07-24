<?php

    /**
     * Class responsesClassTest
     *
     *  Test the libraries/responses_class.php file
     */
    class responsesClassTest extends CIUnit_Framework_TestCase{
        /**
         * Test POST reception
         */
        public function testGetRequest(){
            $arrRequest = array('param1' => 1);
            $_POST = $arrRequest;
            $arrResponse = responses_class::getRequest();

            $this->assertEquals($arrResponse, $arrResponse);
        }
    }