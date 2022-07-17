<?php

namespace App\Http\Controllers;
use Auth;
use Inertia\Inertia;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $banners = Banner::latest()->paginate(10);

        return Inertia::render('Banners/Index', ['banners' => $banners]);
        // return Inertia::render('Banners/index', [
        //     'banners' => Auth::user()->account->banners()
        //         ->orderBy('name')
        //         ->paginate(10)
        //         ->withQueryString()
        //         ->through(fn ($banner) => [
        //             'id' => $banner->id,
        //             'name' => $banner->name,
        //             'user_id' => $organization->user_url,
        //             'target_url' => $banner->target_url,
        //             'img_url' => $banner->img_url,
        //             'cpm' => $banner->cpm,
        //             'views_limit' => $banner->views_limit,
        //             'deleted_at' => $banner->deleted_at,
        //         ]),
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return Inertia::render('Banners/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function store()
    {
        Auth::user()->account->banners()->create(
            Request::validate([
                'name' => ['required', 'max:100'],
                'user_id' => ['required', 'max:100'],
                'target_url' => ['required', 'max:100'],
                'img_url' => ['required', 'max:100'],
                'cpm' => ['nullable', 'max:100'],
                'views_limit' => ['nullable', 'max:10000'],
            ])
        );
    

        return Redirect::route('banners')->with('success', 'Banner created.' );
    }

    /**
     * Display the specified resource.
     *
     * @param  Banner  $post
     * @return JsonResponse
     */
    public function show(Banner $banner)
    {
        return Inertia::render('Banners');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Banner  $banner
     * @return JsonResponse
     */
    public function edit(Banner $banner) {
        return Inertia::render('Banners/Edit',[
            'banner' => [
                'id' => $banner->id,
                'name' => $banner->name,
                'user_id' => $banner->user_id,
                'target_url' => $banner->target_url,
                'img_url' => $banner->img_url,
                'cpm' => $banner->cpm,
                'views_limit' => $banner->views_limit,
                'deleted_at' => $banner->deleted_at,
            ],
        ]);
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Banner  $banner
     * @return JsonResponse
     */
    public function update(Banner $banner)
    {
        $banner->update(
            Request::validate([
                'name' => ['required', 'max:100'],
                'user_id' => ['required', 'max:100'],
                'target_url' => ['required', 'max:100'],
                'img_url' => ['required', 'max:100'],
                'cpm' => ['nullable', 'max:100'],
                'views_limit' => ['nullable', 'max:10000'],
            ])
        );
            return Redirect::back()->with('success', 'Banner updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Banner  $banner
     * @return Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();

        return Redirect::back()->with('success', 'Banner deleted.');
    }
}
