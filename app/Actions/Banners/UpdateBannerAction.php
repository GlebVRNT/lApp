<?php

namespace App\Actions\Banners;

use App\DataTransferObjects\Banners\BannerData;
use App\Models\Banner;
use App\Models\User;

class UpdateBannerAction
{
    /**
     * Updates banner data in database.
     *
     * @param  Banner  $banner
     * @param  BannerData  $data
     * @return bool
     */
    public static function execute(Banner $banner, BannerData $data): bool
    {
        return $banner->update([
            'name' => $data->name,
            'target_url' => $data->target_url,
            'img_url' => $data->img_url,
            'cpm' => $data->cpm,
            'views_limit' => $data->views_limit,
        ]);
    }
}
