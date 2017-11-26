<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\ResolveInfo;
use App\GraphQL\Type\Type;
use App\Subcategory;
use GraphQL\Deferred;

class CategoryType extends Type
{
    /**
     * Required. Unique name of this object type within Schema.
     *
     * @var string
     */
    public $name = 'Category';

    /**
     * Plain-text description of this type for clients
     * (e.g. used by GraphiQL for auto-generated documentation).
     *
     * @var string
     */
    public $description = 'A cokuzza Category';

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
                'description' => 'The id of the category'
            ],
            'category_id' => [
                'description' => 'The category_id of cateogory',
                'type' => Type::int()
            ],
            'department_id' => [
                'description' => 'The department_id of this cateogory',
                'type' => Type::int()
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of category'
            ],
            'url' => [
                'type' => Type::string(),
                'description' => 'The url of department',
            ],
            'department' => [
                'type' => Type::department(),
                'description' => 'The department of cateogory'
            ],
            'subcategories' => [
                'type' => Type::listOf(Type::subcategory()),
                'description' => 'The subcategories list of cateogory',
                'args' => [
                    'take' => [
                        'description' => 'The quantity to take',
                        'type' => Type::int()
                    ],
                ],
                'resolve' => function ($value, $args, $context, ResolveInfo $info) {
                    $subcategories =  $value->subcategories;
                    if (isset($args['first'])) {
                        $subcategories = $subcategories->take($args['first']);
                    }
                    return $subcategories;
                }
            ],
            'subcategoriesConnection' => [
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
                    return Subcategory::where('category_id', $value->id)->paginate($args['first'], ['*'], 'page', isset($args['page']) ? $args['page'] : null);
                }
            ],
            'front_url' => [
                'type' => Type::string(),
                'description' => 'The category front_url',
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
