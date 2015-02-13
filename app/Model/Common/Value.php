<?php namespace Rpgo\Model\Common;

use Rpgo\Model\Exception\InvalidValueException;

/**
 * A common type of Value Object class with self-validation.
 *
 * Class Value
 * @package Rpgo\Model\Common
 */
class Value {

    /**
     * The value, the instance is holding.
     *
     * @var mixed
     */
    protected $value;

    /**
     * Create a new instance.
     *
     * @param mixed $value
     * @throws InvalidValueException
     */
    public function __construct($value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    /**
     * Cast the value to string.
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->value();
    }

    /**
     * Return a new instance with the changed value.
     * Note: Value Object should be immutable.
     *
     * @param mixed $value
     * @return static
     */
    public function changeValueTo($value)
    {
        return new static($value);
    }

    /**
     * Check whether the other value is equal to this.
     * Note: Value Object don't have identity, so equality is based on the properties.
     *
     * @param $value
     * @return bool
     */
    public function isEqualTo($value)
    {
        return $this == $value;
    }

    /**
     * Return the raw value.
     *
     * @return mixed
     */
    public function value()
    {
        return $this->value;
    }

    /**
     * Validate the given value.
     *
     * @param mixed $value
     * @throws InvalidValueException
     */
    protected function validate($value)
    {
        if (! $this->isValid($value))
            throw new InvalidValueException;
    }

    /**
     * Check whether the given value is valid.
     * Should be overloaded in the subclasses if necessary.
     *
     * @param mixed $value
     * @return bool
     */
    protected function isValid($value)
    {
        return true;
    }
}
