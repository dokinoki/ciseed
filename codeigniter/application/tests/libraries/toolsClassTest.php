<?php

    class toolsClassTest extends CIUnit_Framework_TestCase{
        function __construct(){
            $this->load->library('unit_test');
        }

        function jsonEncodeTest(){
            $arrData = array('marco' => 'polo');
            $strJson = tools_class::jsonEncode($arrData);

            $this->unit->run($strJson, 'is_string');
        }

        function jsonDecodeTest(){
            $strJson = '{"marco":"polo"}';
            $strJson = tools_class::jsonDecode($strJson);

            $this->unit->run($strJson, 'is_array');
        }
    }