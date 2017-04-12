<?php

namespace Multiexception;

trait TraitIterator
{
    /**
     * Resets the internal pointer
     */
    public function rewind()
    {
        reset($this->data);
    }

    /**
     * Returns key
     *
     * @return mixed
     */
    public function key()
    {
        return key($this->data);
    }

    /**
     * Returns current item
     *
     * @return mixed
     */
    public function current()
    {
        return current($this->data);
    }

    /**
     * Moves internal pointer
     */
    public function next()
    {
        next($this->data);
    }

    /**
     * Returns status of internal poiner
     *
     * @return bool
     */
    public function valid()
    {
        return key($this->data) !== null;
    }
}
