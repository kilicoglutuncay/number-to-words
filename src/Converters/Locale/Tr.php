<?php
/**
 * Created by PhpStorm.
 * User: dalarim
 * Date: 1.12.2018
 * Time: 20:13
 */

namespace NumberToWords\Converters\Locale;


use NumberToWords\Converters\ConverterInterface;

class Tr implements ConverterInterface {
	private $thousandsWords = [ '', 'bin', 'milyon', 'milyar', 'trilyon', 'katrilyon', 'kentilyon' ];
	private $hundredsDigitWord = "yüz";
	private $tensDigitWords = [ '', 'on', 'yirmi', 'otuz', 'kırk', 'elli', 'altmış', 'yetmiş', 'seksen', 'doksan' ];
	private $unitsDigitWords = [ 'sıfır', 'bir', 'iki', 'üç', 'dört', 'beş', 'altı', 'yedi', 'sekiz', 'dokuz' ];
	private $wordSeparator = " ";


	function convertToWords( $number ) {

		$number = strval( $number );
		if ( (int) $number === 0 ) {
			return $this->unitsDigitWords[0];
		}
		$numberLength = strlen( $number );

		if ( $numberLength % 3 !== 0 ) {
			$number = str_pad( $number, $numberLength + ( 3 - ( $numberLength % 3 ) ),
				'0', STR_PAD_LEFT );
		}

		if ( $numberLength > 21 ) {
			throw new \Exception( "Unsupported length of number" );
		}

		//separated by thousands
		$thousandSeparated = str_split( $number, 3 );
		$fractionIndex     = count( $thousandSeparated ) - 1;


		$result = "";
		foreach ( $thousandSeparated as $fraction ) {
			if ( (int) $fraction == 0 ) {
				//if($numberLength == 1)
				$fractionIndex --;
				continue;
			}

			if ( $fraction[0] > 0 ) {
				if ( $fraction[0] > 1 ) {
					$result .= $this->unitsDigitWords[ $fraction[0] ];
					$result .= $this->wordSeparator;
				}
				$result .= $this->hundredsDigitWord;
				$result .= $this->wordSeparator;
			}
			if ( $fraction[1] > 0 ) {
				$result .= $this->tensDigitWords[ $fraction[1] ];
				$result .= $this->wordSeparator;
			}
			//1000,1001001
			if ( $fraction[2] > 0 && ! ( (int) $fraction == 1 && $fractionIndex == 1 ) ) {

				$result .= $this->unitsDigitWords[ $fraction[2] ];
				$result .= $this->wordSeparator;
			}

			if ( $fractionIndex > 0 ) {
				$result .= $this->thousandsWords[ $fractionIndex ];
				$result .= $this->wordSeparator;
			}
			$fractionIndex --;
		}

		return trim( $result );
	}


}