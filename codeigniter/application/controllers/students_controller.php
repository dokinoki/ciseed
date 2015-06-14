<?php
    //CI autoloader does not support interfaces :(
    require_once APPPATH . 'interfaces/controller_interface.php';

    /**
     * Class Students_controller
     */
    class Students_controller extends CI_Controller implements controller_interface {

        /**
         * Index Page for this controller.
         *
         * Maps to the following URL
         * 		http://example.com/index.php/students
         *	- or -
         * 		http://example.com/index.php/students/index
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
         * Load the students model
         * Since students depends on student, we also load the student_model
         */
        function __construct(){
            parent::__construct();
            $this->load->model('student_model');
            $this->load->model('students_model');
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
         * Load the initial view
         */
        public function index(){
            $this->load->view('students_view');
        }

        /**
         * Get the list of students
         */
        public function get(){
            return responses_class::sendRequest(
                $this->students_model->get(),
                $this->testing
            );
        }

        /**
         * Seed chaos in our DB (randomize pass & username of all users)
         */
        public function chaos(){
            $arrResponse = array();

            //Get list of all students first
            $arrStudents = $this->students_model->get();

            //Loop and update passwords and usernames
            foreach($arrStudents as $arrStudent){
                $arrResult = $this->student_model->update(
                    array(
                        'id' => $arrStudent->ID,
                        'username' => credentials_class::createUsername(),
                        'password' => credentials_class::createPassword()
                    )
                );

                $arrResponse[] = $arrResult[0];
            }

            //Send the new list of students
            return responses_class::sendRequest($arrResponse, $this->testing);
        }

        /**
         * Search users by username
         */
        public function search(){
            //Get the request data first
            $arrRequest = responses_class::getRequest();

            //Get the results
            $arrResponse = $this->students_model->search($arrRequest);

            //Then send it
            return responses_class::sendRequest($arrResponse, $this->testing);
        }
    }

    /* End of file students_controller.php */
    /* Location: ./application/controllers/students_controller.php */