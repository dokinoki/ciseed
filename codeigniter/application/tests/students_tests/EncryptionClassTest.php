<?php

    /**
     * Class encryptionClassTest
     *
     * Tests for encryption_class.php
     */
    class encryptionClassTest extends CIUnit_Framework_TestCase{

        /**
         * Make sure the string is hashed
         *
         * @dataProvider encryptionProvider
         */
        public function testEncrypt(){
            $strEncrypted = encryption_class::encrypt('test');

            $this->assertGreaterThanOrEqual(20, strlen($strEncrypted));
        }

        /**
         * Make sure that the password hashing and verification works
         */
        public function testDecrypt(){
            $strPassword = 'test';
            $strEncrypted = encryption_class::encrypt($strPassword);

            $this->assertTrue(encryption_class::verify($strPassword, $strEncrypted));
        }
    }