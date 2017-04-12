<?php

namespace Multiexception;

/**
 * Class Errors
 *
 * @package App\Exceptions
 */
class Errors extends \Exception
{
    protected $data = [];

    /**
     * Adds Exception to $this->data
     *
     * @param \Exception $e
     */
    public function add(\Exception $e)
    {
        $this->data[] = $e;
    }

    /**
     * Returns $this->data array
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->data;
    }
}
