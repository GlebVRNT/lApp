<?php

namespace App\DataTransferObjects\Banners;

class BannerData
{
    /**
     * @param  string  $name
     * @param  string  $target_url
     * @param  string  $img_url
     * @param  float  $cpm
     * @param  int  $views_limit
     */
    public function __construct(
        public readonly string $name,
        public readonly string $target_url,
        public readonly string $img_url,
        public readonly float $cpm,
        public readonly int $views_limit,
    ) {}
}
