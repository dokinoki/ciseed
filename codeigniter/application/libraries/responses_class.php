<?php

    /**
     * Class responses_class
     */
    class responses_class{
        /**
         * Allowed API methods
         *
         * @var array
         */
        private static $ARR_ALLOWEDMETHODS = array('POST', 'GET');

        /**
         * Get the request and check that it is a valid JSON string
         *
         * @return array
         */
        public static function getRequest(){
            return tools_class::jsonDecode(file_get_contents('php://input'));
        }

        /**
         * Send a request
         *
         * @param array $arrData The array with the data we want to send
         * @param bool $boolTesting Is this a test? If it is we return instead of echoing the data
         * @return string
         */
        public static function sendRequest($arrData, $boolTesting = false){
            //This is not a test
            if(!$boolTesting){
                self::setHeaders();
                echo tools_class::jsonEncode($arrData);
            }

            return tools_class::jsonEncode($arrData);
        }

        /**
         * Set the response headers
         *
         * @return string
         */
        private function setHeaders(){
            header('Content-type: application/json; charset=utf-8');
            header('Cache-Control: private, max-age:0');
            header('Strict-Transport-Security: max-age=63072000; includeSubDomains');
            header('Access-Control-Allow-Methods: ' . implode(', ',self::$ARR_ALLOWEDMETHODS));
        }
    }
