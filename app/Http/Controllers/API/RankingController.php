<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\RankingCollection;
use App\Http\Resources\RankingResource;
use App\Models\Ranking;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sneakerId)
    {
        return new RankingCollection(Ranking::where('SneakerId', $sneakerId)->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $sneaker, $ranking)
    {
        // todo(http): sanitize request params.
        $queryParams = [
            ['Platform'],
            ['Date'],
        ];

        foreach ($queryParams as $index => $param) {
            if ($request->query($param) === null) {
                unset($queryParams[$index]);
                continue;
            }
            $queryParams[$index][] = $request->query($param);
        }

        $rankingsQuery = Ranking::where('SneakerId', $sneaker);
        if (count($queryParams) > 0) {
            $rankingsQuery->where(function($query) use ($queryParams) {
                $query->where($queryParams);
            });
        }
        $rankingsQuery->get();

        return new RankingResource($rankingsQuery);
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
