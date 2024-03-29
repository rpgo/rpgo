<?php namespace Rpgo\Application\Commands;

use Rpgo\Application\Commands\Command;
use Rpgo\Model\User\User;

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
    public $admin;
    /**
     * @var User
     */
    public $creator;

    /**
     * Create a new command instance.
     *
     * @param string $name
     * @param string $slug
     * @param string $brand
     * @param string $admin
     * @param User $creator
     */
    public function __construct($name, $slug, $brand, $admin, User $creator)
    {
        $this->name = $name;
        $this->slug = $slug;
        $this->brand = $brand;
        $this->admin = $admin;
        $this->creator = $creator;
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:40', 'unique:worlds,name'],
            'slug' => ['required', 'string', 'max:20', 'regex:/^[a-z][-a-z0-9]*$/', 'unique:worlds,slug'],
            'brand' => ['required', 'string', 'max:10', 'unique:worlds,brand'],
            'admin' => ['required'],
        ];
    }

}
