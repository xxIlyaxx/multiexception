<?php

namespace Multiexception;

/**
 * Class Model
 *
 * @package App\Models
 * @property string id
 */
abstract class Model implements \Iterator
{
    use GetSet;
    use TraitIterator;

    /**
     * Заполняет свойства текущей
     * модели данными из массива $data
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
