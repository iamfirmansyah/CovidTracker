<?php

namespace App\Http\Controllers;

use App\Charts\CovidChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CovidController extends Controller
{
    public function chart(){
    	$suspects = collect(Http::get('https://api.kawalcorona.com/indonesia/provinsi')->json());
		$suspectsData = $suspects->flatten(1);

		$labels = $suspectsData->pluck('Provinsi');
		$data = $suspectsData->pluck('Kasus_Pos');
		$colors = $labels->map(function($item) {
			return '#' .substr(md5(mt_rand()), 0, 6);
		});

		$chart = new CovidChart;    
		$chart->labels($labels);
		$chart->dataset('Data Kasus Positif Indonesia' , 'pie', $data)->backgroundColor($colors);

		return view('corona' , [
			'chart'=> $chart, 
		]);
    }
    //dd($suspects->flatten(1));//
}
