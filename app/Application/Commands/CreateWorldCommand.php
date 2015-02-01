<?php namespace Rpgo\Application\Commands;

use Rpgo\Application\Commands\Command;

class CreateWorldCommand extends Command {

    /**
     * @var
     */
    public $name;
    /**
     * @var
     */
    public $slug;
    /**
     * @var
     */
    public $brand;
    /**
     * @var
     */
    public $member;

    /**
     * Create a new command instance.
     *
     * @param string $name
     * @param string $slug
     * @param string $brand
     * @param string $admin
     */
    public function __construct($name, $slug, $brand, $admin)
    {
        $this->name = $name;
        $this->slug = $slug;
        $this->brand = $brand;
        $this->member = $admin;
    }

}
