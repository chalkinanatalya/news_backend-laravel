<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Source\CreateRequest;
use App\Http\Requests\Source\EditRequest;
use App\Models\Source;
use App\QueryBuilders\SourcesQueryBuilder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\JsonResponse;

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
            'sourcesList' => $sourcesQueryBuilder->getSourcesWithPagination(),
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
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {

        $source = Source::create ($request->validated());

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
     * @param EditRequest $request
     * @param  Source $source
     * @return RedirectResponse
     */
    public function update(EditRequest $request, Source $source): RedirectResponse
    {
        $source = $source->fill($request->validated());

        if ($source->save()) {
            return redirect()->route('admin.sources.index')->with('success', 'Source updated');
        }

        return \back()->with('error', 'Source is not updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Source $source
     * @return \Illuminate\Http\Response
     */
    public function destroy(Source $source): JsonResponse
    {
        try{
            $source->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }
}
