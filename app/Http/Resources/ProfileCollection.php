<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProfileCollection extends ResourceCollection
{
   
    protected $tableResource;
    private $pagination;

    public function __construct($tableResource,$resource)
    {
        $this->tableResource = $tableResource;
        $this->resource = $resource;
        $this->pagination = [
            'total' => $resource->total(),
            'count' => $resource->count(),
            'per_page' => $resource->perPage(),
            'current_page' => $resource->currentPage(),
            'total_pages' => $resource->lastPage()
        ];
    
        $resource = $resource->getCollection();
    
        parent::__construct($resource);
    }


    public function toArray($request)
    {
        return [
            'data' => $this->tableResource,
            'meta' => $this->pagination
        ];
    }
}
