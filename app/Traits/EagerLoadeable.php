<?php

namespace App\Traits;

trait EagerLoadeable
{
	/**
     * Get the Queryable array
     *
     * @return array
     *
     */
    public static function queryableFields()
    {
    	return (new static)->getQueryable();
    }

    /**
     * Get the Queryable array
     *
     * @return array
     *
     */
    public function getQueryable()
    {
    	return array_merge(
    		[$this->getKeyName()],
    		$this->fillable,
    		$this->queryableRelations
    	);
    }

	/**
     * Get the queryableRelations array
     *
     * @return array
     *
     */
    public function getQueryableRelations()
    {
    	return $this->queryableRelations;
    }
}