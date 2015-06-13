<?php

    /**
     * Class encryption_class
     *
     * Manages encryption and comparisons
     */
    final class encryption_class {
        /**
         * Encrypt password string
         *
         * @link http://php.net/manual/en/function.password-hash.php
         * @param $strPassword string
         * @return string
         */
        public static function encrypt($strPassword){
            return password_hash($strPassword, PASSWORD_DEFAULT);
        }

        /**
         * Check if the password matches
         *
         * @param $strPassword string
         * @param $strHash string
         * @return bool
         */
        public static function compare($strPassword, $strHash){
            return self::encrypt($strPassword) === $strHash ? true : false;
        }
    }

    /* End of file encryption_class.php */