<?php

namespace App\Http\Controllers;

use App\Models\RaffleDraw;
use App\Models\RaffleItem;
use Illuminate\Http\Request;

class RaffleController extends Controller
{
    public function __construct() {
        $this->middleware('admin');
    }

    public function index() {
        $availableItems = RaffleItem::whereIsNull('user_id')->orderBy('created_at')->get();
        $raffleDraws = RaffleDraw::orderBy('created_at')->get();
        return view('raffles.index',[
            'availableItems' => $availableItems,
            'raffleDraws' => $raffleDraws
        ]);
    }
}
