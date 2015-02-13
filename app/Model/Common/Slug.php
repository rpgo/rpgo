<?php namespace Rpgo\Model\Common;

/**
 * A common slug, which can belong to any Entity.
 *
 * Class Slug
 * @package Rpgo\Model\Common
 */
class Slug extends Value {

    /**
     * Create a new instance.
     *
     * @param string $slug
     */
    public function __construct($slug)
    {
        parent::__construct((string) $slug);
    }

    /**
     * Validate the given slug.
     *
     * @param string $slug
     * @return int
     */
    protected function isValid($slug)
    {
        return $this->isSlug($slug);
    }

    /**
     * Check whether the given slug is really a slug.
     *
     * @param string $slug
     * @return int
     */
    private function isSlug($slug)
    {
        return preg_match('/^[a-z][-a-z0-9]+$/', $slug);
    }
}
