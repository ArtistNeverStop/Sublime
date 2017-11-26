<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\ResolveInfo;
use App\GraphQL\Type\Type;
use App\GraphQL\Mutation;

class MutationType extends Type
{
    /**
     * Required. Unique name of this object type within Schema.
     *
     * @var string
     */
    public $name = 'Mutation';

    /**
     * Plain-text description of this type for clients
     * (e.g. used by GraphiQL for auto-generated documentation).
     *
     * @var string
     */
    public $description = 'The root mutation';

    /**
     * An array describing object fields.
     *
     * @var array
     */
    public $queries = [
        // # ---------- Users ---------- #
        // Mutation\Users\MeMutation::class,
        // Mutation\Users\UserMutation::class,
        // Mutation\Users\UsersMutation::class,
        // # ---------- Departments ---------- #
        // Mutation\Departments\DepartmentsConnectionMutation::class,
        // Mutation\Departments\DepartmentsMutation::class,
        // Mutation\Departments\DepartmentMutation::class,
        // # ---------- Category ---------- #
        // Mutation\Categories\CategoriesMutation::class,
        // Mutation\Categories\CategoryMutation::class,
        // # ---------- Subcategory ---------- #
        // Mutation\Subcategories\SubcategoriesMutation::class,
        // Mutation\Subcategories\SubcategoryMutation::class,
        // # ---------- Products ---------- #
        // Mutation\Products\ProductsConnectionMutation::class,
        // Mutation\Products\ProductsMutation::class,
        // Mutation\Products\ProductMutation::class,
        # ---------- Features ---------- #
        // Mutation\Features\FeaturesMutation::class,
        Mutation\Features\CreateFeatureMutation::class,
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
