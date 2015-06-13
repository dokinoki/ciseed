<?php
    /**
     * Class tools_class
     *
     * General useful tools
     */
    class tools_class {
        /**
         * Convert an array to a JSON encoded string
         *
         * @param $arrData array
         * @return string|void JSON
         */
        public static function jsonEncode($arrData){
            if(is_array($arrData)){
                return json_encode($arrData, JSON_FORCE_OBJECT | JSON_NUMERIC_CHECK);
            } else return error_log('responses_class::jsonEncode() Error: $arrData is not an array');
        }

        /**
         * Convert a JSON encoded string to an array
         *
         * @param $strJson string
         * @return array|void
         */
        public static function jsonDecode($strJson){
            if(is_string($strJson)){
                $arrData = json_decode($strJson, true, 512, JSON_NUMERIC_CHECK);
                return is_array($arrData) ? $arrData : null;
            } else return error_log('responses_class::jsonEncode() Error: $strJson is not a string');
        }
    }

    /* End of file tools_class.php */