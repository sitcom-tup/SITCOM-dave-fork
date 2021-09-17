<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TimeRecordCollection extends ResourceCollection
{
    private $pagination;

    public function __construct($resource)
    {
        $this->pagination = [
            'total' => $resource->total(),
            'count' => $resource->count(),
            'per_page' => (int) $resource->perPage(),
            'current_page' => $resource->currentPage(),
            'total_pages' => $resource->lastPage()
        ];
    
        $resource = $resource->getCollection();
    
        parent::__construct($resource);
    }

    public function toArray($request)
    {
        return [
            'data' => TimeRecordResource::collection($this->collection),
            'meta' => $this->pagination,
        ];
    }
}
