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

    public function mostra()
    {
        return view('/datatables/datatables_export');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function benvenuto($id){
        
        $promo = Promo::find($id);
        //dd($promo);
        $volantino= Volantino::where(['id_promo'=> $promo->id])->get(); 
        //dd($volantino);
        //Promo su cui ho cliccato
        $riepilogoConnessioni = Visite::groupBy('id_market','id_volantino')
            ->where(['id_promo' => $promo->id])
            ->where(['history_visit.data_promo_start'=> $promo->date_start])
            ->where(['history_visit.data_promo_end'=> $promo->date_end])
            ->where(['history_visit.id_parent' => $promo->id_canale])
            ->join('elenco_market', 'elenco_market.id', '=', 'history_visit.id_market')
            // ->select(DB::raw("SUM(visite_desktop_qta) AS desktop, SUM(visite_mobile_qta) AS mobile, SUM(visite_uniche_desktop_qta) AS deskUni, SUM(visite_uniche_mobile_qta) AS mobUni"), 'history_visit.id_market', 'history_visit.id_volantino','elenco_market.nome')
            ->select(DB::raw('data_visita, SUM(visite_qta) AS qta, SUM(visite_uniche_qta) AS uniche, SUM(visite_desktop_qta) AS vdq, SUM(visite_mobile_qta) AS vmq, SUM(visite_uniche_desktop_qta) AS vudq, SUM(visite_uniche_mobile_qta) AS vumq'),'history_visit.id_market', 'history_visit.id_volantino','elenco_market.nome')
                
            ->orderBy('id_market', 'ASC')
            ->get();
            //dd($riepilogoConnessioni);
            $arrayD =[];
            $arrayM =[];
            $arrayDu =[];
            $arrayMu =[];
            for($i=0; $i<count($riepilogoConnessioni); $i++) {
                $arrayD[$i] = $riepilogoConnessioni[$i]->vdq;
                $arrayM[$i] = $riepilogoConnessioni[$i]->vmq;
                $arrayDu[$i] = $riepilogoConnessioni[$i]->vudq;
                $arrayMu[$i] = $riepilogoConnessioni[$i]->vumq;
            }
            $sumD = array_sum($arrayD);     
            $sumM = array_sum($arrayM);
            $sumDu = array_sum($arrayDu);
            $sumMu = array_sum($arrayMu);
            
        $riepilogoVisualizzazioni = Pagina::groupBy('id_market')
            ->where(['id_promo' => $promo->id])
            ->where(['id_parent' => $promo->id_canale])
            ->where(['data_promo_start'=> $promo->date_start])
            ->where(['data_promo_end'=> $promo->date_end])
            // ->select(DB::raw("SUM(pagina_desktop_qta) + SUM(pagina_mobile_qta) AS totali, SUM(pagina_unica_qta) AS uniche "), 'id_market')
            ->select(DB::raw('data_visita, SUM(pagina_qta) AS qta, SUM(pagina_unica_qta) AS uniche, SUM(pagina_desktop_qta) AS pdq, SUM(pagina_mobile_qta) AS pmq, SUM(pagina_desktop_unica_qta) AS pduq, SUM(pagina_mobile_unica_qta) AS pmuq'), 'id_market')
              
            ->orderBy('id_market', 'ASC')
            ->get();
            //dd($riepilogoVisualizzazioni);
        $arrVtot =[];
        $arrVuni =[];
        for ($i=0; $i<count($riepilogoVisualizzazioni); $i++ ){
            $arrVtot[$i] = $riepilogoVisualizzazioni[$i]->totali;
            $arrVuni[$i] = $riepilogoVisualizzazioni[$i]->uniche;
        }
        $sumVtot = array_sum($arrVtot);
        $sumVuni = array_sum($arrVuni);
        
        $riepilogoInterattivi= Interattivi::groupBy('id_market', )
            ->where(['id_promo' => $promo->id])
            ->where(['id_parent' => $promo->id_canale])
            
            ->select(DB::raw("SUM(CASE WHEN tipo = 'ricetta' THEN qta ELSE 0 END) AS totaliR,SUM(CASE WHEN tipo = 'video' THEN qta ELSE 0 END) AS totaliV,SUM(CASE WHEN tipo = 'prodotto' THEN qta ELSE 0 END) AS totaliP,SUM(CASE WHEN tipo = 'curiosita' THEN qta ELSE 0 END) AS totaliCu,SUM(CASE WHEN tipo = 'collegamento' THEN qta ELSE 0 END) AS totaliC"),'id_market','id_parent' )
            ->groupBy(DB::raw("id_parent"))
            ->orderBy('id_market', 'ASC')
            ->get();
            //dd($riepilogoInterattivi);
        
    
        ///////////////////   GRAFICI PARTE CONNESSIONI //////////////////////
        $visits = Visite::where(['id_promo' => $promo->id])
        // ->groupBy('data_visita')
        ->where(['data_promo_start'=> $promo->date_start])
        ->where(['data_promo_end'=> $promo->date_end])
        ->where(['id_parent'=> $promo->id_canale])
        ->select(DB::raw('data_visita, SUM(visite_qta) AS qta, SUM(visite_uniche_qta) AS uniche, SUM(visite_desktop_qta) AS vdq, SUM(visite_mobile_qta) AS vmq, SUM(visite_uniche_desktop_qta) AS vudq, SUM(visite_uniche_mobile_qta) AS vumq'))
        ->groupBy(DB::raw('data_visita'))
        ->orderBy('data_visita', 'ASC')
        ->get();
        //dd($visits); //Visite
        $arrayTot = [];
        $arrayUniq = [];
        $arrayGiorni = [];
        $arrayDesktop=[];
        $arrayMobile=[];
        $arrayDesktopUniq=[];
        $arrayMobileUniq=[];
        for( $i=0; $i<count($visits); $i++ ){
            $arrayTot[$i] = $visits[$i]->qta;
            $arrayUniq[$i] = $visits[$i]->uniche;
            $arrayGiorni[$i] = $visits[$i]->data_visita;
            $arrayDesktop[$i] = $visits[$i]->vdq;
            $arrayMobile[$i] = $visits[$i]->vmq;
            $arrayDesktopUniq[$i] = $visits[$i]->vudq;
            $arrayMobileUniq[$i] = $visits[$i]->vumq;
        }
        $sommaMobile=array_sum($arrayMobile);
        $sommaDesktop=array_sum($arrayDesktop);
        $sommaUnicaDesktop=array_sum($arrayDesktopUniq);
        $sommaUnicaMobile=array_sum($arrayMobileUniq);

        $datiGrafico = Geo::groupBy('place')
        ->where(['id_promo' => $promo->id])
        ->where(['data_promo_start'=> $promo->date_start])
        ->where(['data_promo_end'=> $promo->date_end])
        ->where(['id_parent'=> $promo->id_canale])
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
       ->where(['data_promo_start'=> $promo->date_start])
       ->where(['data_promo_end'=> $promo->date_end])
       ->where(['id_parent'=> $promo->id_canale])
       ->select(DB::raw('data_visita, SUM(pagina_qta) AS qta, SUM(pagina_unica_qta) AS uniche, SUM(pagina_desktop_qta) AS pdq, SUM(pagina_mobile_qta) AS pmq, SUM(pagina_desktop_unica_qta) AS pduq, SUM(pagina_mobile_unica_qta) AS pmuq'))
       ->groupBy(DB::raw('data_visita'))
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
            $arrayTotPag[$i] = $pagine[$i]->qta;
            $arrayUnicPag[$i] = $pagine[$i]->uniche;
            $arrayGiorniPag[$i] = $pagine[$i]->data_visita;
            $arrayDesktopPag[$i] = $pagine[$i]->pdq;
            $arrayMobilePag[$i] = $pagine[$i]->pmq;
            $arrayDesktopUnicPag[$i] = $pagine[$i]->pduq;
            $arrayMobileUnicPag[$i] = $pagine[$i]->pmuq;
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
        ->where(['data_promo_start'=> $promo->date_start])
        ->where(['data_promo_end'=> $promo->date_end])
        ->where(['id_parent'=> $promo->id_canale])
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
       $arrProdotti=[];
        for ($i = 0; $i < count($interattivo); $i++ ){
            if($interattivo[$i]->tipo=='prodotto'){
                $arrProdotti[$i]=$interattivo[$i]->somma;
            }
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
        $sommaProdotti=array_sum($arrProdotti);
        //dd($sommaProdotti);
        //query per grafico interattivi $arrayTot[$i] = $visits[$i]->visite_qta;

        $interattivo2 = Interattivi::groupBy('data_visita', 'tipo')
            ->where(['id_promo' => $promo->id])
            ->where(['data_promo_start'=> $promo->date_start])
            ->where(['data_promo_end'=> $promo->date_end])
            ->where(['id_parent'=> $promo->id_canale])
            ->select(DB::raw("SUM(qta) AS somma"),'data_visita', 'tipo')
            ->orderBy('data_visita', 'ASC')
            ->get();
        //dd($interattivo2);
        $interattivoDay = Interattivi::groupBy('data_visita',)
            ->where(['id_promo' => $promo->id])
            ->where(['data_promo_start'=> $promo->date_start])
            ->where(['data_promo_end'=> $promo->date_end])
            ->where(['id_parent'=> $promo->id_canale])
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
        //dd($arrayprodotti);
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

            
            // dd($prodotti);
            $finale = DB::table('history_interattivi')
                ->where(['id_promo' => $promo->id])
                ->where(['history_interattivi.data_promo_start'=> $promo->date_start])
                ->where(['history_interattivi.data_promo_end'=> $promo->date_end])
                ->where(['history_interattivi.id_parent'=> $promo->id_canale])
                ->where('history_interattivi.tipo', '!=', "prodotto" )
                ->where('history_interattivi.tipo', '!=', "ecommerce" )
                ->where('history_interattivi.tipo', '!=', "vai_a" )
                ->join('prodotti', function ($join) {
                    $join->on('history_interattivi.id_volantino', '=', 'prodotti.id_volantino')
                         ->on('history_interattivi.seriale', '=', 'prodotti.seriale');
                })
                ->join('prodotti_interattivi', 'prodotti_interattivi.seriale', '=', 'history_interattivi.seriale')
                ->groupBy('seriale','tipo', 'descrizione', 'descrizione_estesa', 'titolo')
                ->select(DB::raw("SUM(history_interattivi.qta) AS sommaQta ,SUM(history_interattivi.qta_unici) AS sommaUnici" ),'prodotti.seriale','history_interattivi.tipo','prodotti.descrizione', 'prodotti.descrizione_estesa', 'prodotti_interattivi.titolo', 'history_interattivi.id_prodotto','history_interattivi.id_volantino')
                ->orderBy('sommaQta', 'DESC') 
                ->get();
            //dd($finale);
            $arrTot =[];
                for($i=0; $i<count($finale); $i++){
                        $arrTot[$i] = $finale[$i]->sommaUnici + $finale[$i]->sommaQta; 
                    }
            $sommaInter = array_sum($arrTot);
            //dd($sommaInter);
            
            //////////////////// FINE INTERATTIVI \\\\\\\\\\\\\\\\\\\\\\\\\\
                //////INIZIO PRODOTTI||||||||||||||||
                 $products = DB::table('history_interattivi')
                    ->where(['id_promo' => $promo->id])
                    ->where(['history_interattivi.data_promo_start'=> $promo->date_start])
                    ->where(['history_interattivi.data_promo_end'=> $promo->date_end])
                    ->where(['history_interattivi.id_parent'=> $promo->id_canale])
                    ->where(['tipo' => "prodotto"])
                    ->where('prodotti.descrizione', '!=', "")
                    ->join('prodotti', function ($join) {
                        $join->on('history_interattivi.id_volantino', '=', 'prodotti.id_volantino')
                             ->on('history_interattivi.seriale', '=', 'prodotti.seriale');
                    })                    ->groupBy('seriale', 'descrizione', 'descrizione_estesa')
                    ->select(DB::raw("SUM(qta) AS sommaQta ,SUM(qta_unici) AS sommaUnici" ),'prodotti.seriale','prodotti.descrizione', 'prodotti.descrizione_estesa','prodotti.id_prodotti','history_interattivi.id_volantino')
                    ->orderBy('sommaQta', 'DESC')  
                    ->get();
           //dd($products);
           $arrTotale =[];
           for($i=0; $i<count($products); $i++){
                   $arrTotale[$i] = $products[$i]->sommaUnici; 
               }
           $sommaPr = array_sum($arrTotale);
          //dd($arrTotale);
       
        return view('/statistics/statistics_chartjs', compact('sommaProdotti', 'sumD', 'sumM', 'sumDu', 'sumMu', 'sumVtot', 'sumVuni','riepilogoInterattivi','riepilogoVisualizzazioni' ,'riepilogoConnessioni' ,'sommaPr','sommaInter' ,'products','finale'  ,'interattivo2','arrayVai_a','arrayRicette','arrayLink' ,'arrayVideo' ,'arrayEcommerce' ,'arrayCuriosita','arrayGiorni2','arrayprodotti','sommaEcommerce','sommaVideo','sommaVai_a','sommaRicette','sommaCollegamenti', 'sommaCuriosita','volantino' ,'datiGrafico' ,'arrUniche' ,'arrTotali' ,'arrRegioni' ,'sommaMobileUnicPag','sommaDesktopUnicPag' ,'sommaMobilePag','sommaDesktopPag','arrayTotPag','arrayUnicPag','arrayGiorniPag', 'negozi', 'markets','id','arrayPromo','marketsAll','promozioni', 'promo', 'arrayTot','arrayUniq', 'arrayGiorni','sommaDesktop','sommaMobile','sommaUnicaDesktop','sommaUnicaMobile',));
    }

      /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function benvenuto1($id){
        
        $volantino= Volantino::where(['id_volantino'=> $id])->get();
        //dd($volantino);  //Volantino su cui ho cliccato
        $array = str_split($volantino[0]->id_volantino);
        //dd($array);
        $promo = Promo::where(['id'=> $volantino[0]->id_promo])->get();
        //dd($promo);
        ///////////////////////////// RIEPILOGO ////////////////////////////
        $interattivoProdotti =Interattivi::groupBy('id_market', 'tipo')   
            ->where(['id_promo' => $promo[0]->id])
            ->where(['id_parent' => $promo[0]->id_canale])
            ->where(['id_market' => $volantino[0]->id_subcanale])
            ->where(['tipo' => "prodotto"])
            ->select(DB::raw("SUM(qta) AS totali"), 'id_market', 'tipo')
            ->orderBy('id_market', 'ASC')
            ->get();
            
        $interattivoRicette =Interattivi::groupBy('id_market', 'tipo')
            ->where(['id_promo' => $promo[0]->id])
            ->where(['id_parent' => $promo[0]->id_canale])
            ->where(['id_market' => $volantino[0]->id_subcanale])
            ->where(['tipo' => "ricetta"])
            ->select(DB::raw("SUM(qta) AS totali"), 'id_market', 'tipo')
            ->orderBy('id_market', 'ASC')
            ->get();
            
        $interattivoVideo =Interattivi::groupBy('id_market', 'tipo')
            ->where(['id_promo' => $promo[0]->id])
            ->where(['id_parent' => $promo[0]->id_canale])
            ->where(['id_market' => $volantino[0]->id_subcanale])
            ->where(['tipo' => "video"])
            ->select(DB::raw("SUM(qta) AS totali"), 'id_market', 'tipo')
            ->orderBy('id_market', 'ASC')
            ->get();
            
        $interattivoCuriosita =Interattivi::groupBy('id_market', 'tipo')
            ->where(['id_promo' => $promo[0]->id])
            ->where(['id_parent' => $promo[0]->id_canale])
            ->where(['id_market' => $volantino[0]->id_subcanale])
            ->where(['tipo' => "curiosita"])
            ->select(DB::raw("SUM(qta) AS totali"), 'id_market', 'tipo')
            ->orderBy('id_market', 'ASC')
            ->get();
            
        $interattivoLink =Interattivi::groupBy('id_market', 'tipo')
            ->where(['id_promo' => $promo[0]->id])
            ->where(['id_parent' => $promo[0]->id_canale])
            ->where(['id_market' => $volantino[0]->id_subcanale])
            ->where(['tipo' => "collegamento"])
            ->select(DB::raw("SUM(qta) AS totali"), 'id_market', 'tipo')
            ->orderBy('id_market', 'ASC')
            ->get();
            
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
        //dd($volantinoId);
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
            
        }
        //dd($volantino);
        //dd($sommaMobilePag);
        //dd($sommaDesktopPag);
        ////////////////////// INTERATTIVI \\\\\\\\\\\\\\\\\\\\\\\\\\\ 
        $interattivo = Interattivi::groupBy('tipo' ,'id_prodotto', )
            ->where(['id_volantino' => $volantino[0]->id_volantino])
            ->select(DB::raw("SUM(qta) AS somma"), 'tipo' ,'id_prodotto',)
            ->orderBy('id_prodotto', 'ASC')
            ->get();
            //dd($interattivo);
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
        $sommaCuriosita=array_sum($arrCuriosita);
        $sommaCollegamenti=array_sum($arrlink);
        $sommaRicette=array_sum($arrRicette);
        $sommaVai_a=array_sum($arrVai_a);
        $sommaVideo=array_sum($arrVideo);
        $sommaEcommerce=array_sum($arrEcommerce);
        $interattivo2 = Interattivi::groupBy('data_visita', 'tipo')
            ->where(['id_volantino' =>$volantino[0]->id_volantino])
            ->select(DB::raw("SUM(qta) AS somma"),'data_visita', 'tipo')
            ->orderBy('data_visita', 'ASC')
            ->get();

        $interattivoDay = Interattivi::groupBy('data_visita',)
            ->where(['id_volantino' =>$volantino[0]->id_volantino])
            ->select(DB::raw("SUM(qta) AS somma"),'data_visita')
            ->orderBy('data_visita', 'ASC')
            ->get();

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
        
        $interattivo3 = Interattivi::groupBy('seriale','tipo' )
            ->where(['id_volantino' =>$volantino[0]->id_volantino])
            ->select(DB::raw("SUM(qta) AS sommaQta ,SUM(qta_unici) AS sommaUnici" ),'seriale','tipo')
            ->orderBy('sommaQta', 'ASC')
            ->get();

        $finale = DB::table('history_interattivi')
            ->where(['history_interattivi.id_volantino' =>$volantino[0]->id_volantino])
            ->where('history_interattivi.tipo', '!=', "prodotto" )
            ->where('history_interattivi.tipo', '!=', "ecommerce" )
            ->where('history_interattivi.tipo', '!=', "vai_a" )
            ->join('prodotti', 'prodotti.seriale', '=', 'history_interattivi.seriale')
            ->join('prodotti_interattivi', 'prodotti_interattivi.seriale', '=', 'history_interattivi.seriale')
            ->groupBy('seriale','tipo', 'descrizione', 'descrizione_estesa', 'titolo')
            ->select(DB::raw("SUM(qta) AS sommaQta ,SUM(qta_unici) AS sommaUnici" ),'prodotti.seriale','history_interattivi.tipo','prodotti.descrizione', 'prodotti.descrizione_estesa', 'prodotti_interattivi.titolo','history_interattivi.id_prodotto')
            // ->select('history_interattivi.qta','prodotti.descrizione', 'prodotti.descrizione_estesa')
            ->orderBy('sommaQta', 'DESC')  
            ->get();
        $arrTot =[];
        for($i=0; $i<count($finale); $i++){
            $arrTot[$i] = $finale[$i]->sommaUnici; 
        }
        $sommaInter = array_sum($arrTot);
        $products = DB::table('history_interattivi')
            ->where(['history_interattivi.id_volantino' =>$volantino[0]->id_volantino])
            ->where(['tipo' => "prodotto"])
            ->where('prodotti.descrizione', '!=', "")
            ->join('prodotti', 'prodotti.seriale', '=', 'history_interattivi.seriale')
            //->join('prodotti_interattivi', 'prodotti_interattivi.seriale', '=', 'history_interattivi.seriale')
            ->groupBy('seriale', 'descrizione', 'descrizione_estesa','pagina')
            ->select(DB::raw("SUM(qta) AS sommaQta ,SUM(qta_unici) AS sommaUnici" ),'pagina','prodotti.seriale','prodotti.descrizione', 'prodotti.descrizione_estesa','prodotti.id_prodotti')
            // ->select('history_interattivi.qta','prodotti.descrizione', 'prodotti.descrizione_estesa')
            ->orderBy('sommaQta', 'DESC')  
            ->get();
        $arrTotale =[];
        for($i=0; $i<count($products); $i++){
                $arrTotale[$i] = $products[$i]->sommaUnici; 
            }
        $sommaPr = array_sum($arrTotale);
        return view('/datatables/datatables_basic', compact('sommaPr','products','sommaInter','finale','interattivo3','arrayVai_a','arrayRicette','arrayVideo','arrayLink','arrayEcommerce','arrayprodotti','arrayGiorni2','interattivo2','arrRicette','arrayCuriosita','arrVideo','arrlink','arrRicette','arrVai_a' ,'sommaCuriosita','sommaCollegamenti','sommaRicette','sommaVai_a','sommaVideo','sommaEcommerce','array','interattivoRicette','interattivoVideo','interattivoCuriosita','interattivoLink','interattivoProdotti', 'volantinoId','volantino1' ,'volantino' ,'datiGrafico' ,'arrUniche' ,'arrTotali' ,'arrRegioni' ,'sommaMobileUnicPag','sommaDesktopUnicPag' ,'sommaMobilePag','sommaDesktopPag','arrayTotPag','arrayUnicPag','arrayGiorniPag', 'negozi', 'markets','id','arrayPromo','marketsAll','promozioni', 'promo', 'arrayTot','arrayUniq', 'arrayGiorni','sommaDesktop','sommaMobile','sommaUnicaDesktop','sommaUnicaMobile',));
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
        $array10 = ['92','75','141', '143'];
        $mutable = Carbon::now()->month;
        //dd($mutable);
        $arrayD =[];
        $arrayM =[];
        $arrayDu =[];
        $arrayMu =[];
        for($i = 0; $i <count($array10); $i++){
            $riepilogoConnessioni[$i] = Visite::groupBy('id_market','id_parent',)         //////////// FARE DELLE SOMME TOTALI DI TUTTI I MARKET //////////
                // ->whereMonth('data_visita', '=', $request->dataInizio)  
                ->whereMonth('data_visita', '=', 9)                                      //////////// DEVO DARGLI ANCHE L'ID PARENT //////FARE UN ALTRO FOR SU UN ARRAY SUI GENITORI /////////
                ->where(['history_visit.id_parent' => $array10[$i]])
                ->join('elenco_market', 'elenco_market.id', '=', 'history_visit.id_market')
                ->join('users', 'users.id', '=', 'elenco_market.id_parent')
                ->select(DB::raw("SUM(visite_desktop_qta) AS desktop, SUM(visite_mobile_qta) AS mobile, SUM(visite_uniche_desktop_qta) AS deskUni, SUM(visite_uniche_mobile_qta) AS mobUni"), 'history_visit.id_market', 'history_visit.id_volantino','elenco_market.nome AS nomeMarket','elenco_market.id_parent','users.nome')
                ->orderBy('id_market', 'ASC')
                ->get();
                //dd($riepilogoConnessioni);
                for($j=0; $j<count($riepilogoConnessioni[$i]); $j++) {
                    
                        ///////////////////////////// PROVARE A FARE LE SOMME NEL BLADE ////////////////////////////
                    $arrayD =  array_merge($arrayD, array( $riepilogoConnessioni[$i][$j]->desktop));
                    $arrayM =  array_merge($arrayM, array($riepilogoConnessioni[$i][$j]->mobile));
                    $arrayDu =  array_merge($arrayDu, array($riepilogoConnessioni[$i][$j]->deskUni));
                    $arrayMu =  array_merge($arrayMu, array($riepilogoConnessioni[$i][$j]->mobUni));
                }
            $sumD = array_sum($arrayD);     
            $sumM = array_sum($arrayM);
            $sumDu = array_sum($arrayDu);
            $sumMu = array_sum($arrayMu);
        }  //dd($riepilogoConnessioni);
        $arrVtot =[];
        $arrVuni =[];
        for($i = 0; $i <count($array10); $i++){
            $riepilogoVisualizzazioni[$i] = Pagina::groupBy('id_market', 'id_parent')    //////////////////////// BISOGNERA FARE UN ALTRO FOREACH NEL BLADE !!!!!!!!!!! ///////////////
                // ->whereMonth('data_visita', '=', $request->dataInizio)
                ->whereMonth('data_visita', '=', 9)
                ->where(['history_pagine.id_parent' => $array10[$i]])
                ->join('elenco_market', 'elenco_market.id', '=', 'history_pagine.id_market')
                ->join('users', 'users.id', '=', 'elenco_market.id_parent')
                ->select(DB::raw("SUM(pagina_desktop_qta) + SUM(pagina_mobile_qta) AS totali, SUM(pagina_unica_qta) AS uniche "), 'history_pagine.id_market','elenco_market.nome AS nomeMarket','elenco_market.id_parent','users.nome')
                ->orderBy('id_market', 'ASC')
                ->get();
                //dd($riepilogoVisualizzazioni);
            
            for ($j=0; $j<count($riepilogoVisualizzazioni[$i]); $j++ ){
                $arrVtot = array_merge($arrVtot, array($riepilogoVisualizzazioni[$i][$j]->totali));
                $arrVuni = array_merge($arrVuni, array($riepilogoVisualizzazioni[$i][$j]->uniche));
            }
            $sumVtot = array_sum($arrVtot);
            $sumVuni = array_sum($arrVuni);
        }//dd($riepilogoVisualizzazioni);
        for($i = 0; $i <count($array10); $i++){
        $riepilogoInterattivi[$i]= Interattivi::groupBy('id_market', )
            ->whereMonth('data_visita', '=', 9)
            ->where(['id_parent' => $array10[$i]])
            // ->groupBy(DB::raw("tipo"))
            ->select(DB::raw("SUM(CASE WHEN tipo = 'ricetta' THEN qta ELSE 0 END) AS totaliR,SUM(CASE WHEN tipo = 'video' THEN qta ELSE 0 END) AS totaliV,SUM(CASE WHEN tipo = 'prodotto' THEN qta ELSE 0 END) AS totaliP,SUM(CASE WHEN tipo = 'curiosita' THEN qta ELSE 0 END) AS totaliCu,SUM(CASE WHEN tipo = 'collegamento' THEN qta ELSE 0 END) AS totaliC"),'id_market','id_parent' )
            ->groupBy(DB::raw("id_parent"))
            ->orderBy('id_market', 'ASC')
            ->get();
        }//dd($riepilogoInterattivi);                                  /////////////////////////// UTILIZZARE QUESTO E NON I VARI "INTERATTIVI" //////////////
        for($i=0;$i<count($array10); $i++) {
        $interattivoProdotti[$i] =Interattivi::groupBy('id_market', 'tipo')   
            ->whereMonth('data_visita', '=', 9)
            ->where(['id_parent' => $array10[$i]])
            ->where(['tipo' => "prodotto"])
            ->select(DB::raw("SUM(qta) AS totali"), 'id_market', 'tipo')
            ->orderBy('id_market', 'ASC')
            ->get();
            
        }//dd($interattivoProdotti);
        for($i=0;$i<count($array10); $i++) {
        $interattivoRicette[$i] =Interattivi::groupBy('id_market', 'tipo')
            ->whereMonth('data_visita', '=', 10)
            ->where(['id_parent' => $array10[$i]])
            ->where(['tipo' => "ricetta"])
            ->select(DB::raw("SUM(qta) AS totali"), 'id_market', 'tipo')
            ->orderBy('id_market', 'ASC')
            ->get();
            
        }//dd($interattivoRicette);
        for($i=0;$i<count($array10); $i++) {
        $interattivoVideo[$i] =Interattivi::groupBy('id_market', 'tipo')
            ->whereMonth('data_visita', '=', 9)
            ->where(['id_parent' => $array10[$i]])
            ->where(['tipo' => "video"])
            ->select(DB::raw("SUM(qta) AS totali"), 'id_market', 'tipo')
            ->orderBy('id_market', 'ASC')
            ->get();
            //dd($interattivoVideo);
        }
        for($i=0;$i<count($array10); $i++) {
        $interattivoCuriosita[$i] =Interattivi::groupBy('id_market', 'tipo')
            ->whereMonth('data_visita', '=', 9)
            ->where(['id_parent' => $array10[$i]])
            ->where(['tipo' => "curiosita"])
            ->select(DB::raw("SUM(qta) AS totali"), 'id_market', 'tipo')
            ->orderBy('id_market', 'ASC')
            ->get();
            //dd($interattivoCuriosita);
        }
        for($i=0;$i<count($array10); $i++) {
        $interattivoLink[$i] =Interattivi::groupBy('id_market', 'tipo')
            ->whereMonth('data_visita', '=', 9)
            ->where(['id_parent' => $array10[$i]])
            ->where(['tipo' => "collegamento"])
            ->select(DB::raw("SUM(qta) AS totali"), 'id_market', 'tipo')
            ->orderBy('id_market', 'ASC')
            ->get();
            //dd($interattivoLink);
        }
        ///////////////////   GRAFICI PARTE CONNESSIONI //////////////////////
        $arrayTot = [];
        $arrayUniq = [];
        $arrayGiorni = [];
        $arrayDesktop=[];
        $arrayMobile=[];
        $arrayDesktopUniq=[];
        $arrayMobileUniq=[];
        $arrayMesi =[];
        for($i = 0; $i <count($array10); $i++){
            $visits[$i] = Visite::where(['id_parent' => $array10[$i]])
            ->whereMonth('data_visita', '=', 9)
            ->select(DB::raw("data_visita, CAST(SUM(visite_qta) AS UNSIGNED) AS sommaV, CAST(SUM(visite_uniche_qta) AS UNSIGNED) AS unicheV, SUM(visite_desktop_qta) AS vDq, SUM(visite_mobile_qta) AS vMq, SUM(visite_uniche_desktop_qta) AS vDuQ, SUM(visite_uniche_mobile_qta) AS vMuQ, MONTH(data_visita) AS mese"))
            ->groupBy(DB::raw('data_visita'))
            //->orderBy('data_visita', 'ASC')
            ->get();
            //dd($visit); //Visite
            for( $j=0; $j<count($visits[$i]); $j++ ){
                $arrayTot = array_merge($arrayTot, array($visits[$i][$j]->sommaV));
                $arrayUniq = array_merge($arrayUniq, array($visits[$i][$j]->unicheV));
                $arrayGiorni = array_merge($arrayGiorni,array($visits[$i][$j]->data_visita));
                $arrayMesi = array_merge($arrayMesi,array($visits[$i][$j]->mese));
                $arrayDesktop = array_merge($arrayDesktop,array($visits[$i][$j]->vDq));
                $arrayMobile = array_merge($arrayMobile,array($visits[$i][$j]->vMq));
                $arrayDesktopUniq = array_merge($arrayDesktopUniq,array($visits[$i][$j]->vDuQ));
                $arrayMobileUniq = array_merge($arrayMobileUniq,array($visits[$i][$j]->vMuQ));
            }
            $sommaMobile=array_sum($arrayMobile);
            $sommaDesktop=array_sum($arrayDesktop);
            $sommaUnicaDesktop=array_sum($arrayDesktopUniq);
            $sommaUnicaMobile=array_sum($arrayMobileUniq);
        }
        $arrayGiorni = array_unique($arrayGiorni);
        $arrayMesi = array_unique($arrayMesi);
        $index = count($arrayGiorni);
        for($i=0; $i<count($arrayTot); $i++) {
            if(isset($arrayGiorni[$i+$index])){
            $arrayTot[$i]=$arrayTot[$i]+$arrayTot[$i+$index];
            $arrayUniq[$i]=$arrayUniq[$i]+$arrayUniq[$i+$index];
            $arrayDesktop[$i]=$arrayDesktop[$i]+$arrayDesktop[$i+$index];
            $arrayMobile[$i]=$arrayMobile[$i]+$arrayMobile[$i+$index];
            }else{
                $arrayTot[$i]=$arrayTot[$i]+0;
                $arrayUniq[$i]=$arrayUniq[$i]+0;
                $arrayDesktop[$i]=$arrayDesktop[$i]+0;
                $arrayMobile[$i]=$arrayMobile[$i]+0;
            }
        }//dd($arrayTot);
        /// FINE GRAFICO  
        
        $arrUniche=[];
        $arrTotali=[];
        $arrRegioni=[];
        for($i = 0; $i <count($array10); $i++){
            $datiGrafico[$i] = Geo::groupBy('place')
            ->where(['id_parent' => $array10[$i]])
            ->whereMonth('data_visita', '=', 9)
            // ->whereMonth('data_visita', '=', $request->dataInizio)
            ->select(DB::raw("CAST(SUM(visite_region_qta) AS UNSIGNED) AS somma, SUM(visite_uniche_region_qta) AS uniche"), 'place')
            ->orderBy('somma', 'DESC')
            ->get();
            //dd($datiGrafico);
            
            for ($j = 0; $j < count($datiGrafico[$i]); $j++ ){
                $arrUniche= array_merge($arrUniche, array($datiGrafico[$i][$j]->uniche));
                $arrTotali= array_merge($arrTotali, array($datiGrafico[$i][$j]->somma));
                $arrRegioni= array_merge($arrRegioni, array($datiGrafico[$i][$j]->place));
            }
        }
        //dd($arrUniche);     ///////////////////// PROVARE A FARE COME CON IL GRAFICO DEI MESI, MA SULLE REGIONI, DIRETTAMENTE NEL JAVASCRIPT ////////////////
        //dd($arrUniche);
        $arrRegioni = array_unique($arrRegioni);
        $index = count($arrRegioni);
        for($i=0; $i<count($arrRegioni)-1; $i++) {
            if(isset($arrRegioni[$i+$index])){
            $arrTotali[$i]=$arrTotali[$i]+$arrTotali[$i+$index];
            $arrUniche[$i]=$arrUniche[$i]+$arrUniche[$i+$index];
            }else{
                $arrTotali[$i]=$arrTotali[$i]+0;
                $arrUniche[$i]=$arrUniche[$i]+0;
            }
        }
        ////////////////// FINE CONNESSIONI ///////////////////////

        ////////////////// GRAFICI PAGINE ///////////////////
        $arrayTotPag=[];
        $arrayUnicPag=[];
        $arrayGiorniPag = [];
        $arrayDesktopPag=[];
        $arrayMobilePag=[];
        $arrayDesktopUnicPag=[];
        $arrayMobileUnicPag=[];
        for($i = 0; $i <count($array10); $i++){
            $volantino[$i]=Volantino::where(['id_canale' => $array10[$i]])
            // ->whereMonth('data_inizio', '=', 10) 
            ->whereMonth('data_inizio', '=', 9)
            ->count();
            $pagine[$i] = Pagina::where(['id_parent' => $array10[$i]])
            ->whereMonth('data_visita', '=', 9)
            ->select(DB::raw("data_visita, CAST(SUM(pagina_qta) AS UNSIGNED) AS sommaP, CAST(SUM(pagina_unica_qta) AS UNSIGNED) AS unicheP, SUM(pagina_desktop_qta) AS pDq, SUM(pagina_mobile_qta) AS pMq, SUM(pagina_desktop_unica_qta) AS pDuQ, SUM(pagina_mobile_unica_qta) AS pMuQ, MONTH(data_visita) AS mese"))
            ->groupBy('data_visita')
            // ->orderBy('data_visita', 'ASC')
            ->get();
            //dd($pagine);
            for( $j=0; $j<count($pagine[$i]); $j++ ){
                $arrayTotPag = array_merge($arrayTotPag, array( $pagine[$i][$j]->sommaP));
                $arrayUnicPag = array_merge($arrayUnicPag, array($pagine[$i][$j]->unicheP));
                $arrayGiorniPag = array_merge($arrayGiorniPag, array($pagine[$i][$j]->data_visita));
                $arrayDesktopPag = array_merge($arrayDesktopPag, array($pagine[$i][$j]->pDq));
                $arrayMobilePag = array_merge($arrayMobilePag, array($pagine[$i][$j]->pMq));
                $arrayDesktopUnicPag = array_merge($arrayDesktopUnicPag, array($pagine[$i][$j]->pDuQ));
                $arrayMobileUnicPag = array_merge($arrayMobileUnicPag, array($pagine[$i][$j]->pMuQ));
            }
                $sommaMobileUnicPag = array_sum($arrayMobileUnicPag);
                $sommaDesktopPag=array_sum($arrayDesktopPag);
                $sommaDesktopUnicPag=array_sum($arrayDesktopUnicPag);
                $sommaMobilePag=array_sum($arrayMobilePag);
        }    
        //dd($arrayTotPag);
        //dd($id_vol[0]->id_volantino);
        $volantinoSum=array_sum($volantino);
        $arrayGiorniPag = array_unique($arrayGiorniPag);
        $index = count($arrayGiorniPag);
        //dd($arrayTotPag);
        if(count($array10)>1){ // COSI ANCHE SE SCELGO UN SOLO MARKET NON MI ANDR° IN ERRORE!!!
            for($i=0; $i<count($arrayTotPag); $i++) {
                if(isset($arrayGiorniPag[$i+$index])){
                    $arrayTotPag[$i]=$arrayTotPag[$i]+$arrayTotPag[$i+$index];
                    $arrayUnicPag[$i]=$arrayUnicPag[$i]+$arrayUnicPag[$i+$index];
                   
            
                }else{
                    $arrayTotPag[$i]=$arrayTotPag[$i]+0;
                    $arrayUnicPag[$i]=$arrayUnicPag[$i]+0;
                }
            }
        }
        ////////////////// FINE PAGINE /////////////////////////

        ////////////////////// INTERATTIVI \\\\\\\\\\\\\\\\\\\\\\\\\\\  

        $arrRicette=[];
        $arrVideo=[];
        $arrCuriosita=[];
        $arrlink=[];
        $arrVai_a=[];
        $arrEcommerce=[];
        $arrProdotti=[]; 
        for($i = 0; $i <count($array10); $i++){
            $interattivo[$i] = Interattivi::groupBy('tipo' ,'id_prodotto', )
                ->where(['id_parent' => $array10[$i]])
                ->whereMonth('data_visita', '=', 9)
                ->select(DB::raw("SUM(qta) AS somma"), 'tipo' ,'id_prodotto',)
                ->orderBy('id_prodotto', 'ASC')
                ->get();
            //dd($interattivo);
            for ($j = 0; $j < count($interattivo[$i]); $j++ ){
                if($interattivo[$i][$j]->tipo=='prodotto'){
                    $arrProdotti=array_merge($arrProdotti, array($interattivo[$i][$j]->somma));
                }
                if($interattivo[$i][$j]->tipo=='curiosita'){
                    $arrCuriosita=array_merge($arrCuriosita, array($interattivo[$i][$j]->somma));
                }
                if($interattivo[$i][$j]->tipo=='collegamento'){
                    $arrlink=array_merge($arrlink, array($interattivo[$i][$j]->somma));
                }
                if($interattivo[$i][$j]->tipo=='ricetta'){
                    $arrRicette=array_merge($arrRicette, array($interattivo[$i][$j]->somma));
                }
                if($interattivo[$i][$j]->tipo=='vai_a'){
                    $arrVai_a=array_merge($arrVai_a, array($interattivo[$i][$j]->somma));
                }
                if($interattivo[$i][$j]->tipo=='video'){
                    $arrVideo=array_merge($arrVideo, array($interattivo[$i][$j]->somma));
                }
                if($interattivo[$i][$j]->tipo=='ecommerce'){
                $arrEcommerce=array_merge($arrEcommerce, array($interattivo[$i][$j]->somma));
                }
            }
        }
        //dd($arrlink);
        $sommaCuriosita=array_sum($arrCuriosita);
        $sommaCollegamenti=array_sum($arrlink);
        $sommaRicette=array_sum($arrRicette);
        $sommaVai_a=array_sum($arrVai_a);
        $sommaVideo=array_sum($arrVideo);
        $sommaEcommerce=array_sum($arrEcommerce);
        $sommaProdotti=array_sum($arrProdotti);
        //dd($sommaProdotti);
        //query per grafico interattivi $arrayTot[$i] = $visits[$i]->visite_qta;
       
        //dd($arrayGiorni2);
        $arrayGiorni2 = [];
        $arrayCuriosita =[];
        $arrayprodotti = [];
        $arrayEcommerce=[];
        $arrayVideo=[];
        $arrayLink=[];
        $arrayRicette=[];
        $arrayVai_a=[];
        for($i = 0; $i <count($array10); $i++){
            $interattivoDay[$i] = Interattivi::groupBy('data_visita',)
            ->where(['id_parent' => $array10[$i]])
            ->whereMonth('data_visita', '=', 9)
            ->select(DB::raw("SUM(qta) AS somma"),'data_visita')
            ->orderBy('data_visita', 'ASC')
            ->get();
            //dd($interattivoDay[2]->data_visita);
            for( $j=0; $j<count($interattivoDay[$i]); $j++ ){
                $arrayGiorni2 = $interattivoDay[$i][$j]->data_visita;
            }
            $interattivo2[$i] = Interattivi::groupBy('data_visita', 'tipo')
                ->where(['id_parent' => $array10[$i]])
                ->whereMonth('data_visita', '=', 9)
                ->select(DB::raw("SUM(qta) AS somma"),'data_visita', 'tipo')
                ->orderBy('data_visita', 'ASC')
                ->get();
            //dd($interattivo2);
            for ($j=0; $j<count($interattivo2[$i]); $j++){
                if($interattivo2[$i][$j]->tipo=='curiosita'){
                    $arrayCuriosita=$interattivo2[$i][$j];
                }
                if($interattivo2[$i][$j]->tipo=='prodotto'){
                    $arrayprodotti=$interattivo2[$i][$j];
                }
                if($interattivo2[$i][$j]->tipo=='ecommerce'){
                    $arrayEcommerce=$interattivo2[$i][$j];
                }
                if($interattivo2[$i][$j]->tipo=='video'){
                    $arrayVideo=$interattivo2[$i][$j];
                }
                if($interattivo2[$i][$j]->tipo=='collegamento'){
                    $arrayLink=$interattivo2[$i][$j];
                }
                if($interattivo2[$i][$j]->tipo=='ricetta'){
                    $arrayRicette=$interattivo2[$i][$j];
                }
                if($interattivo2[$i][$j]->tipo=='vai_a'){
                    $arrayVai_a=$interattivo2[$i][$j];
                }
                
            }
        }
        //dd($interattivo2);


        $id = Auth::id();
        //dd($id);
        $negozi = Negozio::all();
        $nome = Negozio::where(['id' => $id])
        ->get();
        //dd($nome);
        $markets = Market::where(['id_parent' => $id])->get();
        //dd($markets);
        $arrMark = [];
        for ( $i=0; $i<count($markets); $i++ ){
            $arrMark[$i]=$markets[$i]->id;
        }
        
        //dd($markets[0]->id);
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
      
        $interattivo3 = Interattivi::groupBy('seriale','tipo' )
            ->where(['id_parent' => 75])
            ->whereMonth('data_visita', '=', $mutable)
            ->select(DB::raw("SUM(qta) AS sommaQta ,SUM(qta_unici) AS sommaUnici" ),'seriale','tipo')
            ->orderBy('sommaQta', 'ASC')
            ->get();
        
        
        
    

        $arrTot =[];
        for($i = 0; $i <count($array10); $i++){
            $finale[$i] = DB::table('history_interattivi')
                ->where(['id_parent' => $array10[$i]])
                ->whereMonth('data_visita', '=', 9)
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
            
            for($j=0; $j<count($finale[$i]); $j++){
                    $arrTot = array_merge($arrTot, array($finale[$i][$j]->sommaUnici)); 
                }
        }
        $sommaInter = array_sum($arrTot);
        //dd($sommaInter);
    
        //////////////////// FINE INTERATTIVI \\\\\\\\\\\\\\\\\\\\\\\\\\
        //////INIZIO PRODOTTI||||||||||||||||
        $arrTotale =[];
        
        for($i = 0; $i <count($array10); $i++){
            $products[$i] = DB::table('history_interattivi')
                // ->whereMonth('data_visita', '=', $request->dataInizio)
                ->whereMonth('data_visita', '=', 9)
                ->where(['id_parent' => $array10[$i]])
                ->where(['tipo' => "prodotto"])
                ->where('prodotti.descrizione', '!=', "")
                ->join('prodotti', 'prodotti.seriale', '=', 'history_interattivi.seriale')
                ->groupBy('seriale', 'descrizione', 'descrizione_estesa')
                ->select(DB::raw("SUM(qta) AS sommaQta ,SUM(qta_unici) AS sommaUnici" ),'prodotti.seriale','prodotti.descrizione', 'prodotti.descrizione_estesa')
                ->get();
                //dd($products);
            
            for($j=0; $j<count($products[$i]); $j++){
                $arrTotale = array_merge($arrTotale, array($products[$i][$j]->sommaUnici)); 
            }
            
            // dd($arrTotale);
            // dd(count($arrTotale));
        }
        $sommaPr = array_sum($arrTotale);
        return view('/dashboard/intel_marketing_dashboard', compact('datiGrafico','pagine','arrayMesi','visits','arrayDesktop','arrayMobile','arrTotale','volantinoSum','sommaProdotti', 'sumD', 'sumM', 'sumDu', 'sumMu', 'sumVtot', 'sumVuni','riepilogoInterattivi','interattivoProdotti','interattivoRicette','interattivoVideo','interattivoCuriosita','interattivoLink' ,'riepilogoVisualizzazioni' ,'riepilogoConnessioni' ,'sommaPr','sommaInter' ,'products','finale' , 'interattivo3' ,'interattivo2','arrayVai_a','arrayRicette','arrayLink' ,'arrayVideo' ,'arrayEcommerce' ,'arrayCuriosita','arrayGiorni2','arrayprodotti','sommaEcommerce','sommaVideo','sommaVai_a','sommaRicette','sommaCollegamenti', 'sommaCuriosita','volantino' ,'datiGrafico' ,'arrUniche' ,'arrTotali' ,'arrRegioni' ,'sommaMobileUnicPag','sommaDesktopUnicPag' ,'sommaMobilePag','sommaDesktopPag','arrayTotPag','arrayUnicPag','arrayGiorniPag','arrMark','negozi', 'markets','id', 'promozioni','arrayPromo','marketsAll','nome', 'arrayTot','arrayUniq', 'arrayGiorni','sommaDesktop','sommaMobile','sommaUnicaDesktop','sommaUnicaMobile'));
    }



      /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function datiNuovi(Request $request )
    {
        $array10 = explode(',',$request->negozi);
        $arrayG = explode(',',$request->genitori);
        $data1 = $request->dataScelta;
        $data2 = $request->dataFine;
        $mese = $request->mese;
        //dd($arrayG);
        
        $mutable = Carbon::now()->month;
        //dd($mutable);
        $arrayD =[];
        $arrayM =[];
        $arrayDu =[];
        $arrayMu =[];
        
        for($i = 0; $i <count($array10); $i++){
            $riepilogoConnessioni[$i] = Visite::groupBy('id_market','id_parent',)         //////////// FARE DELLE SOMME TOTALI DI TUTTI I MARKET //////////
                // ->whereMonth('data_visita', '=', $request->dataInizio)                   //////////// DEVO DARGLI ANCHE L'ID PARENT //////////////////////
                ->whereBetween('data_visita', [$data1, $data2])                           //////////// FARE UN ALTRO FOR SU UN ARRAY SUI GENITORI /////////
                ->where(['history_visit.id_market' => $array10[$i]])
                ->join('elenco_market', 'elenco_market.id', '=', 'history_visit.id_market')
                ->join('users', 'users.id', '=', 'elenco_market.id_parent')
                ->select(DB::raw("SUM(visite_desktop_qta) AS desktop, SUM(visite_mobile_qta) AS mobile, SUM(visite_uniche_desktop_qta) AS deskUni, SUM(visite_uniche_mobile_qta) AS mobUni"), 'history_visit.id_market', 'history_visit.id_volantino','elenco_market.nome AS nomeMarket','elenco_market.id_parent','users.nome')
                ->orderBy('id_market', 'ASC')
                ->get();
                //dd($riepilogoConnessioni);
                
                for($j=0; $j<count($riepilogoConnessioni[$i]); $j++) {
                    
                        ///////////////////////////// PROVARE A FARE LE SOMME NEL BLADE ////////////////////////////
                            $arrayD =  array_merge($arrayD, array( $riepilogoConnessioni[$i][$j]->desktop));
                            $arrayM =  array_merge($arrayM, array($riepilogoConnessioni[$i][$j]->mobile));
                            $arrayDu =  array_merge($arrayDu, array($riepilogoConnessioni[$i][$j]->deskUni));
                            $arrayMu =  array_merge($arrayMu, array($riepilogoConnessioni[$i][$j]->mobUni));
                        
                    
                }
            $sumD = array_sum($arrayD);     
            $sumM = array_sum($arrayM);
            $sumDu = array_sum($arrayDu);
            $sumMu = array_sum($arrayMu);
        }
        //dd($arrayD);
        //dd($riepilogoConnessioni);
        $arrVtot =[];
        $arrVuni =[];
        for($i = 0; $i <count($array10); $i++){
            $riepilogoVisualizzazioni[$i] = Pagina::groupBy('id_market', 'id_parent')    //////////////////////// BISOGNERA FARE UN ALTRO FOREACH NEL BLADE !!!!!!!!!!! ///////////////
                // ->whereMonth('data_visita', '=', $request->dataInizio)
                ->whereBetween('data_visita', [$data1, $data2])
                ->where(['history_pagine.id_market' => $array10[$i]])
                ->join('elenco_market', 'elenco_market.id', '=', 'history_pagine.id_market')
                ->join('users', 'users.id', '=', 'elenco_market.id_parent')
                ->select(DB::raw("SUM(pagina_desktop_qta) + SUM(pagina_mobile_qta) AS totali, SUM(pagina_unica_qta) AS uniche "), 'history_pagine.id_market','elenco_market.nome AS nomeMarket','elenco_market.id_parent','users.nome')
                ->orderBy('id_market', 'ASC')
                ->get();
                //dd($riepilogoVisualizzazioni);
            
            for ($j=0; $j<count($riepilogoVisualizzazioni[$i]); $j++ ){
                $arrVtot = array_merge($arrVtot, array($riepilogoVisualizzazioni[$i][$j]->totali));
                $arrVuni = array_merge($arrVuni, array($riepilogoVisualizzazioni[$i][$j]->uniche));
            }
            $sumVtot = array_sum($arrVtot);
            $sumVuni = array_sum($arrVuni);
        }//dd($riepilogoVisualizzazioni);
        for($i = 0; $i <count($array10); $i++){
            $riepilogoInterattivi[$i]= Interattivi::groupBy('id_market', )
            ->whereBetween('data_visita', [$data1, $data2])
            ->where(['id_market' => $array10[$i]])
            // ->groupBy(DB::raw("tipo"))
            ->select(DB::raw("SUM(CASE WHEN tipo = 'ricetta' THEN qta ELSE 0 END) AS totaliR,SUM(CASE WHEN tipo = 'video' THEN qta ELSE 0 END) AS totaliV,SUM(CASE WHEN tipo = 'prodotto' THEN qta ELSE 0 END) AS totaliP,SUM(CASE WHEN tipo = 'curiosita' THEN qta ELSE 0 END) AS totaliCu,SUM(CASE WHEN tipo = 'collegamento' THEN qta ELSE 0 END) AS totaliC"),'id_market','id_parent' )
            ->groupBy(DB::raw("id_parent"))
            ->orderBy('id_market', 'ASC')
            ->get();
        }//dd($riepilogoInterattivi);
        $interattivoProdotti =Interattivi::groupBy('id_market', 'tipo')   
            ->whereMonth('data_visita', '=', $request->dataInizio)
            ->where(['id_parent' => 75])
            ->where(['tipo' => "prodotto"])
            ->select(DB::raw("SUM(qta) AS totali"), 'id_market', 'tipo')
            ->orderBy('id_market', 'ASC')
            ->get();
            //dd($interattivoProdotti);
        $interattivoRicette =Interattivi::groupBy('id_market', 'tipo')
            ->whereMonth('data_visita', '=', $request->dataInizio)
            ->where(['id_parent' => 75])
            ->where(['tipo' => "ricetta"])
            ->select(DB::raw("SUM(qta) AS totali"), 'id_market', 'tipo')
            ->orderBy('id_market', 'ASC')
            ->get();
            //dd($interattivoRicette);
        $interattivoVideo =Interattivi::groupBy('id_market', 'tipo')
            ->whereMonth('data_visita', '=', $request->dataInizio)
            ->where(['id_parent' => 75])
            ->where(['tipo' => "video"])
            ->select(DB::raw("SUM(qta) AS totali"), 'id_market', 'tipo')
            ->orderBy('id_market', 'ASC')
            ->get();
            //dd($interattivoVideo);
        $interattivoCuriosita =Interattivi::groupBy('id_market', 'tipo')
            ->whereMonth('data_visita', '=', $request->dataInizio)
            ->where(['id_parent' => 75])
            ->where(['tipo' => "curiosita"])
            ->select(DB::raw("SUM(qta) AS totali"), 'id_market', 'tipo')
            ->orderBy('id_market', 'ASC')
            ->get();
            //dd($interattivoCuriosita);
        $interattivoLink =Interattivi::groupBy('id_market', 'tipo')
            ->whereMonth('data_visita', '=', $request->dataInizio)
            ->where(['id_parent' => 75])
            ->where(['tipo' => "collegamento"])
            ->select(DB::raw("SUM(qta) AS totali"), 'id_market', 'tipo')
            ->orderBy('id_market', 'ASC')
            ->get();
            //dd($interattivoLink);
        ///////////////////   GRAFICI PARTE CONNESSIONI //////////////////////
        $arrayTot = [];
        $arrayUniq = [];
        $arrayGiorni = [];
        $arrayMesi=[];
        $arrayDesktop=[];
        $arrayMobile=[];
        $arrayDesktopUniq=[];
        $arrayMobileUniq=[];
        // GRAFICO ANDAMENTO GIORNALIERO
        for($i = 0; $i <count($array10); $i++){
            $visits[$i] = Visite::where(['id_market' => $array10[$i]])
            ->whereBetween('data_visita', [$data1, $data2])
            ->select(DB::raw("data_visita, CAST(SUM(visite_qta) AS UNSIGNED) AS sommaV, CAST(SUM(visite_uniche_qta) AS UNSIGNED) AS unicheV, SUM(visite_desktop_qta) AS vDq, SUM(visite_mobile_qta) AS vMq, SUM(visite_uniche_desktop_qta) AS vDuQ, SUM(visite_uniche_mobile_qta) AS vMuQ, MONTH(data_visita) AS mese"))
            ->groupBy(DB::raw('data_visita'))
            // ->orderBy('data_visita', 'ASC')
            ->get();
            //dd($visits); //Visite
        
            for( $j=0; $j<count($visits[$i]); $j++ ){ //////////// PROVARE A FARE DEGLI IF PER SOMMARE PER GIORNI /////////// E PER MESI //////////
                $arrayTot = array_merge($arrayTot, array($visits[$i][$j]->sommaV));
                $arrayUniq = array_merge($arrayUniq, array($visits[$i][$j]->unicheV));                                 
                $arrayGiorni = array_merge($arrayGiorni, array($visits[$i][$j]->data_visita));
                $arrayMesi = array_merge($arrayMesi, array($visits[$i][$j]->mese));
                $arrayDesktop = array_merge($arrayDesktop, array($visits[$i][$j]->vDq));
                $arrayMobile = array_merge($arrayMobile, array($visits[$i][$j]->vMq));
                $arrayDesktopUniq = array_merge($arrayDesktopUniq, array($visits[$i][$j]->vDuQ));
                $arrayMobileUniq = array_merge($arrayMobileUniq, array($visits[$i][$j]->vMuQ));
            }
            //dd($arrayTot);
            $sommaMobile=array_sum($arrayMobile);            
            $sommaDesktop=array_sum($arrayDesktop);
            $sommaUnicaDesktop=array_sum($arrayDesktopUniq);
            $sommaUnicaMobile=array_sum($arrayMobileUniq);
        }
        //dd($visits);
        //dd($arrayTot);
        $arrayGiorni = array_unique($arrayGiorni);
        $arrayMesi = array_unique($arrayMesi);
        $index = count($arrayGiorni);
        for($i=0; $i<count($arrayTot); $i++) {
            if(isset($arrayGiorni[$i+$index])){
            $arrayTot[$i]=$arrayTot[$i]+$arrayTot[$i+$index];
            $arrayUniq[$i]=$arrayUniq[$i]+$arrayUniq[$i+$index];
            $arrayDesktop[$i]=$arrayDesktop[$i]+$arrayDesktop[$i+$index];
            $arrayMobile[$i]=$arrayMobile[$i]+$arrayMobile[$i+$index];
            }else{
                $arrayTot[$i]=$arrayTot[$i]+0;
                $arrayUniq[$i]=$arrayUniq[$i]+0;
                $arrayDesktop[$i]=$arrayDesktop[$i]+0;
                $arrayMobile[$i]=$arrayMobile[$i]+0;
            }
        }//dd($arrayTot);
       
        // FINE GRAFICO

        $arrUniche=[];
        $arrTotali=[];
        $arrRegioni=[];
        for($i = 0; $i <count($array10); $i++){
            $datiGrafico[$i] = Geo::groupBy('place')
            ->where(['id_market' => $array10[$i]])
            ->whereBetween('data_visita', [$data1, $data2])
            // ->whereMonth('data_visita', '=', $request->dataInizio)
            ->select(DB::raw("CAST(SUM(visite_region_qta) AS UNSIGNED) AS somma, SUM(visite_uniche_region_qta) AS uniche"), 'place')
            ->orderBy('somma', 'DESC')
            ->get();
            //dd($datiGrafico);
            
            for ($j = 0; $j < count($datiGrafico[$i]); $j++ ){
                $arrUniche= array_merge($arrUniche, array($datiGrafico[$i][$j]->uniche));
                $arrTotali= array_merge($arrTotali, array($datiGrafico[$i][$j]->somma));
                $arrRegioni= array_merge($arrRegioni, array($datiGrafico[$i][$j]->place));
            }
        }
        //dd($datiGrafico);
        //dd($arrUniche);
        $arrRegioni = array_unique($arrRegioni);
        $index = count($arrRegioni);
        for($i=0; $i<count($arrRegioni)-1; $i++) {
            if(isset($arrRegioni[$i+$index])){
            $arrTotali[$i]=$arrTotali[$i]+$arrTotali[$i+$index];
            $arrUniche[$i]=$arrUniche[$i]+$arrUniche[$i+$index];
            }else{
                $arrTotali[$i]=$arrTotali[$i]+0;
                $arrUniche[$i]=$arrUniche[$i]+0;
            }
        }//dd($arrTotali);
        ////////////////// FINE CONNESSIONI ///////////////////////
       
        ////////////////// GRAFICI PAGINE ///////////////////
        
        $arrayTotPag=[];
        $arrayUnicPag=[];
        $arrayGiorniPag = [];
        $arrayDesktopPag=[];
        $arrayMobilePag=[];
        $arrayDesktopUnicPag=[];
        $arrayMobileUnicPag=[];
        for($i = 0; $i <count($array10); $i++){
            $volantino[$i]=Volantino::where(['id_subcanale' => $array10[$i]])
            // ->whereMonth('data_inizio', '=', 10) 
            ->where('data_inizio','<' ,$data2)
            ->where('data_fine', '>' ,$data1)
            ->count();
            $pagine[$i] = Pagina::where(['id_market' => $array10[$i]])
            // ->whereMonth('data_visita', '=', $request->mese)
            ->whereBetween('data_visita', [$data1, $data2])
            ->select(DB::raw("data_visita, CAST(SUM(pagina_qta) AS UNSIGNED) AS sommaP, CAST(SUM(pagina_unica_qta) AS UNSIGNED) AS unicheP, SUM(pagina_desktop_qta) AS pDq, SUM(pagina_mobile_qta) AS pMq, SUM(pagina_desktop_unica_qta) AS pDuQ, SUM(pagina_mobile_unica_qta) AS pMuQ, MONTH(data_visita) AS mese"))
            ->groupBy('data_visita')
            // ->orderBy('data_visita', 'ASC')
            ->get();
            //dd($volantino);
            for( $j=0; $j<count($pagine[$i]); $j++ ){
                $arrayTotPag = array_merge($arrayTotPag, array( $pagine[$i][$j]->sommaP));
                $arrayUnicPag = array_merge($arrayUnicPag, array($pagine[$i][$j]->unicheP));
                $arrayGiorniPag = array_merge($arrayGiorniPag, array($pagine[$i][$j]->data_visita));
                $arrayDesktopPag = array_merge($arrayDesktopPag, array($pagine[$i][$j]->pDq));
                $arrayMobilePag = array_merge($arrayMobilePag, array($pagine[$i][$j]->pMq));
                $arrayDesktopUnicPag = array_merge($arrayDesktopUnicPag, array($pagine[$i][$j]->pDuQ));
                $arrayMobileUnicPag = array_merge($arrayMobileUnicPag, array($pagine[$i][$j]->pMuQ));
            }
            //dd($arrayTotPag);
                $sommaMobileUnicPag = array_sum($arrayMobileUnicPag);
                $sommaDesktopPag=array_sum($arrayDesktopPag);
                $sommaDesktopUnicPag=array_sum($arrayDesktopUnicPag);
                $sommaMobilePag=array_sum($arrayMobilePag);
        }
        //dd($volantino);
        //dd($pagine);
        $volantinoSum=array_sum($volantino);
        $arrayGiorniPag = array_unique($arrayGiorniPag);
        $index = count($arrayGiorniPag);
        //dd($arrayTotPag);
        if(count($array10)>1){ // COSI ANCHE SE SCELGO UN SOLO MARKET NON MI ANDR° IN ERRORE!!!
            for($i=0; $i<count($arrayTotPag); $i++) {
                if(isset($arrayGiorniPag[$i+$index])){
                    $arrayTotPag[$i]=$arrayTotPag[$i]+$arrayTotPag[$i+$index];
                    $arrayUnicPag[$i]=$arrayUnicPag[$i]+$arrayUnicPag[$i+$index];
                   
            
                }else{
                    $arrayTotPag[$i]=$arrayTotPag[$i]+0;
                    $arrayUnicPag[$i]=$arrayUnicPag[$i]+0;
                }
            }
        }//dd($arrayTotPag);
        
        ////////////////// FINE PAGINE /////////////////////////

        ////////////////////// INTERATTIVI \\\\\\\\\\\\\\\\\\\\\\\\\\\  
        $arrRicette=[];
        $arrVideo=[];
        $arrCuriosita=[];
        $arrlink=[];
        $arrVai_a=[];
        $arrEcommerce=[];
        $arrProdotti=[];
        for($i = 0; $i <count($array10); $i++){
            $interattivo[$i] = Interattivi::groupBy('tipo' ,'id_prodotto', )
            ->where(['id_market' => $array10[$i]])
            ->whereBetween('data_visita', [$data1, $data2])
            // ->whereMonth('data_visita', '=', $request->dataInizio)
            ->select(DB::raw("SUM(qta) AS somma"), 'tipo' ,'id_prodotto',)
            ->orderBy('id_prodotto', 'ASC')
            ->get();
            //dd($interattivo[0][0]->tipo);
            
            for ($j = 0; $j < count($interattivo[$i]); $j++ ){
                if($interattivo[$i][$j]->tipo=='prodotto'){
                    $arrProdotti=array_merge($arrProdotti, array($interattivo[$i][$j]->somma));
                }
                if($interattivo[$i][$j]->tipo=='curiosita'){
                    $arrCuriosita=array_merge($arrCuriosita, array($interattivo[$i][$j]->somma));
                }
                if($interattivo[$i][$j]->tipo=='collegamento'){
                    $arrlink=array_merge($arrlink, array($interattivo[$i][$j]->somma));
                }
                if($interattivo[$i][$j]->tipo=='ricetta'){
                    $arrRicette=array_merge($arrRicette, array($interattivo[$i][$j]->somma));
                }
                if($interattivo[$i][$j]->tipo=='vai_a'){
                    $arrVai_a=array_merge($arrVai_a, array($interattivo[$i][$j]->somma));
                }
                if($interattivo[$i][$j]->tipo=='video'){
                    $arrVideo=array_merge($arrVideo, array($interattivo[$i][$j]->somma));
                }
                if($interattivo[$i][$j]->tipo=='ecommerce'){
                $arrEcommerce=array_merge($arrEcommerce, array($interattivo[$i][$j]->somma));
                }
            }
        }
        $sommaCuriosita=array_sum($arrCuriosita);
        $sommaCollegamenti=array_sum($arrlink);
        $sommaRicette=array_sum($arrRicette);
        $sommaVai_a=array_sum($arrVai_a);
        $sommaVideo=array_sum($arrVideo);
        $sommaEcommerce=array_sum($arrEcommerce);
        $sommaProdotti=array_sum($arrProdotti);
        //dd($arrlink);
        

        //query per grafico interattivi $arrayTot[$i] = $visits[$i]->visite_qta;
        $arrayCuriosita =[];
        $arrayprodotti = [];
        $arrayEcommerce=[];
        $arrayVideo=[];
        $arrayLink=[];
        $arrayRicette=[];
        $arrayVai_a=[];
        $arrayGiorni2 = [];
        for($i = 0; $i <count($array10); $i++){
            $interattivo2[$i] = Interattivi::groupBy('data_visita', 'tipo')
                ->where(['id_market' => $array10[$i]])
                ->whereBetween('data_visita', [$data1, $data2])
                ->select(DB::raw("SUM(qta) AS somma"),'data_visita', 'tipo')
                ->orderBy('data_visita', 'ASC')
                ->get();
            //dd($interattivo2);
            $interattivoDay[$i] = Interattivi::groupBy('data_visita',)
                ->where(['id_market' => $array10[$i]])
                ->whereBetween('data_visita', [$data1, $data2])
                ->select(DB::raw("SUM(qta) AS somma"),'data_visita')
                ->orderBy('data_visita', 'ASC')
                ->get();
            for( $j=0; $j<count($interattivoDay[$i]); $j++ ){
                $arrayGiorni2 = $interattivoDay[$i][$j]->data_visita;
            }
            //dd($arrayGiorni2);
            for ($j=0; $j<count($interattivo2[$i]); $j++){
                if($interattivo2[$i][$j]->tipo=='curiosita'){
                    $arrayCuriosita=$interattivo2[$i][$j];
                    
                }
                if($interattivo2[$i][$j]->tipo=='prodotto'){
                    $arrayprodotti=$interattivo2[$i][$j];
                }
                if($interattivo2[$i][$j]->tipo=='ecommerce'){
                    $arrayEcommerce=$interattivo2[$i][$j];
                }
                if($interattivo2[$i][$j]->tipo=='video'){
                    $arrayVideo=$interattivo2[$i][$j];
                }
                if($interattivo2[$i][$j]->tipo=='collegamento'){
                    $arrayLink=$interattivo2[$i][$j];
                }
                if($interattivo2[$i][$j]->tipo=='ricetta'){
                    $arrayRicette=$interattivo2[$i][$j];
                }
                if($interattivo2[$i][$j]->tipo=='vai_a'){
                    $arrayVai_a=$interattivo2[$i][$j];
                }
            }
        }//dd($interattivo2);


        $id = Auth::id();
        //dd($id);
        $negozi = Negozio::all();
        $nome = Negozio::where(['id' => $id])
        ->get();
        //dd($nome);
        $markets = Market::where(['id_parent' => $id])->get();
        //dd($markets);
        $arrMark = [];
        for ( $i=0; $i<count($markets); $i++ ){
            $arrMark[$i]=$markets[$i]->id;
        }
        
        //dd($markets[0]->id);
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
      
        $interattivo3 = Interattivi::groupBy('seriale','tipo' )
            ->where(['id_parent' => 75])
            ->whereMonth('data_visita', '=', $request->dataInizio)
            ->select(DB::raw("SUM(qta) AS sommaQta ,SUM(qta_unici) AS sommaUnici" ),'seriale','tipo')
            ->orderBy('sommaQta', 'ASC')
            ->get();
        
        
        
    
            // dd($prodotti);

            
                
        $arrTot =[];     
        for($i = 0; $i <count($array10); $i++){            
            $finale[$i] = DB::table('history_interattivi')
                ->where(['id_market' => $array10[$i]])
                ->whereBetween('data_visita', [$data1, $data2])
                // ->whereMonth('data_visita', '=', $request->dataInizio)
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
           
            for($j=0; $j<count($finale[$i]); $j++){
                    $arrTot = array_merge($arrTot,array($finale[$i][$j]->sommaUnici)); 
                }
        }
        $sommaInter = array_sum($arrTot);
        //dd($sommaInter);
    
        //////////////////// FINE INTERATTIVI \\\\\\\\\\\\\\\\\\\\\\\\\\
        //////INIZIO PRODOTTI///////////////
        $arrTotale =[];
        for($i = 0; $i <count($array10); $i++){
            $products[$i] = DB::table('history_interattivi')
                // ->whereMonth('data_visita', '=', $request->dataInizio)
                ->whereBetween('data_visita', [$data1, $data2])
                ->where(['id_market' => $array10[$i]])
                ->where(['tipo' => "prodotto"])
                ->where('prodotti.descrizione', '!=', "")
                ->join('prodotti', 'prodotti.seriale', '=', 'history_interattivi.seriale')
                ->groupBy('seriale', 'descrizione', 'descrizione_estesa')
                ->select(DB::raw("SUM(qta) AS sommaQta ,SUM(qta_unici) AS sommaUnici" ),'prodotti.seriale','prodotti.descrizione', 'prodotti.descrizione_estesa')
                ->get();
                //dd($products);
            
            for($j=0; $j<count($products[$i]); $j++){
                $arrTotale = array_merge($arrTotale, array($products[$i][$j]->sommaUnici)); 
            }
            // dd($arrTotale);
            // dd(count($arrTotale));
        }
        $sommaPr = array_sum($arrTotale);
        return view('/dashboard/intel_marketing_dashboard', compact('pagine','visits','arrayMobile','arrayDesktop','arrayDesktopUniq','arrayMobileUniq','arrayMesi','arrTotale','data2','data1','sommaProdotti', 'sumD', 'sumM', 'sumDu', 'sumMu', 'sumVtot', 'sumVuni','riepilogoInterattivi','interattivoProdotti','interattivoRicette','interattivoVideo','interattivoCuriosita','interattivoLink' ,'riepilogoVisualizzazioni' ,'riepilogoConnessioni' ,'sommaPr','sommaInter' ,'products','finale' , 'interattivo3' ,'interattivo2','arrayVai_a','arrayRicette','arrayLink' ,'arrayVideo' ,'arrayEcommerce' ,'arrayCuriosita','arrayGiorni2','arrayprodotti','sommaEcommerce','sommaVideo','sommaVai_a','sommaRicette','sommaCollegamenti', 'sommaCuriosita','volantinoSum' ,'datiGrafico' ,'arrUniche' ,'arrTotali' ,'arrRegioni' ,'sommaMobileUnicPag','sommaDesktopUnicPag' ,'sommaMobilePag','sommaDesktopPag','arrayTotPag','arrayUnicPag','arrayGiorniPag','arrMark','negozi', 'markets','id', 'promozioni','arrayPromo','marketsAll','nome', 'arrayTot','arrayUniq', 'arrayGiorni','sommaDesktop','sommaMobile','sommaUnicaDesktop','sommaUnicaMobile'));
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
