<?php

namespace App\GraphQL\Type;

use App\GraphQL\Type\Type;
use GraphQL\Type\Definition\ResolveInfo;

class PageInfoType extends Type
{
    /**
     * Required. Unique name of this object type within Schema.
     *
     * @var string
     */
    public $name = 'PageInfo';

    /**
     * Plain-text description of this type for clients
     * (e.g. used by GraphiQL for auto-generated documentation).
     *
     * @var string
     */
    public $description = 'A generic PageInfoType';

    /**
     * Required. An array describing object fields or
     * callable returning such an array.
     *
     * @return array
     */
    public function fields() : array
    {
        return [
            // 'endCursor' => [
            //     'type' => Type::int(),
            //     'description' => 'The end',
            //     'resolve' => function ($parent, $args, $context, ResolveInfo $info) {
            //         return dd($parent);
            //     }
            // ],
            'hasNextPage' => [
                'type' => Type::boolean(),
                'description' => 'hasNextPage is used to indicate whether more edges exist following the set defined by the clients arguments. If the client is paginating with first/after, then the',
                'resolve' => function ($parent, $args, $context, ResolveInfo $info) {
                    return $parent->hasMorePages();
                }
            ],
            'currentPage' => [
                'type' => Type::int(),
                'description' => 'hasNextPage is used to indicate whether more edges exist following the set defined by the clients arguments. If the client is paginating with first/after, then the',
                'resolve' => function ($parent, $args, $context, ResolveInfo $info) {
                    return $parent->currentPage();
                }
            ],
            'pages' => [
                'type' => Type::int(),
                'description' => 'hasNextPage is used to indicate whether more edges exist following the set defined by the clients arguments. If the client is paginating with first/after, then the',
                'resolve' => function ($parent, $args, $context, ResolveInfo $info) {
                    return $parent->lastPage();
                }
            ],
            'hasPreviousPage' => [
                'type' => Type::boolean(),
                'description' => 'hasPreviousPage is used to indicate whether more edges exist prior to',
                'resolve' => function ($parent, $args, $context, ResolveInfo $info) {
                    return !$parent->onFirstPage();
                }
            ]
        ];
    }
}
