<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;
use Redirect;
use Inertia\Inertia;
use App\Models\Banner;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $banners = Auth::user()->banners()
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString()
            ->through(fn (Banner $banner) => [
                'id' => $banner->id,
                'name' => $banner->name,
                'user_id' => $banner->user_id,
                'target_url' => $banner->target_url,
                'img_url' => $banner->img_url,
                'cpm' => $banner->cpm,
                'views_limit' => $banner->views_limit,
            ]);


        return Inertia::render('Banners/Index', ['banners' => $banners]);
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
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'target_url' => ['required', 'string', 'url', 'max:255'],
            'img_url' => ['required', 'string', 'url', 'max:255'],
            'cpm' => ['required', 'numeric', 'gt:0'],
            'views_limit' => ['required', 'numeric', 'gt:0'],
        ]);

        Auth::user()->banners()->create($data);

        return Redirect::route('banners.index')->with('success', 'Banner created.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Banner  $banner
     * @return Response
     */
    public function edit(Banner $banner)
    {
        if (!$banner->user()->is(Auth::user())) {
            abort(SymfonyResponse::HTTP_FORBIDDEN);
        }

        return Inertia::render('Banners/Edit', [
            'banner' => [
                'id' => $banner->id,
                'name' => $banner->name,
                'user_id' => $banner->user_id,
                'target_url' => $banner->target_url,
                'img_url' => $banner->img_url,
                'cpm' => $banner->cpm,
                'views_limit' => $banner->views_limit,
            ],
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Banner  $banner
     * @return RedirectResponse
     */
    public function update(Request $request, Banner $banner)
    {
        if (!$banner->user()->is(auth()->user())) {
            abort(SymfonyResponse::HTTP_FORBIDDEN);
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'target_url' => ['required', 'string', 'url', 'max:255'],
            'img_url' => ['required', 'string', 'url', 'max:255'],
            'cpm' => ['required', 'numeric', 'gt:0'],
            'views_limit' => ['required', 'numeric', 'gt:0'],
        ]);

        $banner->update($data);

        return Redirect::route('banners.index')->with('success', 'Banner updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Banner  $banner
     * @return RedirectResponse
     */
    public function destroy(Banner $banner)
    {
        if (!$banner->user()->is(Auth::user())) {
            abort(SymfonyResponse::HTTP_FORBIDDEN);
        }

        $banner->delete();

        return Redirect::route('banners.index')->with('success', 'Banner deleted.');
    }
}
