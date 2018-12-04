<?php


namespace NumberToWords;


use NumberToWords\Converters\ConverterInterface;
use NumberToWords\Options\Options;

class NumberToWords {
	private $converters = [
		'tr' => Converters\Locale\Tr::class
	];

    /**
     * @param $locale
     *
     * @param Options $options
     * @return ConverterInterface
     * @throws \Exception
     */
	public function getConverter( $locale,Options $options ) {
		if ( array_key_exists( $locale, $this->converters ) ) {
			return new $this->converters[$locale]($options);
		}
		throw new \Exception( "Given locale is not supported" );
	}
}