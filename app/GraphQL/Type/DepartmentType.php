<?php

namespace App\GraphQL\Type;

use App\GraphQL\Type\Type;
use GraphQL\Type\Definition\ResolveInfo;
use App\Category;
use GraphQL\Deferred;

class DepartmentType extends Type
{
    /**
     * Required. Unique name of this object type within Schema.
     *
     * @var string
     */
    public $name = 'Department';

    /**
     * Plain-text description of this type for clients
     * (e.g. used by GraphiQL for auto-generated documentation).
     *
     * @var string
     */
    public $description = 'A cokuzza Department';

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
                'description' => 'The id of the department'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of department'
            ],
            'url' => [
                'type' => Type::string(),
                'description' => 'The url of department',
            ],
            'limit' => [
                'name' => 'limit',
                'description' => 'The limit of departments',
                'type' => Type::int()
            ],
            'categories' => [
                'type' => Type::listOf(Type::category()),
                'description' => 'The categories list of department',
                'args' => [
                    'take' => [
                        'description' => 'The quantity to take',
                        'type' => Type::int()
                    ],
                ],
                'resolve' => function ($value, $args, $context, ResolveInfo $info) {
                    $categories =  $value->categories;
                    if (isset($args['take'])) {
                        $categories = $categories->take($args['take']);
                    }
                    return $categories;
                }
            ],
            'categoriesConnection' => [
                'type' => Type::connection(),
                'description' => 'Paginate the Categories.',
                'args' => [
                    'first' => [
                        'name' => 'first',
                        'description' => 'The Category unique id.',
                        'type' => Type::nonNull(Type::int())
                    ],
                    'page' => [
                        'name' => 'page',
                        'description' => 'The Category unique name.',
                        'type' => Type::int()
                    ]
                ],
                'resolve' => function ($value, $args, $context, ResolveInfo $info) {
                    return Category::where('category_id', $value->id)->paginate($args['first'], ['*'], 'page', isset($args['page']) ? $args['page'] : null);
                }
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
                    return $value->getProductsAttribute(false)->paginate($args['first'], ['*'], 'page', isset($args['page']) ? $args['page'] : null);
                }
            ],
            'front_url' => [
                'type' => Type::string(),
                'description' => 'The department front_url',
            ],
        ];
    }
}
