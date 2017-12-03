<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\ResolveInfo;
use App\GraphQL\Type\Type;
use App\GraphQL\Query;


class QueryType extends Type
{
    /**
     * Required. Unique name of this object type within Schema.
     *
     * @var string
     */
    public $name = 'Query';

    /**
     * Plain-text description of this type for clients
     * (e.g. used by GraphiQL for auto-generated documentation).
     *
     * @var string
     */
    public $description = 'The root query';

    /**
     * An array describing object fields.
     *
     * @var array
     */
    public $queries = [
        # ---------- Users ---------- #
        Query\Users\MeQuery::class,
        Query\Users\UserQuery::class,
        Query\Users\UsersQuery::class,

        Query\Artists\ArtistQuery::class,
        // Query\Artists\ArtistsQuery::class,
        // # ---------- Departments ---------- #
        // Query\Departments\DepartmentsConnectionQuery::class,
        // Query\Departments\DepartmentsQuery::class,
        // Query\Departments\DepartmentQuery::class,
        // # ---------- Category ---------- #
        // Query\Categories\CategoriesQuery::class,
        // Query\Categories\CategoryQuery::class,
        // # ---------- Subcategory ---------- #
        // Query\Subcategories\SubcategoriesQuery::class,
        // Query\Subcategories\SubcategoryQuery::class,
        // # ---------- Products ---------- #
        // Query\Products\ProductsConnectionQuery::class,
        // Query\Products\ProductsQuery::class,
        // Query\Products\ProductQuery::class,
        // # ---------- Features ---------- #
        // Query\Features\FeaturesQuery::class,
        // Query\Features\FeatureQuery::class,
    ];

    /**
     * Required. An array describing object fields or
     * callable returning such an array.
     *
     * @return array
     */
    public function fields() : array
    {
        $fields = [];
        foreach ($this->queries as $class) {
            $fields[$class::$name] = (new $class)->toArray();
        }
        return $fields;
    }
}
