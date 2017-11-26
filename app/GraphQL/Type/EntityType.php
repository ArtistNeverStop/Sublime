<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\UnionType;
use App\GraphQL\Type\Type;

class EntityType extends UnionType
{

    /**
     * UnionType constructor.
     *
     * @param $config
     */
    public function __construct($config = null)
    {
        parent::__construct(
            [
            'name' => 'Entity',
            'types' => [
                Type::product(),
                Type::department(),
                Type::category(),
                Type::subcategory(),
                Type::user()
            ],
            'resolveType' => function ($value) {
                $type = strtolower(class_basename(get_class($value->getModel())));
                return Type::$type();
            },
            ]
        );
    }
}
