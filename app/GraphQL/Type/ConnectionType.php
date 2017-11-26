<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\ResolveInfo;
use App\GraphQL\Type\Type;

class ConnectionType extends Type
{
    /**
     * Required. Unique name of this object type within Schema.
     *
     * @var string
     */
    public $name = 'Connection';

    /**
     * Plain-text description of this type for clients
     * (e.g. used by GraphiQL for auto-generated documentation).
     *
     * @var string
     */
    public $description = 'A generic pagination connection';

    /**
     * Required. An array describing object fields or
     * callable returning such an array.
     *
     * @return array
     */
    public function fields() : array
    {
        return [
            'edges' => [
                'type' => Type::nonNull(Type::listOf(Type::entity())),
                'resolve' => function ($parent, $args, $context, ResolveInfo $info) {
                    return $parent->getCollection();
                }
            ],
            'totalCount' => [
                'type' => Type::int(),
                'resolve' => function ($parent, $args, $context, ResolveInfo $info) {
                    return $parent->count();
                }
            ],
            'pageInfo' => [
                'type' => Type::pageInfo(),
                'resolve' => function ($parent, $args, $context, ResolveInfo $info) {
                    return $parent;
                }
            ]
        ];
    }
}
