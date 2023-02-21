<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\JobNewsParsing;
use App\QueryBuilders\SourcesQueryBuilder;
use Illuminate\Http\Request;
use App\Services\Contracts\Parser;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \Illuminate\Http\Response
     * @param SourcesQueryBuilder $sourcesQueryBuilder
     */
    public function __invoke(Request $request, Parser $parser, SourcesQueryBuilder $sourcesQueryBuilder): string
    {
        $urls = $sourcesQueryBuilder->getAll();

        foreach($urls as $url) {
            \dispatch(new JobNewsParsing($url['url']));
        }
        return 'Parsing completed';
    }
}
