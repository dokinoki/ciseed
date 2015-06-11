<?php

    /**
     * Class Students_controller
     */
    class Students_controller extends CI_Controller {

        /**
         * Index Page for this controller.
         *
         * Maps to the following URL
         * 		http://example.com/index.php/student
         *	- or -
         * 		http://example.com/index.php/student/index
         *	- or -
         * Since this controller is set as the default controller in
         * config/routes.php, it's displayed at http://example.com/
         *
         * So any other public methods not prefixed with an underscore will
         * map to /index.php/student/<method_name>
         * @see http://codeigniter.com/user_guide/general/urls.html
         */
        public function index(){
            $this->load->view('students_view');
        }
    }

    /* End of file student_controller.php */
    /* Location: ./application/controllers/student_controller.php */