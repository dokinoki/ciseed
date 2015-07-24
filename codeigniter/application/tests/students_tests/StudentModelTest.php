<?php

    require_once APPPATH . 'models/student_model.php';

    /**
     * Class studentModelTest
     *
     * Test the models/student_model.php file
     */
    class studentModelTest extends CIUnit_Framework_TestCase{
        private $student_model;

        public function __construct(){
            $this->student_model = new Student_model();
            $this->student_model->_setTesting(true);
        }

        /**
         * Test insert()
         */
        public function testInsert(){
            $arrResponse = $this->student_model->insert(array(
                'username' => 'marco',
                'password' => 'polo'
            ));

            //If its an array we are good
            $this->assertTrue(is_array($arrResponse));

            //If we have an id we are ok
            $this->assertTrue(is_numeric($arrResponse[0]['ID']));

            //If we have a username all is nice and shiny
            $this->assertEquals('marco' , $arrResponse[0]['USERNAME']);
        }

        /**
         * Test get()
         */
        public function testGet(){
            $arrResponse = $this->student_model->get(0);

            //If its an array we are good
            $this->assertTrue(is_array($arrResponse));

            //If we have a username we are good
            $this->assertTrue(is_numeric($arrResponse[0]['ID']));
        }

        /**
         * Test update()
         */
        public function testUpdate(){
            $arrResponse = $this->student_model->update(array(
                'id' => 0,
                'username' => 'marco',
                'password' => 'polo'
            ));

            //If its an array we are good
            $this->assertTrue(is_array($arrResponse));

            //If we have a username we are good
            $this->assertEquals('marco', $arrResponse[0]['USERNAME']);
        }

        /**
         * Test erase()
         */
        public function testErase(){
            $numResponse = $this->student_model->erase(0);

            //If its an int we are good
            $this->assertTrue(is_numeric($numResponse));
        }
    }