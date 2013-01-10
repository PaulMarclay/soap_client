<?php
	/*
	*	SOAP CLIENT version 1.0
	*
	*	Imagina - Plugin.
	*
	*
	*	Copyright (c) 2012 Dolem Labs
	*
	*	Authors:	Paul Marclay (paul.eduardo.marclay@gmail.com)
	*
	*/

	class Soap_Client extends Ancestor {
		private $_host 		= '';
		private $_headers 	= '';
		
		protected $_client	= null;
		
		public function __construct($host = null, $headers = null) {
			if ($host) {
				return $this->connect($host, $headers);
			}
		}
		
		// -- Getters
		
		public function getHost() {
			return $this->_host;
		}
		
		public function getHeaders() {
			return $this->_headers;
		}
		
		public function getClient() {
			return $this->_client;
		}
		
		// -- Setters
		
		public function setHost($host) {
			$this->_host = $host;
			return $this;
		}
		
		public function setHeaders($headers) {
			$this->_headers = $headers;
			return $this;
		}
		
		// -- Misc functions
		
		public function connect($host, $headers = array()) {
			$this->setHost($host);
			$this->setHeaders($headers);
			
			try {
                $this->_client = new Soap_Primitive($this->getHost(), $this->getHeaders());
                return $this->getClient();
            } catch(Exception $e) {
                return false;
            }
		}
        
        public function getDelay() {
            return $this->getClient()->getDelay();
        }
	}