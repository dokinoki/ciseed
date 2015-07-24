<?php

    require_once APPPATH . 'models/students_model.php';

    /**
     * Class studentsModelTest
     *
     * Test the models/students_model.php file
     */
    class studentsModelTest extends CIUnit_Framework_TestCase{
        private $students_model;

        public function __construct(){
            $this->students_model = new Students_model();
            $this->students_model->_setTesting(true);
        }

        /**
         * Test get()
         */
        public function testGet(){
            $arrResponse = $this->students_model->get();

            //If its an array we are good
            $this->assertTrue(is_array($arrResponse));
        }

        /**
         * Test search()
         */
        public function testSearch(){
            $arrResponse = $this->students_model->search(array(
                'username' => ''
            ));

            //If its an array we are good
            $this->assertTrue(is_array($arrResponse));
        }
    }