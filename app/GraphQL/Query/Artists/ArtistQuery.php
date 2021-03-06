<?php

namespace App\GraphQL\Query\Artists;

use GraphQL\Type\Definition\ResolveInfo;
use App\GraphQL\Query\Query;
use App\GraphQL\Type\Type;
use App\Artist;

class ArtistQuery extends Query
{
    /**
     * Required. Unique name of this object type within Schema.
     *
     * @var string
     */
    public static $name = 'artist';

    /**
     * Plain-text description of this type for clients
     * (e.g. used by GraphiQL for auto-generated documentation).
     *
     * @var string
     */
    public static $description = 'Retrive a Artist for its unique attributes.';

    /**
     * function ($value, $args, $context, ResolveInfo $info).
     * Given the $value of this type, it is expected to return actual value of the current field.
     * See section on Data Fetching for details
     * (e.g. used by GraphiQL for auto-generated documentation).
     *
     * @var mixed
     */
    public function resolve($value, $args, $context, ResolveInfo $info)
    {
        return static::makeQuery(Artist::class, $args, $info);
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
            'id' => [
                'description' => 'The Artist unique id.',
                'type' => Type::int()
            ],
            'name' => [
                'description' => 'The Artist unique id.',
                'type' => Type::string()
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
        return Type::artist();
    }
}
