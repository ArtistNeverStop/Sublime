<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\ResolveInfo;
use App\GraphQL\Type\Type;

class FeatureType extends Type
{
    /**
     * Required. Unique name of this object type within Schema.
     *
     * @var string
     */
    public $name = 'Feature';

    /**
     * Plain-text description of this type for clients
     * (e.g. used by GraphiQL for auto-generated documentation).
     *
     * @var string
     */
    public $description = 'A cokuzza Feature';

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
                'description' => 'The id of the feature'
            ],
            'image' => [
                'type' => Type::string(),
                'description' => 'The category id of the feature'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of feature'
            ],
            'subcategory_id' => [
                'description' => 'The subcategory_id of the feature',
                'type' => Type::int(),
            ],
            'subcategory' => [
                'description' => 'The category of the feature',
                'type' => Type::subcategory()
            ]
        ];
    }
}
