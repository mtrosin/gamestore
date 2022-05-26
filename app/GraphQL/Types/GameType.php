<?php

namespace App\\GraphQL\\Types;

use App\\Models\\Game;
use GraphQL\\Type\\Definition\\Type;
use Rebing\\GraphQL\\Support\\Facades\\GraphQL;
use Rebing\\GraphQL\\Support\\Type as GraphQLType;

class GameType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Game',
        'description' => 'Collection of games with their respective category',
        'model' => Game::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'ID of game'
            ],
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Title of the game'
            ],
            'description' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Description of game'
            ],
            'category' => [
                'type' => GraphQL::type('Category'),
                'description' => 'The category of the game'
            ]
        ];
    }
}