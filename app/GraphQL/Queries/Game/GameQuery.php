<?php

namespace App\GraphQL\Queries\Game;

use App\Models\Game;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class GameQuery extends Query
{
    protected $attributes = [
        'name' => 'game',
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
                'type' => Type::int(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        return Game::findOrFail($args['id']);
    }
}