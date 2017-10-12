<?php

namespace App\GraphQL\Query;

use GraphQL\Type\Definition\Type;
use App\User;
use GraphQL;

class UserQuery extends UsersQuery {

  protected $attributes = [
    'name' => 'user'
  ];

  public function type()
  {
    return GraphQL::type('User');
  }

  public function resolve($root, $args)
  {
    return $this->getUsers($args, 'first', $operator = 'LIKE', $modifier = '%');
  }
}
