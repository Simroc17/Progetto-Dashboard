<?php

namespace App\Http\Controllers;

use App\Models\Geo;
use App\Models\Gruppo;
use App\Models\Market;
use App\Models\Negozio;
use App\Models\Promo;
use App\Models\Visite;
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
        //dd($promo);  //Promo su cui ho cliccato
        ///////////////////   GRAFICI PARTE CONNESSIONI //////////////////////
        $visits = Visite::where(['id_promo' => $promo->id])
        ->orderBy('data_visita', 'ASC')
        ->get();
        //dd($visit); //Visite
        $arrayTot = [];
        for( $i=0; $i<count($visits); $i++ ){
            $arrayTot[$i] = $visits[$i]->visite_qta;
        }
        //dd($arrayTot);
        $arrayUniq = [];
        for( $i=0; $i<count($visits); $i++ ){
            $arrayUniq[$i] = $visits[$i]->visite_uniche_qta;
        }
        $arrayGiorni = [];
        for( $i=0; $i<count($visits); $i++ ){
            $arrayGiorni[$i] = $visits[$i]->data_visita;
        }
        $arrayDesktop=[];
        for( $i=0; $i<count($visits); $i++ ){
            $arrayDesktop[$i] = $visits[$i]->visite_desktop_qta;
        }
        $arrayMobile=[];
        for( $i=0; $i<count($visits); $i++ ){
            $arrayMobile[$i] = $visits[$i]->visite_mobile_qta;
        }
        $sommaMobile=array_sum($arrayMobile);
       // dd($sommaMobile);
        $sommaDesktop=array_sum($arrayDesktop);
        //dd($sommaDesktop);
        $arrayDesktopUniq=[];
        for( $i=0; $i<count($visits); $i++ ){
            $arrayDesktopUniq[$i] = $visits[$i]->visite_uniche_desktop_qta;
        }
        $arrayMobileUniq=[];
        for( $i=0; $i<count($visits); $i++ ){
            $arrayMobileUniq[$i] = $visits[$i]->visite_uniche_mobile_qta;
        } 
        $sommaUnicaDesktop=array_sum($arrayDesktopUniq);
        $sommaUnicaMobile=array_sum($arrayMobileUniq);
       // dd($sommaUnicaMobile);

        $geos = Geo::where(['id_promo' => $promo->id])->get();
        // $regioni = Geo::where(['id_promo' => $promo->id])
        // ->select('place')
        // ->groupBy('place')
        // ->get();
        //dd($regioni[0]->place);
        $arrayRegioni = [""];
        for( $i=0; $i<count($geos); $i++ ){
                $arrayRegioni[$i] = $geos[$i]->place;
        }
        for ($i=0; $i<$arrayRegioni; $i++ ){

        }
        $arrayTotale = [];
        for( $i=0; $i<count($geos); $i++ ){
            // if($geos[$i]->place=='Abruzzo'){
            $arrayTotale[$i] = $geos[$i]->visite_region_qta;
            // }
        }
        //dd($arrayTotale);
        $arrayUniche = [];
        for( $i=0; $i<count($geos); $i++ ){
            // if($geos[$i]->place=='Abruzzo'){
            $arrayUniche[$i] = $geos[$i]->visite_uniche_region_qta;
            // }
        }
        //dd($arrayUniche);
       ////////////////// FINE CONNESSIONI ///////////////////////

       ////////////////// GRAFICI PAGINE ///////////////////

       ////////////////// FINE PAGINE /////////////////////////
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
       
        return view('/statistics/statistics_chartjs', compact(  'negozi', 'markets','id','arrayPromo','marketsAll','promozioni', 'promo', 'arrayTot','arrayUniq', 'arrayGiorni','sommaDesktop','sommaMobile','sommaUnicaDesktop','sommaUnicaMobile',));
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
                if ($promozione->date_end>($mutable)){
                $result.='`<tr role="row">\
                <td style="width:5%;" class="img'.$promozione->id_canale.' w3-round-xxlarge">  </td>\
                <td style="width:30%;" class="nome"> <a href="statistics/statistics_chartjs/'.$promozione->id.'" style="color: black;" > ' .$promozione->nome. ' </a> <i style="float:right" class="bullet-success"></i> </td>\
                <td style="width:35%;" class="descrizione"> ' .$promozione->descrizione. ' </td>\
                <td style="width:15%;" class="date_start"> ' .$promozione->date_start. ' </td>\
                <td style="width:15%;" class="date_end"> ' .$promozione->date_end. ' </td>\
                </tr>`';
            }
            if ($promozione->date_end=$mutable){
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


     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function mostraDati1(Request $request, )
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
      
        return view('/dashboard/intel_marketing_dashboard', compact('negozi', 'markets','id', 'promozioni','arrayPromo','marketsAll'));
    }


       /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function mostraDati2(Request $request, )
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
      
        return view('/datatables/datatables_buttons', compact('negozi', 'markets','id', 'promozioni','arrayPromo','marketsAll'));
    }

}
