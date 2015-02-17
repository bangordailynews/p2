<?php

class Password {

	private $_defaults = array(
		'count' => 4,
		'maxLen' => 0,
		'digit' => false,
		'case' => 3, // 1 = upper, 2 = lower, 3 = UCFirst
		'symbol' => false
	);

	private $_settings = array();

	private $_list = 'http://www.mieliestronk.com/corncob_lowercase.txt';

	public function __construct( $args = null ){

		if( is_array( $args ) ){
			$this->_settings = array_merge( $this->_defaults, $args );
		}else{
			$this->_settings = $this->_defaults;
		}

		$this->_filterSettings();

	}

	public function generatePassword() {

		$words = $this->_getWords();
		$digit = $this->_getDigit();
		$symbol = $this->_getSymbol();
		
		switch( $this->_settings['case'] ){
			case 1:
				$func = 'strtoupper';
				break;
			case 2:
				$func = 'strtolower';
				break;
			case 3:
				$func = 'ucfirst';
				break;
			default:
				$func = false;
				break;
		}
		
		if( $func !== false ) {
			$words = array_map($func, $words);
		}
		
		if( mt_rand( 1, 10 ) > 5 && !empty($digit)){
			$words[] = $digit;
		}elseif(!empty($digit)){
			array_unshift($words, $digit);
		}
		
		$string = null;
		foreach( $words as $word ){

			if( !empty( $string ) )
				$string .= $symbol;

			$string .= $word;

		}
		
		return str_replace( '#', ' ', $string );

	}

	private function _getSymbol() {

		if( $this->_settings['symbol'] === false )
			return '#';

		$symbols = array('$', '-', '@', '_', '&');
		shuffle($symbols);
		return array_shift($symbols);

	}

	private function _getDigit() {

		return ($this->_settings['digit']) ? mt_rand(0,9) : null;

	}

	private function _getWords() {

		if( $this->_settings['maxLen'] > 0 ){
			$maxWordLen = floor($this->_settings['maxLen'] / $this->_settings['count']);
			if( $maxWordLen < 3 ){

				throw new Exception('Word length is '.$maxWordLen.', but cannot be < 3. Please increase password length, or decrease word count, and try again.');

			}
		
		}else{
			$maxWordLen = false;
		}

		$list = array_map('trim', explode( PHP_EOL, file_get_contents( $this->_list ) ) );
		if( $maxWordLen !== false ){

			$list = array_filter( $list, function($var) use ($maxWordLen) {

				return strlen($var) <= $maxWordLen;

			});

		}

		foreach(range(1,10) as $i) {
			shuffle( $list );
		}

		$chunk = array_chunk($list, $this->_settings['count']);
		return $chunk[0];

	}

	private function _filterSettings(){

		$this->_settings['count'] = filter_var($this->_settings['count'], FILTER_SANITIZE_NUMBER_INT);
		foreach( $this->_settings as $key => $value ){

			switch( $key ){
				case 'wordCount':
				case 'maxLen':
				case 'case':
					$this->_settings[ $key ] = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
					break;
				case 'digit':
				case 'symbol':
					$this->_settings[ $key ] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
					break;
			}

		}

	}

}
