<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Statamic\Facades\Entry;

class CollectionEntriesController
{
    public function show($collection, $handle, Request $request)
    {
        return [
            'data' => Entry::findBySlug($handle, $collection)
                ->toAugmentedCollection()
                ->withShallowNesting()
                ->toArray()
        ];
    }
}
