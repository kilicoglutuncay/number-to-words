<?php
/**
 * Created by PhpStorm.
 * User: dalarim
 * Date: 1.12.2018
 * Time: 22:14
 */

namespace NumberToWords\Converters\Locale;


use NumberToWords\NumberToWords;
use PHPUnit\Framework\TestCase;

class TrTest extends TestCase {

	/**
	 * @dataProvider provideData
	 */
	public function testConvertNumberToWords($actual,$expected){
		$numberToWords = new NumberToWords();
		$converter = $numberToWords->getConverter('tr');
		$this->assertEquals($expected,$converter->convertToWords($actual));
	}

	/**
	 * @expectedException  \Exception
	 */
	public function testIfNumberLongerThan21DigitThrowException(){


		$numberToWords = new NumberToWords();
		$converter = $numberToWords->getConverter('tr');
		$converter->convertToWords('66121212121212121212121212121');
	}
	public function provideData(){
		return [
			[0,'sıfır'],
			[1,'bir'],
			[10,'on'],
			[11,'on bir'],
			[19,'on dokuz'],
			[21,'yirmi bir'],
			[100,'yüz'],
			[101,'yüz bir'],
			[151,'yüz elli bir'],
			[251,'iki yüz elli bir'],
			[999,'dokuz yüz doksan dokuz'],
			[1231,'bin iki yüz otuz bir'],
			[1001,'bin bir'],
			[1000,'bin'],
			[2000,'iki bin'],
			[2111,'iki bin yüz on bir'],
			[2534,'iki bin beş yüz otuz dört'],
			[2860,'iki bin sekiz yüz altmış'],
			[10740,'on bin yedi yüz kırk'],
			[11860,'on bir bin sekiz yüz altmış'],
			[84586,'seksen dört bin beş yüz seksen altı'],
			[99999,'doksan dokuz bin dokuz yüz doksan dokuz'],
			[100000,'yüz bin'],
			[100001,'yüz bin bir'],
			[113400,'yüz on üç bin dört yüz'],
			[218938,'iki yüz on sekiz bin dokuz yüz otuz sekiz'],
			[1123949,'bir milyon yüz yirmi üç bin dokuz yüz kırk dokuz'],
			[1000001,'bir milyon bir'],
			[1100001,'bir milyon yüz bin bir'],
			[1001001,'bir milyon bin bir'],
			[9020203,'dokuz milyon yirmi bin iki yüz üç'],
			[12309234,'on iki milyon üç yüz dokuz bin iki yüz otuz dört'],
			[100000001,'yüz milyon bir'],
			[100001000,'yüz milyon bin'],
			[110001000,'yüz on milyon bin'],
			[110001100,'yüz on milyon bin yüz'],
			[110101101,'yüz on milyon yüz bir bin yüz bir'],
			[118131121,'yüz on sekiz milyon yüz otuz bir bin yüz yirmi bir'],
			[938930834,'dokuz yüz otuz sekiz milyon dokuz yüz otuz bin sekiz yüz otuz dört'],
			[1938930834,'bir milyar dokuz yüz otuz sekiz milyon dokuz yüz otuz bin sekiz yüz otuz dört'],
			[101938930834,'yüz bir milyar dokuz yüz otuz sekiz milyon dokuz yüz otuz bin sekiz yüz otuz dört'],
			[1101938930834,'bir trilyon yüz bir milyar dokuz yüz otuz sekiz milyon dokuz yüz otuz bin sekiz yüz otuz dört'],
			[148101938930834,'yüz kırk sekiz trilyon yüz bir milyar dokuz yüz otuz sekiz milyon dokuz yüz otuz bin sekiz yüz otuz dört'],

		];
	}
}