<?php

namespace App\GraphQL\Queries\Game;

use App\Models\Game;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class GamesQuery extends Query
{
    protected $attributes = [
        'name' => 'games',
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('Game'));
    }

    public function resolve($root, $args)
    {
        return Game::all();
    }
}