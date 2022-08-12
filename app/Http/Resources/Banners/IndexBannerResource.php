<?php

namespace App\Http\Resources\Banners;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class IndexBannerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request): array|JsonSerializable|Arrayable
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'user_id' => $this->user_id,
            'target_url' => $this->target_url,
            'img_url' => $this->img_url,
            'cpm' => $this->cpm,
            'views_limit' => $this->views_limit,
        ];
    }
}
