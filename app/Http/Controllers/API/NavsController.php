<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Statamic\Contracts\Structures\Structure as StructureContract;
use Statamic\Facades\Nav;
use Statamic\Facades\Site;
use Statamic\Facades\URL;
use Statamic\Structures\TreeBuilder;

class NavsController
{
    public function index(Request $request)
    {
        return [
            'data' => Nav::all()
                ->map(function($nav) {
                    return [
                        $nav->handle() => $this->structure($nav->handle())
                    ];
                })
                ->toArray()
        ];
    }

    public function show($nav, Request $request)
    {
        return [
            'data' => $this->structure($nav)
        ];
    }

    protected function structure($handle)
    {
        $tree = (new TreeBuilder)->build([
            'structure' => $handle,
            'site' => Site::current()->handle(),
        ]);

        return $this->toArray($tree);
    }

    public function toArray($tree, $parent = null, $depth = 1)
    {
        return collect($tree)->map(function ($item) use ($parent, $depth) {
            $page = $item['page'];

            if ($page->reference() && ! $page->referenceExists()) {
                return null;
            }

            if ($page->entry() && ! $page->entry()->published()) {
                return null;
            }

            $data = $page->toAugmentedArray();
            $children = empty($item['children']) ? [] : $this->toArray($item['children'], $data, $depth + 1);

            return array_merge($data, [
                'children'    => $children,
                'parent'      => $parent,
                'depth'       => $depth,
                'is_current'  => rtrim(URL::getCurrent(), '/') == rtrim($page->url(), '/'),
                'is_parent'   => Site::current()->url() === $page->url() ? false : URL::isAncestorOf(URL::getCurrent(), $page->url()),
                'is_external' => URL::isExternal($page->absoluteUrl()),
            ]);
        })->filter()->values()->all();
    }
}
