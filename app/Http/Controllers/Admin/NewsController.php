<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $model = new News();
        $newsList = $model->getNews();
        $join = DB::table('news')
            ->join('category_has_news as chn', 'news.id', '=', 'chn.news_id')
            ->leftJoin('categories', 'chn.category_id', '=', 'categories.id')
            ->leftjoin('sources', 'news.source_id', '=', 'sources.id')
            ->select("news.*", 'chn.category_id', 'categories.title as ctitle', 'sources.title as stitle')
            ->get();

        $where = DB::table('news')->where([
            ['title', 'like', '%ti%'],
            ['id', '>', 3],
        ])->orWhere('status', '=', 'active')->toSql();

        $where_new = DB::table('news')->whereNotIn('id', [3,6])->get();

        // dd($join, $where, $where_new);
        return \view('admin.news.index', [
            'newsList' => $join,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return \view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        return response()->json($request->only(['title', 'author', 'description']));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
