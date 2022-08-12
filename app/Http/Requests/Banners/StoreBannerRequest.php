<?php

namespace App\Http\Requests\Banners;

use App\DataTransferObjects\Banners\BannerData;
use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'target_url' => ['required', 'string', 'url', 'max:255'],
            'img_url' => ['required', 'string', 'url', 'max:255'],
            'cpm' => ['required', 'numeric', 'gt:0'],
            'views_limit' => ['required', 'numeric', 'gt:0'],
        ];
    }

    /**
     * Get the Data Transfer Object that apply to request.
     *
     * @return BannerData
     */
    public function dataTransferObject(): BannerData
    {
        $validated = $this->safe();

        return new BannerData(
            name: $validated['name'],
            target_url: $validated['target_url'],
            img_url: $validated['img_url'],
            cpm: $validated['cpm'],
            views_limit: $validated['views_limit'],
        );
    }
}
