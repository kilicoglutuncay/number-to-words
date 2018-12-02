<?php
/**
 * Created by PhpStorm.
 * User: dalarim
 * Date: 1.12.2018
 * Time: 20:11
 */

namespace NumberToWords\Converters;


interface ConverterInterface {
	function convertToWords($number);

}