<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Season;
use App\Models\Score;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $season = Season::getSeasonBySeasonDate(date('Y-m-d'));

        return view('review.index', [
            'season' => $season
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $scores = Score::getPartsOrderByTotalScore();
        $seasons = Season::getAllOrderBySeasonName();

        return view('score.index', [
            'scores' => $scores,
            'seasons' => $seasons
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function prepare(Request $request)
    {
        $season = Season::getSeasonBySeasonDate(date('Y-m-d'));
        $speaker_number = (int)($request->speaker_number) + 1;

        return view('review.create', [
            'season' => $season,
            'speaker_number' => $speaker_number,
            'reviewer_name' => $request->reviewer_name
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $season = Season::getSeasonBySeasonDate(date('Y-m-d'));

        if ($season->speaker5_name) {
            $speaker_count = 5;
        } elseif ($season->speaker4_name) {
            $speaker_count = 4;
        } elseif ($season->speaker3_name) {
            $speaker_count = 3;
        } elseif ($season->speaker2_name) {
            $speaker_count = 2;
        } elseif ($season->speaker1_name) {
            $speaker_count = 1;
        }
        if ($request->has('skip_btn')) {
            if ((int)$request->speaker_number < $speaker_count) {
                return view('review.create', [
                    'season' => $season,
                    'speaker_number' => (int)$request->speaker_number + 1,
                    'reviewer_name' => $request->reviewer_name
                ]);
            } else {
                return view('review.finish');
            }

        }
        $speaker_name = $season['speaker'.$request['speaker_number'].'_name'];
        $speaker_class = $season['speaker'.$request['speaker_number'].'_class'];
        $request['speaker_name'] = $speaker_name;
        $request['speaker_class'] = $speaker_class;
        $request['reviewer_name'] = $request->reviewer_name;
        $speaker_number = (int)($request->speaker_number) + 1;

        $request['season_name'] = $season['season_name'];
        $result = Score::create($request->except(['_token', 'speaker_number']));

        if ((int)($request['speaker_number']) < $speaker_count) {
            return view('review.create', [
                'season' => $season,
                'speaker_number' => $speaker_number,
                'reviewer_name' => $request->reviewer_name
            ]);
        } else {
            return view('review.finish');
        }
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
