<?php

namespace App\GraphQL\Query\Features;

use GraphQL\Type\Definition\ResolveInfo;
use App\GraphQL\Query\Query;
use App\GraphQL\Type\Type;
use App\Feature;

class FeaturesQuery extends Query
{
    /**
     * Required. Unique name of this object type within Schema.
     *
     * @var string
     */
    public static $name = 'features';

    /**
     * Plain-text description of this type for clients
     * (e.g. used by GraphiQL for auto-generated documentation).
     *
     * @var string
     */
    public static $description = 'Retrive all the Features.';

    /**
     * Arguments to rename before make the Query Builder
     *
     * @var string
     */
    public static $renameArguments = [
        'subcategory' => 'subcategory_id'
    ];

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
        return static::makeQuery(Feature::class, $args, $info, static::METHOD_MULTIPLE);
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
                'name' => 'name',
                'description' => 'The Feature unique name.',
                'type' => Type::string()
            ],
            'id' => [
                'name' => 'id',
                'description' => 'The Feature unique id.',
                'type' => Type::int()
            ],
            'subcategory' => [
                'name' => 'subcategory',
                'description' => 'The Feature subcategory id.',
                'type' => Type::int()
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
        return Type::nonNull(Type::listOf(Type::feature()));
    }
}
