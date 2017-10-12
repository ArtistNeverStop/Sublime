<?php

namespace App\GraphQL\Query;

use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\Type;
use App\User;
use GraphQL;

class UsersQuery extends Query {

  protected $attributes = [
    'name' => 'users'
  ];

  public function type()
  {
    return Type::listOf(GraphQL::type('User'));
  }

  public function args()
  {
    return [
      'id' => [
        'name' => 'id',
        'type' => Type::int()
      ],
      'email' => [
        'name' => 'email',
        'type' => Type::string()
      ],
      'name' => [
        'name' => 'name',
        'type' => Type::string()
      ]
    ];
  }

  public function resolve($root, $args)
  {
    return $this->getUsers($args);
  }

  public function getUsers($args, $method = 'get', $operator = '=', $modifier = '') {
    $key = key($args);
    $users = User::query();
    if ($key) {
      $users->where($key, $operator, $modifier . $args[$key] . $modifier);
    }
    return $users->{$method}();
  }
}
