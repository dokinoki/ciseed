<?php

    /**
     * Class Students_model
     *
     * When dealing with more than one student
     */
    class Students_model extends CI_Model{

        public function __construct (){
            parent::__construct();
            $this->load->database();
        }

        /**
         * Get the list of users, a tiny touch of security though obscurity and simplification
         * by aliasing DB column names
         *
         * @return array
         */
        public function get(){
            $this->db
                ->select('user_id AS ID,
                          user_username AS USERNAME,
                          user_password AS PASSWORD,
                          user_added AS ADDED,
                          user_modified AS MODIFIED')
                ->from('usr_users');

            return $this->db->get()->result();
        }

        /**
         * Search students by their usernames
         *
         * @param $arrData array The search data
         * @return mixed
         */
        public function search($arrData){
            $this->db
                ->select('user_id AS ID,
                              user_username AS USERNAME,
                              user_password AS PASSWORD,
                              user_added AS ADDED,
                              user_modified AS MODIFIED')
                ->from('usr_users')
                ->like('user_username', filter_var($arrData['username'], FILTER_SANITIZE_STRING));

            return $this->db->get()->result();
        }
    }