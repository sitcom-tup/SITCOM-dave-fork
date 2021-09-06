<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class InternCollection extends ResourceCollection
{
    private $pagination;

    public function __construct($resource)
    {
        $this->pagination = [
            'total' => $resource->total(),
            'count' => $resource->count(),
            'per_page' => (int) $resource->perPage(),
            'current_page' => $resource->currentPage(),
            'total_pages' => $resource->lastPage(),
            'links' => [
                'next_page'=> $resource->nextPageUrl(),
                'previous_page'=> $resource->previousPageUrl(),
            ]
        ];
    
        $resource = $resource->getCollection();
    
        parent::__construct($resource);
    }

    public function toArray($request)
    {
        return [
            'data' => InternResource::collection($this->collection),
            'meta' => $this->pagination,
        ];
    }
}
