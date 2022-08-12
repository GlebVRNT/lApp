<?php

namespace App\Actions\Banners;

use App\DataTransferObjects\Banners\BannerData;
use App\Models\Banner;
use App\Models\User;

class CreateBannerAction
{
    /**
     * Creates new banner in database.
     *
     * @param  User  $user
     * @param  BannerData  $data
     * @return Banner
     */
    public static function execute(User $user, BannerData $data): Banner
    {
        return $user->banners()->create([
            'name' => $data->name,
            'target_url' => $data->target_url,
            'img_url' => $data->img_url,
            'cpm' => $data->cpm,
            'views_limit' => $data->views_limit,
        ]);
    }
}
