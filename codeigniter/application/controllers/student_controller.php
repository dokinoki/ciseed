<?php
    //CI autoloader does not support interfaces :(
    require_once APPPATH . 'interfaces/controller_interface.php';

    /**
     * Class Student_controller
     */
    class Student_controller extends CI_Controller implements controller_interface {

        /**
         * Index Page for this controller.
         *
         * Maps to the following URL
         * 		http://example.com/index.php/student
         *	- or -
         * 		http://example.com/index.php/student/index
         *
         * So any other public methods not prefixed with an underscore will
         * map to /index.php/student/<method_name>
         * @see http://codeigniter.com/user_guide/general/urls.html
         */

        /**
         * Are we running unit tests?
         *
         * @var bool
         */
        private $testing = false;

        /**
         * Load the student model
         */
        function __construct(){
            parent::__construct();
            $this->load->model('student_model');
        }

        /**
         * Testing bool setter
         *
         * @param $boolTesting
         */
        public function _setTesting($boolTesting){
            $this->testing = $boolTesting;
        }

        /**
         * Get student data
         */
        public function get(){
            //Get the request data first
            $arrRequest = responses_class::getRequest();

            //Pass the data to the model & get the response data
            $arrResponse = $this->student_model->get($arrRequest['id']);

            return responses_class::sendRequest($arrResponse, $this->testing);
        }

        /**
         * Insert a new student
         */
        public function insert(){
            $arrResponse = $this->student_model->insert(
                array(
                    'username' => credentials_class::createUsername(),
                    'password' => credentials_class::createPassword()
                )
            );

            return responses_class::sendRequest($arrResponse, $this->testing);
        }

        /**
         * Update an existing student
         */
        public function update(){
            //Get the request data first
            $arrRequest = responses_class::getRequest();

            //Pass the data to the model & get the response data
            $arrResponse = $this->student_model->update($arrRequest);

            return responses_class::sendRequest($arrResponse, $this->testing);
        }

        /**
         * Remove an existing student
         */
        public function erase(){
            //Get the request data first
            $arrRequest = responses_class::getRequest();

            //Pass the data to the model & get the response data
            $arrResponse = array('ID' => $this->student_model->erase($arrRequest['id']));

            return responses_class::sendRequest($arrResponse, $this->testing);
        }

        /**
         * Randomize an existing student
         */
        public function chaos(){
            //Get the request data first
            $arrRequest = responses_class::getRequest();

            $arrResponse = $this->student_model->update(
                array(
                    'username' => credentials_class::createUsername(),
                    'password' => credentials_class::createPassword(),
                    'id' => $arrRequest['id']
                )
            );

            return responses_class::sendRequest($arrResponse, $this->testing);
        }
    }

    /* End of file student_controller.php */
    /* Location: ./application/controllers/student_controller.php */