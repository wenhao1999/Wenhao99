<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function showChart()
    {
        $population = BarCharts::select(
                        DB::raw("year(created_at) as year"),
                        DB::raw("SUM(month) as month"),
                        DB::raw("SUM(kWh) as kWh"),
                        DB::raw("SUM(totalamount) as totalamount"))
                    ->orderBy(DB::raw("YEAR(created_at)"))
                    ->groupBy(DB::raw("YEAR(created_at)"))
                    ->get();
  
        $res[] = ['Year', 'month', 'kWh', 'totalamount'];
        foreach ($population as $key => $val) {
            $res[++$key] = [$val->year, (string)$val->month, (int)$val->kWh, (int)$val->totalamount];
        }
  
        return view('line-chart')
            ->with('population', json_encode($res));
    }
}
