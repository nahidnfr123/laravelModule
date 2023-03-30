<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Affiliate\Entities\Affiliate;
use Modules\Affiliate\Entities\DownLine;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        set_time_limit(0);

//        $downLines = DownLine::with('referred'. 'referred')->get();
//        $downLines = Affiliate::whereNull('parent_id')->with('children', 'children.children')->get();

        // Package Link: https://github.com/staudenmeir/laravel-adjacency-list
        $affiliates = Affiliate::tree()->get()->toTree();
//        $affiliates = Affiliate::tree()->breadthFirst()->get();

        return response()->json($affiliates);
//        $affiliates = Affiliate::whereNull('parent_id')->with('children', 'children.children')->get();
//        $allAffiliates = Affiliate::pluck('name', 'id')->all();
        return view('admin::index', compact('affiliates'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
