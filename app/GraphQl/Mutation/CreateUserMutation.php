<?php

namespace App\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use App\User;

class CreateUserMutation extends Mutation {

  protected $attributes = [
    'name' => 'CreateUserMutation'
  ];

  public function type()
  {
    return GraphQL::type('User');
  }

  public function args()
  {
    return [
      'email' => [
        'name' => 'email',
        'type' => Type::string()
      ],
      'name' => [
        'name' => 'name',
        'type' => Type::string()
      ],
      'password' => [
        'name' => 'password',
        'type' => Type::string()
      ]
    ];
  }

  public function rules()
  {
    return [
      'email' => [
        'required',
        'max:255',
        'email'
      ],
      'password' => [
        'string',
        'max:255',
        'required'
      ]
    ];
  }

  public function resolve($root, $args)
  {
    return User::create(array_merge($args,
      ['password' => bcrypt($args['password'])]
    ));
  }
}