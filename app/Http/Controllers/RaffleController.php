<?php

namespace App\Http\Controllers;

use App\Models\RaffleDraw;
use App\Models\RaffleItem;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RaffleController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }

    public function index() {
        $availableItems = RaffleItem::whereNull('user_id')->orderBy('created_at')->get();
        $wonItems = RaffleItem::whereNotNull('user_id')->orderBy('drawn_at','ASC')->get();
        return view('raffles.index',[
            'availableItems' => $availableItems,
            'wonItems' => $wonItems
        ]);
    }

    public function addItem(Request $request) {
        $request->validate([
            'name' => 'string|required',
            'sponsor' => 'string|required',
        ]);

        RaffleItem::create($request->all());

        return redirect('/raffle')->with('Info', 'New raffle item added.');
    }

    public function raffleAnItem(RaffleItem $item) {
        return view('raffles.raffle', [
            'item' => $item
        ]);
    }

    public function raffleWinner(Request $request) {
        $request->validate([
            'item_id' => 'numeric|required',
            'user_id' => 'numeric|required',
        ]);

        $raffleItem = RaffleItem::findOrFail($request->item_id);

        $user = User::findOrFail($request->user_id);

        $raffleItem->update(['user_id'=>$user->id, 'drawn_at'=>Carbon::now()]);

        return redirect('/raffle')->with('Info', "$user->name has recently won $raffleItem->name sponsored by $raffleItem->sponsor");
    }
}
