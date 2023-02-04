<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Source;
use App\QueryBuilders\SourcesQueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(SourcesQueryBuilder $sourcesQueryBuilder): View
    {
        return \view('admin.sources.index',[
            'sources' => $sourcesQueryBuilder->getSourcesWithPagination(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return \view('admin.sources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
        ]);

        $source = new Source ($request->except('_token', 'source_id'));

        if ($source->save()) {
            return \redirect()->route('admin.sources.index')->with('success', 'Source added successfully');
        }

        return \back()->with('error', 'Source is not saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Source $source
     * @return View
     */
    public function edit(Source $source): View
    {
        return \view('admin.sources.edit',[
            'source'=>  $source,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Source $source
     * @return RedirectResponse
     */
    public function update(Request $request, Source $source): RedirectResponse
    {
        $source = $source->fill($request->except('_token', 'source_ids'));

        if ($source->save()) {
            return redirect()->route('admin.sources.index')->with('success', 'Source updated');
        }

        return \back()->with('error', 'Source is not updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
