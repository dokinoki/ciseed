<?php

    require_once APPPATH . 'controllers/student_controller.php';

    /**
     * Class StudentControllerTest
     *
     * Test the controllers/student_controller.php file
     */
    class StudentControllerTest extends CIUnit_Framework_TestCase{
        private $student_controler;

        public function __construct(){
            $this->student_controler = new Student_controller();
            $this->student_controler->_setTesting(true);
        }

        /**
         * Test getting data
         */
        public function testGet(){
            //get JSON string
            $strResponse = $this->student_controler->get();

            //Parse the response (not using toolsClass::jsonDecode to modularize)
            $arrResponse = json_decode($strResponse, true);

            //If its an array we are good
            $this->assertTrue(is_array($arrResponse));
        }

        /**
         * Test inserting data
         */
        public function testInsert(){
            //get JSON string
            $strResponse = $this->student_controler->insert();

            //Parse the response
            $arrResponse = json_decode($strResponse, true);

            //If its an array we are good
            $this->assertTrue(is_array($arrResponse));
        }

        /**
         * Test updating data
         */
        public function testUpdate(){
            //get JSON string
            $strResponse = $this->student_controler->update();

            //Parse the response
            $arrResponse = json_decode($strResponse, true);

            //If its an array we are good
            $this->assertTrue(is_array($arrResponse));
        }

        /**
         * Test chaosing data
         */
        public function testChaos(){
            //get JSON string
            $strResponse = $this->student_controler->chaos();

            //Parse the response
            $arrResponse = json_decode($strResponse, true);

            //If its an array we are good
            $this->assertTrue(is_array($arrResponse));
        }

        /**
         * Test erasing data
         */
        public function testErase(){
            //get JSON string
            $strResponse = $this->student_controler->erase();

            //Parse the response
            $arrResponse = json_decode($strResponse, true);

            //If its an array we are good
            $this->assertTrue(is_array($arrResponse));
        }
    }