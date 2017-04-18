<?php

namespace App\Multiexception;

/**
 * Class Fillable
 *
 * @package App\Models
 * @property string id
 */
abstract class Fillable implements \Iterator
{
    use GetSet;
    use TraitIterator;

    /**
     * Fills the properties with data
     * from the $data array
     *
     * @param array $data
     * @throws Errors
     */
    public function fill(array $data)
    {
        $errors = new Errors();

        foreach ($data as $key => $value) {
            try {
                $this->$key = $value;
            } catch (\Exception $e) {
                $errors->add($e);
            }
        }

        if (!empty($errors->getErrors())) {
            throw $errors;
        }
    }

    public function __set($key, $value)
    {
        $method = 'set' . ucfirst($key);
        if (method_exists($this, $method)) {
            $this->$method($value);
        } else {
            $this->data[$key] = $value;
        }
    }
}
