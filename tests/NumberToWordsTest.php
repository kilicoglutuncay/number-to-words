<?php

namespace NumberToWords;


use NumberToWords\Converters\ConverterInterface;
use NumberToWords\Options\Options;
use PHPUnit\Framework\TestCase;

class NumberToWordsTest extends TestCase
{


    public function testThatIfConverterDoesNotExistThenThrowsException()
    {
        $this->expectException(\Exception::class);
        $numberToWords = new NumberToWords();
        $options = new Options;
        $numberToWords->getConverter('xdfg', $options);
    }

    public function testConverterExists()
    {

        $numberToWords = new NumberToWords();
        $options = new Options;
        $expected = ($numberToWords->getConverter('tr', $options));
        $this->assertTrue($expected instanceof ConverterInterface);
    }
}