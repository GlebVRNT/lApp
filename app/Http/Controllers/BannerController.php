<?php

namespace App\Http\Controllers;

use App\Actions\Banners\CreateBannerAction;
use App\Actions\Banners\UpdateBannerAction;
use App\Http\Requests\Banners\StoreBannerRequest;
use App\Http\Requests\Banners\UpdateBannerRequest;
use App\Http\Resources\Banners\EditBannerResource;
use App\Http\Resources\Banners\IndexBannerResource;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Response;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $banners = Banner::query()
            ->whereBelongsTo($request->user())
            ->filterByName($request->only(['search']))
            ->paginate()
            ->withQueryString();

        return inertia('Banners/Index', [
            'banners' => IndexBannerResource::collection($banners),
            'filters' => [
                'search' => $request->input('search')
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return inertia('Banners/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreBannerRequest  $request
     * @return RedirectResponse
     */
    public function store(StoreBannerRequest $request): RedirectResponse
    {
        CreateBannerAction::execute(
            user: $request->user(),
            data: $request->dataTransferObject(),
        );

        return redirect()
            ->route('banners.index')
            ->with('success', 'Banner created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Banner  $banner
     * @return Response
     */
    public function edit(Banner $banner): Response
    {
        return inertia('Banners/Edit', [
            'banner' => new EditBannerResource($banner),
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateBannerRequest  $request
     * @param  Banner  $banner
     * @return RedirectResponse
     */
    public function update(UpdateBannerRequest $request, Banner $banner): RedirectResponse
    {
        UpdateBannerAction::execute(
            banner: $banner,
            data: $request->dataTransferObject(),
        );

        return redirect()
            ->route('banners.index')
            ->with('success', 'Banner updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Banner  $banner
     * @return RedirectResponse
     */
    public function destroy(Banner $banner): RedirectResponse
    {
        $banner->delete();

        return redirect()
            ->route('banners.index')
            ->with('success', 'Banner deleted.');
    }
}
