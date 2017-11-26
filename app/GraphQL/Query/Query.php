<?php

namespace App\GraphQL\Query;

use Illuminate\Contracts\Support\Arrayable;
use GraphQL\Type\Definition\ResolveInfo;
use App\GraphQL\Query\Query;use App\GraphQL\Type\Type;

class Query implements Arrayable
{

    /**
     * Dafine if the query can a query many.
     *
     * @var boolean
     */
    public $many = false;
    
    const NESTED_LIMIT = 30,

    METHOD_MULTIPLE = 'get',

    METHOD_SINGLE = 'first';

    /**
     * Arguments to rename before make the Query Builder
     *
     * @var string
     */
    public static $renameArguments = [
        //
    ];

    /**
     * Exculde from make the Query Builder
     *
     * @var string
     */
    public static $exclude = [
        //
    ];

    /**
     * Overwrite the nested fields
     *
     * @var string
     */
    public static $nested = null;
    
    /**
     * Required. Unique name of this object type within Schema.
     *
     * @var string
     */
    public static $name = '';

    /**
     * Plain-text description of this type for clients
     * (e.g. used by GraphiQL for auto-generated documentation).
     *
     * @var string
     */
    public static $description = '';

    /**
     * function ($value, $args, $context, ResolveInfo $info).
     * Given the $value of this type, it is expected to return actual value of the current field.
     * See section on Data Fetching for details
     * (e.g. used by GraphiQL for auto-generated documentation).
     *
     * @var mixed
     */
    public function resolve($value, $args, $context, ResolveInfo $info)
    {
        return null;
    }

    /**
     * An array of possible type arguments.
     * Each entry is expected to be an array with
     * keys: name, type, description, defaultValue.
     * See Field Arguments section below.
     *
     * @var array
     */
    public function arguments()
    {
        return [
            //
        ];
    }

    /**
     * Required. An instance of internal or custom type.
     * Note: type must be represented by a single instance
     * within one schema (see also Type Registry)
     *
     * @return ObjectType
     */
    public function type()
    {
        return null;
    }

    /**
     * Optional. An instance of internal or custom type.
     * When the Query has many Queriable.
     *
     * @return ObjectType
     */
    public function typeMany()
    {
        return Type::nonNull(Type::listOf($this->type()));
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'type' => $this->type(),
            'args' => $this->arguments(),
            'description' => static::$description,
            'resolve' => function () {
                return $this->resolve(...func_get_args());
            }
        ];
    }

    /**
     * Make a nested query builder to load it relationships.
     *
     * @return Builder
     */
    public static function makeQuery($class, array $args, ResolveInfo $info, $method = self::METHOD_SINGLE, $get = true)
    {
        $query = static::applyWhereArguments($class, $args);
        $query = Type::makeNestedBuilder($query, $info->getFieldSelection(static::NESTED_LIMIT), static::$exclude, static::$nested);
        return $get ? $query->{$method}() : $query;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function applyWhereArguments($class, $arguments)
    {
        foreach (static::$renameArguments as $old => $new) {
            if (isset($arguments[$old])) {
                $arguments[$new] = $arguments[$old];
                unset($arguments[$old]);
            }
        }
        $query = $class::query();
        foreach ($arguments as $key => $value) {
            $query->where($key, 'LIKE', $value);
        }
        return $query;
    }
}
