<?php

namespace App\Http\Controllers;

use App\Models\Geo;
use App\Models\Gruppo;
use App\Models\Interattivi;
use App\Models\Market;
use App\Models\Negozio;
use App\Models\Pagina;
use App\Models\PaginaQta;
use App\Models\Prodotto;
use App\Models\Promo;
use App\Models\Visite;
use App\Models\Volantino;
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
        
        
        $promo = Promo::find($id);
          //Promo su cui ho cliccato
        $riepilogoConnessioni = Visite::groupBy('id_market')
            ->where(['id_promo' => $promo->id])
            ->where(['id_parent' => $promo->id_canale])
            ->select(DB::raw("SUM(visite_desktop_qta) AS desktop, SUM(visite_mobile_qta) AS mobile, SUM(visite_uniche_desktop_qta) AS deskUni, SUM(visite_uniche_mobile_qta) AS mobUni"), 'id_market')
            ->get();
            // dd($riepilogo);
        $riepilogoVisualizzazioni = Pagina::groupBy('id_market')
            ->where(['id_promo' => $promo->id])
            ->where(['id_parent' => $promo->id_canale])
            ->select(DB::raw("SUM(pagina_desktop_qta) + SUM(pagina_mobile_qta) AS totali, SUM(pagina_desktop_unica_qta) + SUM(pagina_mobile_unica_qta) AS uniche "), 'id_market')
            ->get();
            //dd($riepilogoVisualizzazioni);
        $riepilogoInterattivi= Interattivi::groupBy('id_market', 'tipo')
            ->where(['id_promo' => $promo->id])
            ->where(['id_parent' => $promo->id_canale])
            ->select(DB::raw("SUM(qta) AS totali"), 'id_market', 'tipo')
            ->get();
            //dd($riepilogoInterattivi);
        ///////////////////   GRAFICI PARTE CONNESSIONI //////////////////////
        $visits = Visite::where(['id_promo' => $promo->id])
        ->orderBy('data_visita', 'ASC')
        ->get();
        //dd($visit); //Visite
        $arrayTot = [];
        $arrayUniq = [];
        $arrayGiorni = [];
        $arrayDesktop=[];
        $arrayMobile=[];
        $arrayDesktopUniq=[];
        $arrayMobileUniq=[];
        for( $i=0; $i<count($visits); $i++ ){
            $arrayTot[$i] = $visits[$i]->visite_qta;
            $arrayUniq[$i] = $visits[$i]->visite_uniche_qta;
            $arrayGiorni[$i] = $visits[$i]->data_visita;
            $arrayDesktop[$i] = $visits[$i]->visite_desktop_qta;
            $arrayMobile[$i] = $visits[$i]->visite_mobile_qta;
            $arrayDesktopUniq[$i] = $visits[$i]->visite_uniche_desktop_qta;
            $arrayMobileUniq[$i] = $visits[$i]->visite_uniche_mobile_qta;
        }
        //dd($arrayTot);
        $sommaMobile=array_sum($arrayMobile);
       // dd($sommaMobile);
        $sommaDesktop=array_sum($arrayDesktop);
        //dd($sommaDesktop);
        $sommaUnicaDesktop=array_sum($arrayDesktopUniq);
        $sommaUnicaMobile=array_sum($arrayMobileUniq);
       // dd($sommaUnicaMobile);
        $datiGrafico = Geo::groupBy('place')
        ->where(['id_promo' => $promo->id])
        ->select(DB::raw("SUM(visite_region_qta) AS somma, SUM(visite_uniche_region_qta) AS uniche"), 'place')
        ->orderBy('somma', 'DESC')
        ->get();
        //dd($datiGrafico);
        $arrUniche=[];
        $arrTotali=[];
        $arrRegioni=[];
        for ($i = 0; $i < count($datiGrafico); $i++ ){
            $arrUniche[$i]= $datiGrafico[$i]->uniche;
            $arrTotali[$i]= $datiGrafico[$i]->somma;
            $arrRegioni[$i]= $datiGrafico[$i]->place;
        }
        ////////////////// FINE CONNESSIONI ///////////////////////
        $volantino=Volantino::where(['id_promo' => $promo->id])
        ->count();
        
        

       ////////////////// GRAFICI PAGINE ///////////////////
       $pagine = Pagina::where(['id_promo' => $promo->id])
       ->orderBy('data_visita', 'ASC')
       ->get();
       $arrayTotPag=[];
       $arrayUnicPag=[];
       $arrayGiorniPag = [];
       $arrayDesktopPag=[];
       $arrayMobilePag=[];
       $arrayDesktopUnicPag=[];
       $arrayMobileUnicPag=[];
       for( $i=0; $i<count($pagine); $i++ ){
            $arrayTotPag[$i] = $pagine[$i]->pagina_qta;
            $arrayUnicPag[$i] = $pagine[$i]->pagina_unica_qta;
            $arrayGiorniPag[$i] = $pagine[$i]->data_visita;
            $arrayDesktopPag[$i] = $pagine[$i]->pagina_desktop_qta;
            $arrayMobilePag[$i] = $pagine[$i]->pagina_mobile_qta;
            $arrayDesktopUnicPag[$i] = $pagine[$i]->pagina_desktop_unica_qta;
            $arrayMobileUnicPag[$i] = $pagine[$i]->pagina_mobile_unica_qta;
        }
        
        
     
            $sommaMobileUnicPag = array_sum($arrayMobileUnicPag);
            $sommaDesktopPag=array_sum($arrayDesktopPag);
            $sommaDesktopUnicPag=array_sum($arrayDesktopUnicPag);
            $sommaMobilePag=array_sum($arrayMobilePag);
     
        
        //dd($id_vol[0]->id_volantino);
       ////////////////// FINE PAGINE /////////////////////////

       ////////////////////// INTERATTIVI \\\\\\\\\\\\\\\\\\\\\\\\\\\  

       $interattivo = Interattivi::groupBy('tipo' ,'id_prodotto', )
        ->where(['id_promo' => $promo->id])
        ->select(DB::raw("SUM(qta) AS somma"), 'tipo' ,'id_prodotto',)
        ->orderBy('id_prodotto', 'ASC')
        ->get();
       //dd($interattivo[20]->somma);
       $arrRicette=[];
       $arrVideo=[];
       $arrCuriosita=[];
       $arrlink=[];
       $arrVai_a=[];
       $arrEcommerce=[];
        for ($i = 0; $i < count($interattivo); $i++ ){
            if($interattivo[$i]->tipo=='curiosita'){
                $arrCuriosita[$i]=$interattivo[$i]->somma;
            }
            if($interattivo[$i]->tipo=='collegamento'){
                $arrlink[$i]=$interattivo[$i]->somma;
            }
            if($interattivo[$i]->tipo=='ricetta'){
                $arrRicette[$i]=$interattivo[$i]->somma;
            }
            if($interattivo[$i]->tipo=='vai_a'){
                $arrVai_a[$i]=$interattivo[$i]->somma;
            }
            if($interattivo[$i]->tipo=='video'){
                $arrVideo[$i]=$interattivo[$i]->somma;
            }
            if($interattivo[$i]->tipo=='ecommerce'){
            $arrEcommerce[$i]=$interattivo[$i]->somma;
            }
        }
        //dd($arrlink);
        $sommaCuriosita=array_sum($arrCuriosita);
        $sommaCollegamenti=array_sum($arrlink);
        $sommaRicette=array_sum($arrRicette);
        $sommaVai_a=array_sum($arrVai_a);
        $sommaVideo=array_sum($arrVideo);
        $sommaEcommerce=array_sum($arrEcommerce);
        //dd($sommaCuriosita);
        //query per grafico interattivi $arrayTot[$i] = $visits[$i]->visite_qta;

        $interattivo2 = Interattivi::groupBy('data_visita', 'tipo')
            ->where(['id_promo' => $promo->id])
            ->select(DB::raw("SUM(qta) AS somma"),'data_visita', 'tipo')
            ->orderBy('data_visita', 'ASC')
            ->get();
        //dd($interattivo2);
        $interattivoDay = Interattivi::groupBy('data_visita',)
            ->where(['id_promo' => $promo->id])
            ->select(DB::raw("SUM(qta) AS somma"),'data_visita')
            ->orderBy('data_visita', 'ASC')
            ->get();
        //dd($interattivoDay[2]->data_visita);
        $arrayGiorni2 = [];
        for( $i=0; $i<count($interattivoDay); $i++ ){
            $arrayGiorni2[$i] = $interattivoDay[$i]->data_visita;
        }
        //dd($arrayGiorni2);
        $arrayCuriosita =[];
        $arrayprodotti = [];
        $arrayEcommerce=[];
        $arrayVideo=[];
        $arrayLink=[];
        $arrayRicette=[];
        $arrayVai_a=[];
        for ($i=0; $i<count($interattivo2); $i++){
            if($interattivo2[$i]->tipo=='curiosita'){
                $arrayCuriosita[$i]=$interattivo2[$i];
                
            }
            if($interattivo2[$i]->tipo=='prodotto'){
                $arrayprodotti[$i]=$interattivo2[$i];
            }
            if($interattivo2[$i]->tipo=='ecommerce'){
                $arrayEcommerce[$i]=$interattivo2[$i];
            }
            if($interattivo2[$i]->tipo=='video'){
                $arrayVideo[$i]=$interattivo2[$i];
            }
            if($interattivo2[$i]->tipo=='collegamento'){
                $arrayLink[$i]=$interattivo2[$i];
            }
            if($interattivo2[$i]->tipo=='ricetta'){
                $arrayRicette[$i]=$interattivo2[$i];
            }
            if($interattivo2[$i]->tipo=='vai_a'){
                $arrayVai_a[$i]=$interattivo2[$i];
            }
            
        }
        //dd($arrayRicette);
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

                $interattivo3 = Interattivi::groupBy('seriale','tipo' )
                    ->where(['id_promo' => $promo->id])
                    ->select(DB::raw("SUM(qta) AS sommaQta ,SUM(qta_unici) AS sommaUnici" ),'seriale','tipo')
                    ->orderBy('sommaQta', 'ASC')
                    ->get();
            // dd($interattivo3);
            if($interattivo3->count()==0){$finale = []; $products = []; $sommaInter= 0;$sommaPr=0;
                return view('/statistics/statistics_chartjs', compact( 'sommaPr','sommaInter' ,'products' ,'finale' ,'interattivo3' ,'interattivo2','arrayVai_a','arrayRicette','arrayLink' ,'arrayVideo' ,'arrayEcommerce' ,'arrayCuriosita','arrayGiorni2','arrayprodotti','sommaEcommerce','sommaVideo','sommaVai_a','sommaRicette','sommaCollegamenti', 'sommaCuriosita','volantino' ,'datiGrafico' ,'arrUniche' ,'arrTotali' ,'arrRegioni' ,'sommaMobileUnicPag','sommaDesktopUnicPag' ,'sommaMobilePag','sommaDesktopPag','arrayTotPag','arrayUnicPag','arrayGiorniPag', 'negozi', 'markets','id','arrayPromo','marketsAll','promozioni', 'promo', 'arrayTot','arrayUniq', 'arrayGiorni','sommaDesktop','sommaMobile','sommaUnicaDesktop','sommaUnicaMobile',));}
                else{ for ($i = 0; $i <count($interattivo3); $i++){
                    
                }
            }
             
             
         
            // dd($prodotti);
            $finale = DB::table('history_interattivi')
                ->where(['id_promo' => $promo->id])
                ->where('history_interattivi.tipo', '!=', "prodotto" )
                ->where('history_interattivi.tipo', '!=', "ecommerce" )
                ->where('history_interattivi.tipo', '!=', "vai_a" )
                ->join('prodotti', 'prodotti.seriale', '=', 'history_interattivi.seriale')
                ->join('prodotti_interattivi', 'prodotti_interattivi.seriale', '=', 'history_interattivi.seriale')
                ->groupBy('seriale','tipo', 'descrizione', 'descrizione_estesa', 'titolo')
                ->select(DB::raw("SUM(qta) AS sommaQta ,SUM(qta_unici) AS sommaUnici" ),'prodotti.seriale','history_interattivi.tipo','prodotti.descrizione', 'prodotti.descrizione_estesa', 'prodotti_interattivi.titolo')
                // ->select('history_interattivi.qta','prodotti.descrizione', 'prodotti.descrizione_estesa') 
                ->get();
            //dd($finale);
            $arrTot =[];
                for($i=0; $i<count($finale); $i++){
                        $arrTot[$i] = $finale[$i]->sommaUnici; 
                    }
            $sommaInter = array_sum($arrTot);
            //dd($sommaInter);
            
            //////////////////// FINE INTERATTIVI \\\\\\\\\\\\\\\\\\\\\\\\\\
                //////INIZIO PRODOTTI||||||||||||||||
                 $products = DB::table('history_interattivi')
                    ->where(['id_promo' => $promo->id])
                    ->where(['tipo' => "prodotto"])
                    ->where('prodotti.descrizione', '!=', "")
                    ->join('prodotti', 'prodotti.seriale', '=', 'history_interattivi.seriale')
                    //->join('prodotti_interattivi', 'prodotti_interattivi.seriale', '=', 'history_interattivi.seriale')
                    ->groupBy('seriale', 'descrizione', 'descrizione_estesa')
                    ->select(DB::raw("SUM(qta) AS sommaQta ,SUM(qta_unici) AS sommaUnici" ),'prodotti.seriale','prodotti.descrizione', 'prodotti.descrizione_estesa')
                    // ->select('history_interattivi.qta','prodotti.descrizione', 'prodotti.descrizione_estesa') 
                    ->get();
           //dd($products);
           $arrTotale =[];
           for($i=0; $i<count($products); $i++){
                   $arrTotale[$i] = $products[$i]->sommaUnici; 
               }
           $sommaPr = array_sum($arrTotale);
          //dd($arrTotale);
       
        return view('/statistics/statistics_chartjs', compact( 'sommaPr','sommaInter' ,'products','finale' , 'interattivo3' ,'interattivo2','arrayVai_a','arrayRicette','arrayLink' ,'arrayVideo' ,'arrayEcommerce' ,'arrayCuriosita','arrayGiorni2','arrayprodotti','sommaEcommerce','sommaVideo','sommaVai_a','sommaRicette','sommaCollegamenti', 'sommaCuriosita','volantino' ,'datiGrafico' ,'arrUniche' ,'arrTotali' ,'arrRegioni' ,'sommaMobileUnicPag','sommaDesktopUnicPag' ,'sommaMobilePag','sommaDesktopPag','arrayTotPag','arrayUnicPag','arrayGiorniPag', 'negozi', 'markets','id','arrayPromo','marketsAll','promozioni', 'promo', 'arrayTot','arrayUniq', 'arrayGiorni','sommaDesktop','sommaMobile','sommaUnicaDesktop','sommaUnicaMobile',));
    }

      /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function benvenuto1($id){
        
        $volantino= Volantino::where(['id_volantino'=> $id])->get();
        //dd($volantino);  //Volantino su cui ho cliccato
        $promo = Promo::where(['id'=> $volantino[0]->id_promo])->get();
        //dd($promo);
        ///////////////////   GRAFICI PARTE CONNESSIONI //////////////////////
        $visits = Visite::where(['id_volantino' => $volantino[0]->id_volantino])
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
        $datiGrafico = Geo::groupBy('place')
        ->where(['id_volantino' => $volantino[0]->id_volantino])
        ->select(DB::raw("SUM(visite_region_qta) AS somma, SUM(visite_uniche_region_qta) AS uniche"), 'place')
        ->orderBy('somma', 'DESC')
        ->get();
        $arrUniche=[];
        $arrTotali=[];
        $arrRegioni=[];
        for ($i = 0; $i < count($datiGrafico); $i++ ){
            $arrUniche[$i]= $datiGrafico[$i]->uniche;
            $arrTotali[$i]= $datiGrafico[$i]->somma;
            $arrRegioni[$i]= $datiGrafico[$i]->place;
        }
        ////////////////// FINE CONNESSIONI ///////////////////////
        $volantino1=Volantino::where(['id_volantino' => $volantino[0]->id_volantino])
        ->count();
        
        

       ////////////////// GRAFICI PAGINE ///////////////////

       $pagine = Pagina::where(['id_volantino' => $volantino[0]->id_volantino])
       ->orderBy('data_visita', 'ASC')
       ->get();
       $arrayTotPag=[];
        for( $i=0; $i<count($pagine); $i++ ){
            $arrayTotPag[$i] = $pagine[$i]->pagina_qta;
        }
        
        $arrayUnicPag=[];
        for( $i=0; $i<count($pagine); $i++ ){
            $arrayUnicPag[$i] = $pagine[$i]->pagina_unica_qta;
        }
        $arrayGiorniPag = [];
        for( $i=0; $i<count($pagine); $i++ ){
            $arrayGiorniPag[$i] = $pagine[$i]->data_visita;
        }

        $arrayDesktopPag=[];
        for( $i=0; $i<count($pagine); $i++ ){
            $arrayDesktopPag[$i] = $pagine[$i]->pagina_desktop_qta;
        }
        $sommaDesktopPag=array_sum($arrayDesktopPag);
        $arrayMobilePag=[];
        for( $i=0; $i<count($pagine); $i++ ){
            $arrayMobilePag[$i] = $pagine[$i]->pagina_mobile_qta;
        }
        $sommaMobilePag=array_sum($arrayMobilePag); //

        $arrayDesktopUnicPag=[];
        for( $i=0; $i<count($pagine); $i++ ){
            $arrayDesktopUnicPag[$i] = $pagine[$i]->pagina_desktop_unica_qta;
        }
            $sommaDesktopUnicPag=array_sum($arrayDesktopUnicPag);

        $arrayMobileUnicPag=[];
        for( $i=0; $i<count($pagine); $i++ ){
            $arrayMobileUnicPag[$i] = $pagine[$i]->pagina_mobile_unica_qta;
        }
            $sommaMobileUnicPag = array_sum($arrayMobileUnicPag);

        // $id_vol = Volantino::where(['id_volantino' => $promo->id ])->get();
         $volantinoId = PaginaQta::groupBy('num_pagina')
         ->where(['id_volantino' => $volantino[0]->id_volantino])
         ->select(DB::raw("SUM(pagina_qta) AS somma, SUM(pagina_unica_qta) AS uniche"), 'num_pagina')
         ->orderBy('somma', 'DESC')
         ->get();
      // dd($volantinoId);
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
       
        return view('/datatables/datatables_basic', compact( 'volantinoId','volantino1' ,'volantino' ,'datiGrafico' ,'arrUniche' ,'arrTotali' ,'arrRegioni' ,'sommaMobileUnicPag','sommaDesktopUnicPag' ,'sommaMobilePag','sommaDesktopPag','arrayTotPag','arrayUnicPag','arrayGiorniPag', 'negozi', 'markets','id','arrayPromo','marketsAll','promozioni', 'promo', 'arrayTot','arrayUniq', 'arrayGiorni','sommaDesktop','sommaMobile','sommaUnicaDesktop','sommaUnicaMobile',));
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
            
            else{
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
        //dd($marketsAll);
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
            $volantini = Volantino::all();
            $mutable = Carbon::now();
            $result='';
            foreach ($promozioni as $promozione){
                foreach ($volantini as $volantino){
                    if($promozione->id==$volantino->id_promo){
                        foreach ($marketsAll as $market){
                            if($volantino->id_subcanale==$market->id){
                                    $result.='`<tr role="row">\
                                    <td style="width:5%;" class="img'.$promozione->id_canale.' w3-round-xxlarge">  </td>\
                                    <td style="width:5%;" class="text'.$promozione->id_canale.'">  </td>\
                                    <td style="width:5%;" class="id"> ' .$market->nome. ' </td>\
                                    <td style="width:30%;" class="nome"> <a href= "datatables_basic/'.$volantino->id_volantino.'" style="color: black;" > ' .$promozione->nome. ' </a>  </td>\
                                    <td style="width:35%;" class="descrizione"> ' .$promozione->descrizione. ' </td>\
                                    <td style="width:10%;" class="date_start"> ' .$promozione->date_start. ' </td>\
                                    <td style="width:10%;" class="date_end"> ' .$promozione->date_end. ' </td>\
                                </tr>`';
                            }
                        }
                    }
           
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
