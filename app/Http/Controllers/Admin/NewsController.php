<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\NewsStatus;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\SourcesQueryBuilder;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param NewsQueryBuilder $newsQueryBuilder
     * @return \Illuminate\Http\Response
     */
    public function index(NewsQueryBuilder $newsQueryBuilder): View
    {
        return \view('admin.news.index', [
            'newsList' => $newsQueryBuilder->getNewsWithPagination(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoriesQueryBuilder $categoriesQueryBuilder, SourcesQueryBuilder $sourcesQueryBuilder): View
    {
        return \view('admin.news.create', [
            'categories' => $categoriesQueryBuilder->getAll(),
            'sources' => $sourcesQueryBuilder->getAll(),
            'statuses' => NewsStatus::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
        ]);

        $news = new News($request->except('_token', 'category_id'));

        if ($news->save()) {
            $news->categories()->sync((array) $request->input('category_ids'));
            return \redirect()->route('admin.news.index')->with('success', 'New added successfully');
        }

        return \back()->with('error', 'News is not saved');
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
     * @param News $news
     * @param CategoriesQueryBuilder $categoriesQueryBuilder
     * @return View
     */
    public function edit(News $news, CategoriesQueryBuilder $categoriesQueryBuilder, SourcesQueryBuilder $sourcesQueryBuilder)
    {
        return \view('admin.news.edit', [
            'news' => $news,
            'categories' => $categoriesQueryBuilder->getAll(),
            'sources' => $sourcesQueryBuilder->getAll(),
            'statuses' => NewsStatus::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update (Request $request, News $news): RedirectResponse
    {
        $news = $news->fill(array('source_id' => $request->all()['source_id']));
        if ($news->save()) {
            $news->categories()->sync((array) $request->input('category_ids'));
            $news->sources()->sync((array) $request->input('source_id'));
            return \redirect()->route('admin.news.index')->with('success', 'News updated successfully');
        }

        return \back()->with('error', 'News is not saved');
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
