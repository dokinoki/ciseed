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

        /**
         * Always have a get method
         */
        public function get();
    }