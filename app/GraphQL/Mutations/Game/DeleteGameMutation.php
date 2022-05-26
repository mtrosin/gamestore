<?php

namespace App\\GraphQL\\Mutations\\Game;

use App\\Models\\Game;
use GraphQL\\Type\\Definition\\Type;
use Rebing\\GraphQL\\Support\\Mutation;

class DeleteGameMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteGame',
        'description' => 'Deletes a game'
    ];

    public function type(): Type
    {
        return Type::boolean();
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::nonNull(Type::int()),
                'rules' => ['exists:games']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        $game = Game::findOrFail($args['id']);

        return  $game->delete() ? true : false;
    }
}