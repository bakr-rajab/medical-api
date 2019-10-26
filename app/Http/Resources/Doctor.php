<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Department as DepartmentResource;
class Doctor extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
          'doctor'=>$this->full_name,
          'departments'=>DepartmentResource::collection($this->whenLoaded('departments')),
        ];
    }
}
