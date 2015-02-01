<?php namespace Rpgo\Model\World;

use Rpgo\Model\World\Exception\EmptyWorldSlugException;
use Rpgo\Model\World\Exception\InvalidWorldSlugException;
use Rpgo\Model\World\Exception\LongWorldSlugException;

class Slug {

    private $slug;

    function __construct($slug)
    {
        $slug = (string) $slug;
        $this->checkLength($slug);
        $this->checkCharacters($slug);
        $this->slug = $slug;
    }

    function __toString()
    {
        return $this->slug;
    }

    private function checkCharacters($slug)
    {
        if( ! preg_match('/^[a-z][-a-z0-9]*$/', $slug))
            throw new InvalidWorldSlugException;
    }

    public function change($slug)
    {
        return new self($slug);
    }

    private function checkLength($slug)
    {
        if( strlen(utf8_decode($slug)) == 0 )
            throw new EmptyWorldSlugException;

        if( strlen(utf8_decode($slug)) > 20)
            throw new LongWorldSlugException;
    }
}
