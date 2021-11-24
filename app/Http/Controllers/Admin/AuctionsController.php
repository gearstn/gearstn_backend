<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AuctionsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuctionResource;
use App\Models\Auction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuctionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param AuctionsDataTable $auctionDataTable
     * @return Application|Factory|View
     */
    public function index(AuctionsDataTable $auctionDataTable)
    {
        return $auctionDataTable->render('admin.components.auction.datatable');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $auction = new Auction();
        return view('admin.components.auction.create', compact('auction'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        $validator = Validator::make($inputs, Auction::$cast);
        if ($validator->fails()) {
            return redirect()->route('auctions.create')->withErrors($validator)->withInput();
        }
        $auction = Auction::create($inputs);
        return redirect()->route('auctions.index')->with(['success' => 'Auction ' . __("messages.add")]);

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
        $auction = new AuctionResource($auction);
        return view('admin.components.auction.show', compact('auction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $auction = Auction::findOrFail($id);
        return view('admin.components.auction.edit', compact('auction'));
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
        $inputs = $request->all();
        $auction = Auction::find($id);
        $auction->update($inputs);
        return redirect()->route('auctions.index')->with(['success' => 'Auction ' . __("messages.update")]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $auction = Auction::findOrFail($id);
        $auction->delete();
        return redirect()->back()->with(['success' => 'Auction ' . __("messages.delete")]);
    }
}
