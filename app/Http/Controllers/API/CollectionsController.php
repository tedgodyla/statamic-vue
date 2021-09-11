<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Statamic\Facades\Collection;
use Statamic\Http\Controllers\API\ApiController;
use App\Http\Resources\API\CollectionResource;

class CollectionsController extends ApiController
{
    public function index(Request $request)
    {
        return app(CollectionResource::class)::collection(
            Collection::all()
        );
    }

    public function show($collection)
    {
        return app(CollectionResource::class)::make($collection);
    }
}
