<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'             => $this->id,
            'name'           => $this->name,
            'email'          => $this->email,
            'thumbnail_logo' => $this->image ? asset('storage/company/thumbnail/' . $this->logo) : null,
            'medium_logo'    => $this->image ? asset('storage/company/medium/' . $this->logo) : null,
            'website'        => $this->website ?? null,
        ];
    }
}
