<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use App\Http\Resources\AuctionResource;
use App\Models\Auction;


class AuctionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auctions = Auction::paginate(number_in_page());
        return AuctionResource::collection($auctions)->additional(['status' => 200, 'message' => 'Auctions fetched successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $auction = Auction::findOrFail($id);
        return response()->json(new AuctionResource($auction), 200);
    }
}
