<?php

namespace FFQP\Map\Row\Normalizer\Field;

class NormalizedFieldsContainer
{
    /**
     * @var RowFieldNormalizerInterface[]
     */
    private $normalizers = [];

    public function add(string $type, RowFieldNormalizerInterface $normalizer): self
    {
        $this->normalizers[$type] = $normalizer;
        return $this;
    }

    public function get(string $type): RowFieldNormalizerInterface
    {
        return $this->normalizers[$type];
    }
}
