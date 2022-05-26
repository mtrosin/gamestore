<?php

declare(strict_types = 1);

return [
    'route' => [
        'prefix' => 'graphql',
        'controller' => \Rebing\GraphQL\GraphQLController::class . '@query',
        'middleware' => [],
        'group_attributes' => [],
    ],
    'default_schema' => 'default',
    'batching' => [
        'enable' => true,
    ],
    'schemas' => [
        'default' => [
            'query' => [
                'game' => \App\GraphQL\Queries\Game\GameQuery::class,
                'games' => \App\GraphQL\Queries\Game\GamesQuery::class,
                'category' => \App\GraphQL\Queries\Category\CategoryQuery::class,
                'categories' => \App\GraphQL\Queries\Category\CategoriesQuery::class,
            ],
            'mutation' => [
                'createGame' => \App\GraphQL\Mutations\Game\CreateGameMutation::class,
                'updateGame' => \App\GraphQL\Mutations\Game\UpdateGameMutation::class,
                'deleteGame' => \App\GraphQL\Mutations\Game\DeleteGameMutation::class,
                'createCategory' => \App\GraphQL\Mutations\Category\CreateCategoryMutation::class,
                'updateCategory' => \App\GraphQL\Mutations\Category\UpdateCategoryMutation::class,
                'deleteCategory' => \App\GraphQL\Mutations\Category\DeleteCategoryMutation::class,
            ],
            'middleware' => [],
            'method' => ['get', 'post'],
        ],
    ],
    'types' => [
        'Game' => \App\GraphQL\Types\GameType::class,
        'Category' => \App\GraphQL\Types\CategoryType::class
    ],
    'lazyload_types' => true,
    'error_formatter' => [\Rebing\GraphQL\GraphQL::class, 'formatError'],
    'errors_handler' => [\Rebing\GraphQL\GraphQL::class, 'handleErrors'],
    'security' => [
        'query_max_complexity' => null,
        'query_max_depth' => null,
        'disable_introspection' => false,
    ],
    'pagination_type' => \Rebing\GraphQL\Support\PaginationType::class,
    'simple_pagination_type' => \Rebing\GraphQL\Support\SimplePaginationType::class,
    'graphiql' => [
        'prefix' => 'graphiql', // Do NOT use a leading slash
        'controller' => \Rebing\GraphQL\GraphQLController::class . '@graphiql',
        'middleware' => [],
        'view' => 'graphql::graphiql',
        'display' => env('ENABLE_GRAPHIQL', true),
    ],
    'defaultFieldResolver' => null,
    'headers' => [],
    'json_encoding_options' => 0,
    'apq' => [
        'enable' => env('GRAPHQL_APQ_ENABLE', false),
        'cache_driver' => env('GRAPHQL_APQ_CACHE_DRIVER', config('cache.default')),
        'cache_prefix' => config('cache.prefix') . ':graphql.apq',
        'cache_ttl' => 300,
    ],
    'execution_middleware' => [
        \Rebing\GraphQL\Support\ExecutionMiddleware\ValidateOperationParamsMiddleware::class,
        \Rebing\GraphQL\Support\ExecutionMiddleware\AutomaticPersistedQueriesMiddleware::class,
        \Rebing\GraphQL\Support\ExecutionMiddleware\AddAuthUserContextValueMiddleware::class,
    ],
];
