<?php

    /**
     * Class Student_model
     *
     * When dealing with only one student
     */
    class Student_model extends CI_Model implements model_interface{

        public function __construct (){
            parent::__construct();
        }

        /**
         * Get one student data from DB
         *
         * @param int $numID
         * @return array
         */
        public function get($numID){
            $strQuery = "SELECT user_id AS ID,
                                user_username AS USERNAME,
                                user_password AS PASSWORD,
                                user_added AS ADDED,
                                user_modified AS MODIFIED
                           FROM usr_users
                          WHERE user_id = ?";

            $objQuery = $this->db->query($strQuery, array(intval($numID)));

            return $objQuery->result_array();
        }

        /**
         * Insert a new student in the DB
         *
         * @param array $arrData
         * @return array The student data
         */
        public function insert($arrData = array()){
            $strQuery = "INSERT INTO usr_users
                                 SET user_username = ?,
                                     user_password = ?,
                                     user_hash = ?,
                                     user_added = UTC_TIMESTAMP()";

            $this->db->query(
                $strQuery,
                array(
                    filter_var($arrData['username'], FILTER_SANITIZE_STRING),
                    filter_var($arrData['password'], FILTER_SANITIZE_STRING),
                    encryption_class::encrypt($arrData['password']),
                )
            );

            return $this->get($this->db->insert_id());
        }

        /**
         * Update one student from db
         *
         * @param array $arrData
         * @return bool|void
         */
        public function update($arrData = array()){
            $strQuery = "UPDATE usr_users
                            SET user_username = ?,
                                user_password = ?,
                                user_hash = ?,
                                user_modified = UTC_TIMESTAMP()
                          WHERE user_id = ?";

            $this->db->query(
                $strQuery,
                array(
                    filter_var($arrData['username'], FILTER_SANITIZE_STRING),
                    filter_var($arrData['password'], FILTER_SANITIZE_STRING),
                    encryption_class::encrypt($arrData['password']),
                    intval($arrData['id'])
                )
            );

            return $this->get($arrData['id']);
        }

        /**
         * Erase one student from db
         *
         * @param int $numID The user/student ID
         * @return bool
         */
        public function erase($numID){
            $strQuery = "DELETE FROM usr_users
                               WHERE user_id = ?";

            $this->db->query($strQuery, array(intval($numID)));

            return intval($numID);
        }
    }