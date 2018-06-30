<?php

namespace FFQP\Map\Row\Normalizer\Field;

class NormalizedFieldsContainer
{
    /**
     * @var array
     */
    private $fields = [];

    /**
     * Add a new normalized field
     * @param string $type The name of the field
     * @param mixed $value
     * @return $this
     */
    public function add(string $type, $value)
    {
        $this->fields[$type] = $value;
        return $this;
    }

    /**
     * @param string $type
     * @return mixed
     */
    public function get(string $type)
    {
        return $this->fields[$type];
    }
}
