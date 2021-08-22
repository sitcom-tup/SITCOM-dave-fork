<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class StudentDepartmentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    private $pagination;

    public function __construct($resource)
    {
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
        // dd($this->);
        return [
            'data' => StudentResource::collection($this->collection),
            'meta'=> $this->pagination
        ];
    }
}
