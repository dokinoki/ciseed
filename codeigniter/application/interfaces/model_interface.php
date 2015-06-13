<?php

    /**
     * Interface requiredMethods
     *
     * Set up pattern for DB interactions
     *
     * @link https://ellislab.com/codeigniter/user-guide/database/active_record.html
     */
    interface model_interface{
        /*
         * Always load the constructor
         */
        public function __construct();

        /**
         * Get database data
         *
         * @param $numID int The user ID
         * @return array
         */
        public function get($numID);

        /**
         * Insert database data
         *
         * @param $arrData array
         * @return bool
         */
        public function insert($arrData);

        /**
         * Updates db data
         *
         * @param $arrData array
         * @return bool
         */
        public function update($arrData);

        /**
         * Deletes an entry
         *
         * @param $numID int
         * @return bool
         */
        public function erase($numID);
    }