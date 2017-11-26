<?php

namespace App\GraphQL\Type;

use App\GraphQL\Type\Type;

class ProductType extends Type
{
    /**
     * Required. Unique name of this object type within Schema.
     *
     * @var string
     */
    public $name = 'Product';

    /**
     * Plain-text description of this type for clients
     * (e.g. used by GraphiQL for auto-generated documentation).
     *
     * @var string
     */
    public $description = 'A cokuzza Product';

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
                'description' => 'The id of the product'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of product'
            ],
            'url' => [
                'type' => Type::string(),
                'description' => 'The url of product',
                'resolve' => function ($value) {
                    return preg_replace("/[^A-Za-z0-9\d\&]/", '-', $value->name);
                }
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'The description of product'
            ],
            'shop_links' => [
                'type' => Type::string(),
                'description' => 'The array ao shops available of product'
            ],
            'thumbnail_path' => [
                'type' => Type::string(),
                'description' => 'The thumbnail_path of product'
            ],
            'front_url' => [
                'type' => Type::string(),
                'description' => 'The product front_url',
            ],
            'subcategory_id' => [
                'description' => 'The subcategory_id of the product',
                'type' => Type::int()
            ],
            'subcategory' => [
                'description' => 'The category of the product',
                'type' => Type::subcategory()
            ]
        ];
    }
}
