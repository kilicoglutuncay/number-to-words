<?php
/**
 * Created by PhpStorm.
 * User: dalarim
 * Date: 2.12.2018
 * Time: 02:39
 */

namespace NumberToWords;


use NumberToWords\Converters\ConverterInterface;
use PHPUnit\Framework\TestCase;

class NumberToWordsTest extends TestCase {


	public function testThatIfConverterDoesNotExistThenThrowsException(){
		$this->expectException(\Exception::class);
		$numberToWords = new NumberToWords();
		$numberToWords->getConverter('xdfg');
	}

	public function testConverterExists(){

		$numberToWords = new NumberToWords();
		$expected = ($numberToWords->getConverter('tr'));
		$this->assertTrue($expected instanceof ConverterInterface);
	}
}