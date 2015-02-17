<?php

namespace unit\Rpgo\Support\Collective;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DictionarySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Support\Collective\Dictionary');
        $this->shouldHaveType('Rpgo\Support\Collective\Contract\Dictionary');
    }
}
