<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Statamic\Facades\Collection;

class RoutesController
{
    public function index(Request $request)
    {
        return [
            'data' => Collection::all()
                ->sort(function($collection) {
                    return $collection->handle() === 'pages' ? 1 : 0;
                })->map(function($collection) {
                    $route = '/'.$collection->routes()->first();
                    $route = str_replace('{parent_uri}/', '', $route);
                    $route = str_replace('{slug}', ':slug', $route);
                    
                    if ($collection->mount()) {
                        $route = str_replace('{mount}', $collection->mount()->slug(), $route);
                    }

                    if ($collection->handle() === 'pages') {
                        $route = "$route*";
                    }

                    return [
                        'name' => $collection->handle(),
                        'route' => $route,
                    ];
                })
                ->toArray()
        ];
    }
}
