<?php

namespace App\Http\Controllers;

use App\Models\Gruppo;
use App\Models\Market;
use App\Models\Negozio;
use App\Models\Promo;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function benvenuto($id){
        $mutable = Carbon::now();
        
        $promo = Promo::find($id);
        // dd($promo);  //Promo su cui ho cliccato
        $id = Auth::id();
        //dd($id);
        $negozi = Negozio::all();
        $markets = Market::where(['id_parent' => $id])->get();
        $marketsAll= Market::all();
        //dd($markets);
        $arrayPromo = [];
        //dd($arrayPromo);
        $promozioni = Promo::all();
        foreach ($markets as $market) 
        {
            foreach ($promozioni as $promozione) 
            {
                if ($market->id == $promozione->id_canale) 
                {
                    array_push($arrayPromo, $promozione);
                }
            }
            
        }//dd($arrayPromo);
       
        return view('/statistics/statistics_chartjs', compact('negozi', 'markets','id','arrayPromo','marketsAll','promozioni', 'promo'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function mostraDati(Request $request, )
    {
        $id = Auth::id();
        //dd($id);
        $negozi = Negozio::all();
        $markets = Market::where(['id_parent' => $id])->get();
        $marketsAll= Market::all();
        //dd($markets);
        $arrayPromo = [];
        //dd($arrayPromo);
        $promozioni = Promo::all();
        // dd($promozioni[2]->date_start);
        foreach ($markets as $market) 
        {
            foreach ($promozioni as $promozione) 
            {
                if ($market->id == $promozione->id_canale) 
                {
                    array_push($arrayPromo, $promozione);
                }
            }
            
        }//dd($arrayPromo);
        
        $query=Promo::query();

        if($request->ajax()){
            if(empty($request->category)){
                $promozioni = $query->get();
            }else{
                $promozioni = $query->where(['id_canale' => $request->category])
                ->whereDate('date_start', '<=', $request->dateEnd)
                ->whereDate('date_end', '>=', $request->dateStart)
                ->get(); 
               
            }
            $mutable = Carbon::now();
            $result='';
            foreach ($promozioni as $promozione){
                if ($promozione->date_end>$mutable){
                $result.='`<tr role="row">\
                <td style="width:5%;" class="img'.$promozione->id_canale.' w3-round-xxlarge">  </td>\
                <td style="width:30%;" class="nome"> <a href="statistics/statistics_chartjs/'.$promozione->id.'" style="color: black;" > ' .$promozione->nome. ' </a> <i style="float:right" class="bullet-success"></i> </td>\
                <td style="width:35%;" class="descrizione"> ' .$promozione->descrizione. ' </td>\
                <td style="width:15%;" class="date_start"> ' .$promozione->date_start. ' </td>\
                <td style="width:15%;" class="date_end"> ' .$promozione->date_end. ' </td>\
                </tr>`';
            }else{
                $result.='`<tr role="row">\
                <td style="width:5%;" class="img'.$promozione->id_canale.' w3-round-xxlarge">  </td>\
                <td style="width:30%;" class="nome"> <a href="statistics/statistics_chartjs/'.$promozione->id.'" style="color: black;" > ' .$promozione->nome. ' </a><i style="float:right" class="bullet-danger"></i>  </td>\
                <td style="width:35%;" class="descrizione"> ' .$promozione->descrizione. ' </td>\
                <td style="width:15%;" class="date_start"> ' .$promozione->date_start. ' </td>\
                <td style="width:15%;" class="date_end"> ' .$promozione->date_end. ' </td>\
                </tr>`';
            } 
            }

            return response()->json($result);
        }
        $promozioni = $query->get();
       
        

        

        //dd($markets);
        $arrayNegoziId = [];
        for ($i = 0; $i < count($negozi); $i++) {
            $arrayNegoziId[$i] = $negozi[$i]->id;
        }
        //dd($arrayNegoziId);
        $arrayMarketId = []; //faccio un avar arrayNomi ed un ciclo for im cui arrayNOMI di i e uguale al nome di i
        for ($i = 0; $i < count($markets); $i++) {
            $arrayMarketId[$i] = $markets[$i]->id;
        }  // dd($arrayMarketId);
      
        return view('laravel', compact('negozi', 'markets','id', 'promozioni','arrayPromo','marketsAll'));
    }
}
