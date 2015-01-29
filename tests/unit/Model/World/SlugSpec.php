<?php

namespace unit\Rpgo\Model\World;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rpgo\Model\World\Slug;

class SlugSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('sgmemo');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Slug::class);
    }
}
