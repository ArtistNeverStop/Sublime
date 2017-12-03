<?php

namespace App\Traits\Support;

trait EntitySerializableAttribute
{
    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function getEntityAttribute()
    {
        return class_basename(new $this);
    }

    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
        return array_merge(parent::toArray(), ['_entity' => $this->entity]);
    }
}
