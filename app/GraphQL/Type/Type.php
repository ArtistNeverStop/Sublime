<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type as ScalarType;

class Type extends ObjectType
{
    /**
     * Object types:
     */
    private static $user;
    private static $product;
    private static $query;
    private static $mutation;
    private static $category;
    private static $subcategory;
    private static $department;
    private static $connection;
    private static $edge;
    private static $pageInfo;
    private static $entity;
    private static $feature;

    /**
     * Required. Unique name of this object type within Schema.
     *
     * @var string
     */
    public $name = '';

    /**
     * Plain-text description of this type for clients
     * (e.g. used by GraphiQL for auto-generated documentation).
     *
     * @var string
     */
    public $description = '';

    /**
     * ObjectType constructor.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct([
            'name' => $this->name,
            'description' => $this->description,
            'fields' => function () {
                return array_merge(
                    [
                        'entity' => [
                            'type' => static::string(),
                            'description' => 'Describes what type of entity the resource is',
                        ]
                    ],
                    $this->fields(func_get_args())
                );
            }
        ]);
    }
// 'interfaces' => function () {
//     return $this->interfaces(func_get_args());
// },
// 'isTypeOf' => function () {
//     return $this->isTypeOf(func_get_args());
// },
// 'resolveField' => function () {
//     return $this->resolveField(func_get_args());
// }

    /**
     * Make a nested query builder to load it relationships.
     *
     * @return Builder
     */
    public static function makeNestedBuilder(&$builder, $queryNested, $exclude = [], $nested = null)
    {
        $relations = $with = [];
        $queryNested = $nested ?: $queryNested;
        foreach ($queryNested as $key => $item) {
            if (is_array($item) && !strpos($key, 'Connection') && array_search($key, $exclude) === false) {
                $relations[] = $key;
            }
        }
        foreach ($relations as $relation) {
            $with[$relation] = function (&$query) use ($queryNested, $relation) {
                static::makeNestedBuilder($query, $queryNested[$relation]);
            };
        }
        $builder->with($with);
        return $builder;
    }

    /**
     * Return the Type if is alredy set on the class.
     *
     * @return App\GraphQL\Type
     */
    public static function of($name, $baseName = 'App\GraphQL\Type\\')
    {
        return self::$$name ?: !($type = $baseName.ucfirst($name).'Type') ?: (self::$$name = new $type());
    }

    /**
     * Return the Type if is alredy set on the class.
     *
     * @return App\GraphQL\Type
     */
    public static function __callStatic($name, $arguments)
    {
        if (method_exists(ScalarType::class, $name)) {
            return ScalarType::$$name();
        }
        return static::of($name);
    }

    /**
     * @return FieldDefinition[]
     * @throws InvariantViolation
    public function getFields()
    {
        if (null === $this->fields) {
            $fields = $this->fields() ?: $this->config['fields'] ?? [];
            $this->fields = FieldDefinition::defineFieldMap($this, $fields);
        }
        return $this->fields;
    }
     */
}
