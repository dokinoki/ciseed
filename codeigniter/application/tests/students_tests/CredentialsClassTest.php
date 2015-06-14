<?php

    /**
     * Class credentialsClassTest
     *
     * Test the libraries/credentials_class.php file
     */
    class credentialsClassTest extends CIUnit_Framework_TestCase{
        /**
         * Make sure the username is greater than 8 characters (then it also includes not null case)
         */
        public function testCreateUsername(){
            $strUserName = credentials_class::createUsername();

            $this->assertGreaterThanOrEqual(8, strlen($strUserName));
        }

        /**
         * Make sure the password is greater than 8 characters (then it also includes not null case)
         */
        public function testCreatePassword(){
            $strPassword = credentials_class::createPassword();

            $this->assertGreaterThanOrEqual(8, strlen($strPassword));
        }
    }