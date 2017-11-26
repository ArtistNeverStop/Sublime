<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\ResolveInfo;
use App\GraphQL\Type\Type;

class EdgeType extends Type
{
    /**
     * Required. Unique name of this object type within Schema.
     *
     * @var string
     */
    public $name = 'Edge';

    /**
     * Plain-text description of this type for clients
     * (e.g. used by GraphiQL for auto-generated documentation).
     *
     * @var string
     */
    public $description = 'A generic pagination edge';

    /**
     * The name of The type
     *
     * @var string
     */
    public function fields()
    {
        return [
            'node' => [
                'type' => Type::entity(),
                'resolve' => function ($parent, $args, $context, ResolveInfo $info) {
                    return $parent;
                }
            ],
            // 'cursor' => [
            //     'type' => Type::int(),
            //     'resolve' => function ($parent, $args, $context, ResolveInfo $info) {
            //         return $parent->id;
            //     }
            // ]
        ];
    }
}
