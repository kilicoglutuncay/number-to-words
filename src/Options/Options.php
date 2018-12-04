<?php
/**
 * Created by PhpStorm.
 * User: kilicoglutuncay
 * Date: 2018-12-04
 * Time: 13:32
 */

namespace NumberToWords\Options;


class Options
{
    private $wordSeparator;
    public function __construct()
    {
        $this->wordSeparator = ' ';
    }

    /**
     * @return string
     */
    public function getWordSeparator(): string
    {
        return $this->wordSeparator;
    }


    /**
     * @param string $wordSeparator
     * @return $this
     */
    public function setWordSeparator(string $wordSeparator)
    {
        $this->wordSeparator = $wordSeparator;
        return $this;
    }


}