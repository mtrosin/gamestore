<?php

namespace App\GraphQL\Mutations\Game;

use App\Models\Game;
use Rebing\GraphQL\Support\Mutation;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateGameMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createGame',
        'description' => 'Creates a game'
    ];

    public function type(): Type
    {
        return GraphQL::type('Game');
    }

    public function args(): array
    {
        return [
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
        $game = new Game();
        $game->fill($args);
        $game->save();

        return $game;
    }
}