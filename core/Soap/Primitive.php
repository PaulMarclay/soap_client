<?php
    /*
    *   SOAP CLIENT version 1.0
    *
    *   Imagina - Plugin.
    *
    *
    *   Copyright (c) 2012 Dolem Labs
    *
    *   Authors:    Paul Marclay (paul.eduardo.marclay@gmail.com)
    *
    */

	class Soap_Primitive extends SoapClient {
        
        private $_timeStart = 0;
        private $_timeEnd   = 0;
        
        public function setTimeStart($time) {
            $this->_timeStart = $time;
        }
		
        public function setTimeEnd($time) {
            $this->_timeEnd = $time;
        }
        
        public function getTimeStart() {
            return $this->_timeStart;
        }
        
        public function getTimeEnd() {
            return $this->_timeEnd;
        }
        
        public function getDelay() {
            return $this->getTimeEnd() - $this->getTimeStart();
        }
        
        function __doRequest($request, $location, $action, $version) { 
            $this->setTimeStart(time() + microtime());
            $result = parent::__doRequest($request, $location, $action, $version);
            $this->setTimeEnd(time() + microtime());
            
            return $result;
        }
        
    }