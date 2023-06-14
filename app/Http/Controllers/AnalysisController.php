<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Order;
use App\Models\Scopes\Subtotal;
use Illuminate\Support\Facades\DB;

class AnalysisController extends Controller
{
    public function index()
    {
        $startDate = "2022-08-01";
        $endDate = "2022-08-31";

        // $period = Order::betweenDate($startDate, $endDate)
        // ->groupBy("id")
        // ->selectRaw("id,
        //              sum(subtotal) as total,
        //              customer_name,
        //              status,
        //              created_at")
        // ->orderBy("created_at", "asc")
        // ->paginate(50);

        // $subQuery= Order::betweenDate($startDate, $endDate)
        // ->where("status", true)
        // ->groupBy("id")
        // ->selectRaw("id,
        //              sum(subtotal) as totalPerPurchase,
        //              DATE_FORMAT(created_at, '%Y%m%d') as date");

        // $data = DB::table($subQuery)
        // ->groupBy("date")
        // ->selectRaw("date, sum(totalPerPurchase) as total")
        // ->get();

        // 1. 購買ID毎にまとめる
        $subQuery = Order::betweenDate($startDate, $endDate)
                    ->groupBy('id')
                    ->selectRaw('id, customer_id, customer_name, SUM(subtotal) as
        totalPerPurchase');
        // 2. 会員毎にまとめて購入金額順にソートする
        $subQuery = DB::table($subQuery)
                    ->groupBy('customer_id')
                    ->selectRaw('customer_id, customer_name, sum(totalPerPurchase)
                    as total')
                    ->orderBy('total', 'desc');

        
        return Inertia::render("Analysis");
    }
}
