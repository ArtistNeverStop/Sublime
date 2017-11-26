<?php

namespace App\GraphQL\Mutation\Features;

use GraphQL\Type\Definition\ResolveInfo;
use App\GraphQL\Query\Query;
use App\GraphQL\Type\Type;
use GraphQL\Type\Definition\InputObjectType;
use App\Feature;
use App\GraphQL\Error\ValidationError;
use Validator;

class CreateFeatureMutation extends Query
{
    /**
     * Required. Unique name of this object type within Schema.
     *
     * @var string
     */
    public static $name = 'createFeature';

    /**
     * Plain-text description of this type for clients
     * (e.g. used by GraphiQL for auto-generated documentation).
     *
     * @var string
     */
    public static $description = 'Create a New Feature';

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
        $validator = Validator::make($args['feature'], [
            'name' => 'string',
            'subcategory_id' => 'numeric'
        ]);
        if ($validator->fails()) {
            throw new ValidationError($validator);
        }
        $feature = Feature::create($args);
        return $feature;
        // return static::makeQuery(Feature::class, $args, $info, static::METHOD_MULTIPLE);
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
            'feature' => new InputObjectType([
                'name' => 'FeatureInput',
                'fields' => [
                    'name' => [
                        'type' => Type::nonNull(Type::string()),
                        'description' => 'The name of the Feature'
                    ],
                    'subcategory_id' => [
                        'name' => 'subcategory_id',
                        'description' => 'The Feature subcategory id.',
                        'type' => Type::nonNull(Type::int())
                    ]
                ]
            ])
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
        return Type::feature();
    }
}
