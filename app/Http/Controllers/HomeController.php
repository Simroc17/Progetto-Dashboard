<?php

namespace App\Http\Controllers;

use App\Models\Gruppo;
use App\Models\Market;
use App\Models\Negozio;
use App\Models\Promo;
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
    public function benvenuto(){
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
        return view('/dashboard/intel_marketing_dashboard', compact('negozi', 'markets','id', 'promozioni','arrayPromo','marketsAll'));
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
                $promozioni = $query->where(['id_canale'=>$request->category])->get();
            }
            
            return response()->json(['promozioni'=>$promozioni]);
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
