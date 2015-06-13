<?php

    /**
     * Class Students_controller
     */
    class Students_controller extends CI_Controller {

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
         * Load the students model
         * Since students depends on student, we also load the student_model
         */
        function __construct(){
            parent::__construct();
            $this->load->model('student_model');
            $this->load->model('students_model');
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
            responses_class::sendRequest(
                $this->students_model->get()
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
            responses_class::sendRequest($arrResponse);
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
            responses_class::sendRequest($arrResponse);
        }
    }

    /* End of file students_controller.php */
    /* Location: ./application/controllers/students_controller.php */