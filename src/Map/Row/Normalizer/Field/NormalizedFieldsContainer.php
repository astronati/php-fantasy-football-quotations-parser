<?php

namespace FFQP\Map\Row\Normalizer\Field;

class NormalizedFieldsContainer
{
    /**
     * @var RowFieldNormalizerInterface
     */
    private $normalizers = [];

    /**
     * Add a new normalized field
     * @param string $type The name of the field
     * @param RowFieldNormalizerInterface $normalizer
     * @return $this
     */
    public function add(string $type, RowFieldNormalizerInterface $normalizer)
    {
        $this->normalizers[$type] = $normalizer;
        return $this;
    }

    /**
     * @param string $type
     * @return RowFieldNormalizerInterface
     */
    public function get(string $type)
    {
        return $this->normalizers[$type];
    }
}
