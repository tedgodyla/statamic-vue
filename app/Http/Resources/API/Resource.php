<?php

namespace App\Http\Resources\API;

use Statamic\Http\Resources\API\Resource as BaseResource;

class Resource extends BaseResource
{
    /**
     * Mappable resources.
     *
     * @var array
     */
    const STATAMIC_RESOURCES = [
        CollectionResource::class,
    ];
}
