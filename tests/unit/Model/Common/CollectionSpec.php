<?php

namespace unit\Rpgo\Model\Common;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CollectionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Rpgo\Model\Common\Collection');
        $this->shouldHaveType('Rpgo\Support\Collective\Collection');
        $this->shouldHaveType('Doctrine\Common\Collections\Collection');
    }
}
