<?php

    /**
     * Class toolsClassTest
     *
     * Tests for tools_class.php
     */
    class toolsClassTest extends CIUnit_Framework_TestCase{

        /**
         * Make sure the JSON encoding function works
         */
        public function testJsonEncode(){
            $arrData = array('marco' => 'polo');
            $strJson = tools_class::jsonEncode($arrData);

            $this->assertEquals('{"marco":"polo"}', $strJson);
        }

        /**
         * Make sure JSON decoding works
         */
        public function testJsonDecode(){
            $strJson = '{"marco":"polo"}';
            $arrData = tools_class::jsonDecode($strJson);

            $this->assertEquals(array('marco' => 'polo'), $arrData);
        }
    }