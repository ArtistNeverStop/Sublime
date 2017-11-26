<?php

namespace App\GraphQL\Type;

use App\GraphQL\Type\Type;
use GraphQL\Type\Definition\ResolveInfo;

class SubcategoryType extends Type
{
    /**
     * Required. Unique name of this object type within Schema.
     *
     * @var string
     */
    public $name = 'Subcategory';

    /**
     * Plain-text description of this type for clients
     * (e.g. used by GraphiQL for auto-generated documentation).
     *
     * @var string
     */
    public $description = 'A cokuzza Subcategory';

    /**
     * Required. An array describing object fields or
     * callable returning such an array.
     *
     * @return array
     */
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'The id of the subcategory'
            ],
            'category_id' => [
                'description' => 'The category_id of subcateogory',
                'type' => Type::int()
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of subcategory'
            ],
            'url' => [
                'type' => Type::string(),
                'description' => 'The url of department',
            ],
            'category' => [
                'type' => Type::category(),
                'description' => 'The category of subcateogory'
            ],
            'front_url' => [
                'type' => Type::string(),
                'description' => 'The category front_url',
            ],
            'features' => [
                'type' => Type::listOf(Type::feature()),
                'description' => 'The features list of the subcategory',
            ],
            'products' => [
                'type' => Type::listOf(Type::product()),
                'description' => 'The products list of department',
            ],
            'productsConnection' => [
                'type' => Type::connection(),
                'description' => 'Paginate the Products.',
                'args' => [
                    'first' => [
                        'name' => 'first',
                        'description' => 'The Product unique id.',
                        'type' => Type::nonNull(Type::int())
                    ],
                    'page' => [
                        'name' => 'page',
                        'description' => 'The Product unique name.',
                        'type' => Type::int()
                    ]
                ],
                'resolve' => function ($value, $args, $context, ResolveInfo $info) {
                    return $value->products()->paginate($args['first'], ['*'], 'page', isset($args['page']) ? $args['page'] : null);
                }
            ],
        ];
    }
}
