<?php

namespace App\GraphQL\Mutations\Game;

use App\Models\Game;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

class UpdateGameMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateGame',
        'description' => 'Updates a game'
    ];

    public function type(): Type
    {
        return GraphQL::type('Game');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' =>  Type::nonNull(Type::int()),
            ],
            'title' => [
                'name' => 'title',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'description' => [
                'name' => 'description',
                'type' =>  Type::nonNull(Type::string()),
            ],
            'category_id' => [
                'name' => 'category_id',
                'type' => Type::nonNull(Type::int()),
                'rules' => ['exists:categories,id']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $game = Game::findOrFail($args['id']);
        $game->fill($args);
        $game->save();

        return $game;
    }
}