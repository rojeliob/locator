<?php
namespace App\Http\Resources\V1;
use Illuminate\Http\Resources\Json\ResourceCollection;
class CityCollection extends ResourceCollection
{
  public $collects = CityResource::class;
  public function toArray($request)
  {
    return parent::toArray($this->collects);
  }
}
