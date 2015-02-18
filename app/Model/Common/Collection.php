<?php namespace Rpgo\Model\Common;

use Closure;
use Doctrine\Common\Collections\Collection as DoctrineCollection;
use Rpgo\Support\Collective\Collection as BaseCollection;

class Collection extends BaseCollection implements DoctrineCollection {

    protected $items = [];

    /**
     * Adds an element at the end of the collection.
     *
     * @param mixed $element The element to add.
     *
     * @return boolean Always TRUE.
     */
    function add($element)
    {
        // TODO: Implement add() method.
    }

    /**
     * Clears the collection, removing all elements.
     *
     * @return void
     */
    function clear()
    {
        // TODO: Implement clear() method.
    }

    /**
     * Checks whether an element is contained in the collection.
     * This is an O(n) operation, where n is the size of the collection.
     *
     * @param mixed $element The element to search for.
     *
     * @return boolean TRUE if the collection contains the element, FALSE otherwise.
     */
    function contains($element)
    {
        // TODO: Implement contains() method.
    }

    /**
     * Checks whether the collection is empty (contains no elements).
     *
     * @return boolean TRUE if the collection is empty, FALSE otherwise.
     */
    function isEmpty()
    {
        // TODO: Implement isEmpty() method.
    }

    /**
     * Removes the element at the specified index from the collection.
     *
     * @param string|integer $key The kex/index of the element to remove.
     *
     * @return mixed The removed element or NULL, if the collection did not contain the element.
     */
    function remove($key)
    {
        // TODO: Implement remove() method.
    }

    /**
     * Removes the specified element from the collection, if it is found.
     *
     * @param mixed $element The element to remove.
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    function removeElement($element)
    {
        // TODO: Implement removeElement() method.
    }

    /**
     * Checks whether the collection contains an element with the specified key/index.
     *
     * @param string|integer $key The key/index to check for.
     *
     * @return boolean TRUE if the collection contains an element with the specified key/index,
     *                 FALSE otherwise.
     */
    function containsKey($key)
    {
        // TODO: Implement containsKey() method.
    }

    /**
     * Gets the element at the specified key/index.
     *
     * @param string|integer $key The key/index of the element to retrieve.
     *
     * @return mixed
     */
    function get($key)
    {
        // TODO: Implement get() method.
    }

    /**
     * Gets all keys/indices of the collection.
     *
     * @return array The keys/indices of the collection, in the order of the corresponding
     *               elements in the collection.
     */
    function getKeys()
    {
        // TODO: Implement getKeys() method.
    }

    /**
     * Gets all values of the collection.
     *
     * @return array The values of all elements in the collection, in the order they
     *               appear in the collection.
     */
    function getValues()
    {
        // TODO: Implement getValues() method.
    }

    /**
     * Sets an element in the collection at the specified key/index.
     *
     * @param string|integer $key The key/index of the element to set.
     * @param mixed $value The element to set.
     *
     * @return void
     */
    function set($key, $value)
    {
        // TODO: Implement set() method.
    }

    /**
     * Gets a native PHP array representation of the collection.
     *
     * @return array
     */
    function toArray()
    {
        // TODO: Implement toArray() method.
    }

    /**
     * Sets the internal iterator to the first element in the collection and returns this element.
     *
     * @return mixed
     */
    function first()
    {
        // TODO: Implement first() method.
    }

    /**
     * Sets the internal iterator to the last element in the collection and returns this element.
     *
     * @return mixed
     */
    function last()
    {
        // TODO: Implement last() method.
    }

    /**
     * Gets the key/index of the element at the current iterator position.
     *
     * @return int|string
     */
    function key()
    {
        // TODO: Implement key() method.
    }

    /**
     * Gets the element of the collection at the current iterator position.
     *
     * @return mixed
     */
    function current()
    {
        // TODO: Implement current() method.
    }

    /**
     * Moves the internal iterator position to the next element and returns this element.
     *
     * @return mixed
     */
    function next()
    {
        // TODO: Implement next() method.
    }

    /**
     * Tests for the existence of an element that satisfies the given predicate.
     *
     * @param Closure $p The predicate.
     *
     * @return boolean TRUE if the predicate is TRUE for at least one element, FALSE otherwise.
     */
    function exists(Closure $p)
    {
        // TODO: Implement exists() method.
    }

    /**
     * Returns all the elements of this collection that satisfy the predicate p.
     * The order of the elements is preserved.
     *
     * @param Closure $p The predicate used for filtering.
     *
     * @return DoctrineCollection A collection with the results of the filter operation.
     */
    function filter(Closure $p)
    {
        // TODO: Implement filter() method.
    }

    /**
     * Tests whether the given predicate p holds for all elements of this collection.
     *
     * @param Closure $p The predicate.
     *
     * @return boolean TRUE, if the predicate yields TRUE for all elements, FALSE otherwise.
     */
    function forAll(Closure $p)
    {
        // TODO: Implement forAll() method.
    }

    /**
     * Applies the given function to each element in the collection and returns
     * a new collection with the elements returned by the function.
     *
     * @param Closure $func
     *
     * @return DoctrineCollection
     */
    function map(Closure $func)
    {
        // TODO: Implement map() method.
    }

    /**
     * Partitions this collection in two collections according to a predicate.
     * Keys are preserved in the resulting collections.
     *
     * @param Closure $p The predicate on which to partition.
     *
     * @return array An array with two elements. The first element contains the collection
     *               of elements where the predicate returned TRUE, the second element
     *               contains the collection of elements where the predicate returned FALSE.
     */
    function partition(Closure $p)
    {
        // TODO: Implement partition() method.
    }

    /**
     * Gets the index/key of a given element. The comparison of two elements is strict,
     * that means not only the value but also the type must match.
     * For objects this means reference equality.
     *
     * @param mixed $element The element to search for.
     *
     * @return int|string|bool The key/index of the element or FALSE if the element was not found.
     */
    function indexOf($element)
    {
        // TODO: Implement indexOf() method.
    }

    /**
     * Extracts a slice of $length elements starting at position $offset from the Collection.
     *
     * If $length is null it returns all elements from $offset to the end of the Collection.
     * Keys have to be preserved by this method. Calling this method will only return the
     * selected slice and NOT change the elements contained in the collection slice is called on.
     *
     * @param int $offset The offset to start from.
     * @param int|null $length The maximum number of elements to return, or null for no limit.
     *
     * @return array
     */
    function slice($offset, $length = null)
    {
        // TODO: Implement slice() method.
    }
}
