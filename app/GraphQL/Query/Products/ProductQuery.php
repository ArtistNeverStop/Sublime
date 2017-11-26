<?php

namespace App\GraphQL\Query\Products;

use GraphQL\Type\Definition\ResolveInfo;
use App\GraphQL\Query\Query;
use App\GraphQL\Type\Type;
use App\Product;

class ProductQuery extends Query
{
    /**
     * Required. Unique name of this object type within Schema.
     *
     * @var string
     */
    public static $name = 'product';

    /**
     * Plain-text description of this type for clients
     * (e.g. used by GraphiQL for auto-generated documentation).
     *
     * @var string
     */
    public static $description = 'Retrive a Product for its id or its name.';

    /**
     * function ($value, $args, $context, ResolveInfo $info).
     * Given the $value of this type, it is expected to return actual value of the current field.
     * See section on Data Fetching for details
     * (e.g. used by GraphiQL for auto-generated documentation).
     *
     * @var array|mixed
     */
    public function resolve($value, $args, $context, ResolveInfo $info)
    {
        return static::makeQuery(Product::class, $args, $info, static::METHOD_MULTIPLE);
    }

    /**
     * An array of possible type arguments.
     * Each entry is expected to be an array with
     * keys: name, type, description, defaultValue.
     * See Field Arguments section below.
     *
     * @var string
     */
    public function arguments()
    {
        return [
            'name' => [
                'description' => 'The Product unique name.',
                'type' => Type::string()
            ],
            'id' => [
                'description' => 'The Product unique id.',
                'type' => Type::nonNull(Type::int())
            ]
        ];
    }

    /**
     * Required. An instance of internal or custom type.
     * Note: type must be represented by a single instance
     * within one schema (see also Type Registry).
     *
     * @var string
     */
    public function type()
    {
        return Type::product();
    }
}
