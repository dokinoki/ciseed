<?php

    require_once APPPATH . 'controllers/students_controller.php';

    /**
     * Class studentsControllerTest
     *
     * Test the controllers/students_controller.php file
     */
    class studentsControllerTest extends CIUnit_Framework_TestCase{
        private $students_controler;

        public function __construct(){
            $this->students_controler = new Students_controller();
            $this->students_controler->_setTesting(true);
        }

        /**
         * Test getting list of users
         */
        public function testGet(){
            //get JSON string
            $strResponse = $this->students_controler->get();

            //Parse the response (not using toolsClass::jsonDecode to modularize)
            $arrResponse = json_decode($strResponse, true);

            //If its an array we are good
            $this->assertTrue(is_array($arrResponse));
        }

        /**
         * Test randomizing
         */
        public function testChaos(){
            //get JSON string
            $strResponse = $this->students_controler->chaos();

            //Parse the response (not using toolsClass::jsonDecode to modularize)
            $arrResponse = json_decode($strResponse, true);

            //If its an array we are good
            $this->assertTrue(is_array($arrResponse));
        }

        /**
         * Test search
         */
        public function testSearch(){
            //get JSON string
            $strResponse = $this->students_controler->search();

            //Parse the response (not using toolsClass::jsonDecode to modularize)
            $arrResponse = json_decode($strResponse, true);

            //If its an array we are good
            $this->assertTrue(is_array($arrResponse));
        }
    }