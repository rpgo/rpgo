<?php namespace Rpgo\Model\Common;

use Rhumsaa\Uuid\Uuid as Ruuid;

/**
 * Universally unique identity.
 * Note: although this is a value object, entities
 * should not be able to change their identity!
 *
 * Class Uuid
 * @package Rpgo\Model\Common
 */
class Uuid extends Value implements Id {

    /**
     * Universally unique identifier by rhumsaa/uuid.
     *
     * @var Ruuid
     */
    protected $value;

    /**
     * Create a new instance.
     *
     * @param string $id
     */
    public function __construct($id = null)
    {
        parent::__construct( $this->isUuid($id) ? $this->rebuild($id) : $this->generate());
    }

    /**
     * Check whether a given id is identical to this one.
     *
     * @param Id $id
     * @return bool
     */
    public function isIdenticalTo(Id $id)
    {
        return $this->isEqualTo($id);
    }

    /**
     * Generate a new identifier.
     *
     * @return Ruuid
     */
    private function generate()
    {
        return Ruuid::uuid4();
    }

    /**
     * Rebuild the identifier from a string.
     *
     * @param string $id
     * @return Ruuid
     */
    private function rebuild($id)
    {
        return Ruuid::fromString($id);
    }

    /**
     * Check whether the given id is an identifier.
     *
     * @param string $id
     * @return bool
     */
    private function isUuid($id)
    {
        return Ruuid::isValid($id);
    }
}