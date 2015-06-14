<?php

    /**
     * Interface requiredMethods
     *
     * Set up pattern for controller/view interactions
     */
    interface controller_interface{
        /*
         * Always load the constructor
         */
        public function __construct();

        /*
         * Always load the testing setter
         *
         * @param $boolTesting bool (true if called from a test)
         */
        public function _setTesting($boolTesting);

        /**
         * Always have a get method
         */
        public function get();
    }