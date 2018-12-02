<?php
/**
 * Created by PhpStorm.
 * User: dalarim
 * Date: 1.12.2018
 * Time: 19:45
 */

namespace NumberToWords;


use NumberToWords\Converters\ConverterInterface;

class NumberToWords {
	private $converters = [
		'tr' => Converters\Locale\Tr::class
	];

	/**
	 * @param $locale
	 *
	 * @return ConverterInterface
	 * @throws \Exception
	 */
	public function getConverter( $locale ) {
		if ( array_key_exists( $locale, $this->converters ) ) {
			return new $this->converters[$locale];
		}
		throw new \Exception( "Given locale is not supported" );
	}
}