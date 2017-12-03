<?php

namespace App\GraphQL\Type;

use App\GraphQL\Type\Type;

class ArtistType extends Type
{
    /**
     * Required. Unique name of this object type within Schema.
     *
     * @var string
     */
    public $name = 'Artist';

    /**
     * Plain-text description of this type for clients
     * (e.g. used by GraphiQL for auto-generated documentation).
     *
     * @var string
     */
    public $description = 'A cokuzza Artist';

    /**
     * Required. An array describing object fields or
     * callable returning such an array.
     *
     * @return array
     */
    public function fields() : array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'The id of the Artist'
            ],
            'user_id' => [
                'type' => Type::int(),
                'description' => 'The id of the Artist'
            ],
            'user' => [
                'type' => Type::user(),
                'description' => 'The id of the Artist'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of Artist'
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'The name of Artist'
            ],
            'real_name' => [
                'type' => Type::string(),
                'description' => 'The name of Artist'
            ],
            'record_label' => [
                'type' => Type::string(),
                'description' => 'The name of Artist'
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'The name of Artist'
            ],
            'soundcloud_embed' => [
                'type' => Type::string(),
                'description' => 'The name of Artist'
            ],
            'country' => [
                'type' => Type::string(),
                'description' => 'The name of Artist'
            ],
            'avatar' => [
                'type' => Type::string(),
                'description' => 'The name of Artist'
            ],
            'background_image' => [
                'type' => Type::string(),
                'description' => 'The name of Artist'
            ],
        ];
    }
}
