<?php

namespace App\Http\Controllers;

use App\Girl;
use App\Location;
use Illuminate\Http\Request;

use App\Http\Requests;

class SearchGirlsController extends Controller
{
    public function searchGirls(Request $request)
    {
    	$lat=$request->lat;
    	$lng=$request->lng;
    	$girls=Girl::whereBetween('lat',[$lat-0.1,$lat+0.1])->whereBetween('lng',[$lng-0.1,$lng+0.1])->get();
    	return $girls;
    }

    public function searchCity(Request $request)
    {
        //$locationVal=$request->locationVal;
        //$matchedCities=Location::where('city','like',"%$locationVal%")->pluck('city','city');
        //return response()->json(['items'=>$matchedCities]);

        $disval=$request->disval;
        $matchedCities=Location::where('distrit',$disval)->lists('city', 'city');
         return view('ajxresult',compact('matchedCities'));
    }

    public function locationCoords(Request $request)
    {
        $val=$request->val;
        $col=Location::where('city',$val)->first();

        $lat=$col->lat;
        $lng=$col->lng;


        return [$lat,$lng];
    }
}
