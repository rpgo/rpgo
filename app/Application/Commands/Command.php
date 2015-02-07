<?php namespace Rpgo\Application\Commands;

use Rpgo\Support\Bus\ShouldBeValidated;

abstract class Command implements ShouldBeValidated {

    use ValidatesWhenResolved;

}
