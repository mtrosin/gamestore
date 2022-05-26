<?php

namespace App\GraphQL\Types;

use App\Models\Category;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CategoryType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Category',
        'description' => 'Collection of categories',
        'model' => Category::class
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
            'games' => [
                'type' => Type::listOf(GraphQL::type('Game')),
                'description' => 'List of games'
            ]
        ];
    }
}