<?php

namespace NumberToWords\Converters;


use NumberToWords\Options\Options;

interface ConverterInterface {
    function __construct(Options $options);

    function convertToWords($number);

}