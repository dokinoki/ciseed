<?php

    /**
     * Class credentials_class
     */
    class credentials_class{

        /**
         * Superlatives
         *
         * @var array
         */
        private static $ARR_SUPERLATIVES = array('super', 'duper', 'mega', 'ultra', 'extra');

        /**
         * Animals
         *
         * @var array
         */
        private static $ARR_ANIMALS = array('cat', 'dog', 'seagull', 'bat', 'monkey', 'squid', 'bear');

        /**
         * Create an awesome pseudo-random username
         *
         * @return string
         */
        public static function createUsername(){
            //Concatenate a string with a superlative, an animal and a random number
            return self::$ARR_SUPERLATIVES[rand (0 , count(self::$ARR_SUPERLATIVES) - 1)] .
                   ucfirst(self::$ARR_ANIMALS[rand (0 , count(self::$ARR_ANIMALS) - 1)]) .
                   rand (0 , 100);
        }

        /**
         * Create a truly random password
         *
         * @param $intLength int The password length
         * @return string
         */
        public static function createPassword($intLength = 10){
            //Create a random binary string
            $strRandom = openssl_random_pseudo_bytes($intLength, $boolSecure);

            //Check for cryptographic validity, otherwise come back again
            while(!$boolSecure) return self::createPassword();

            //Return a user-friendly password and remove base64 padding, since it lowers password entropy
            return substr(base64_encode($strRandom), 0, $intLength);
        }
    }
