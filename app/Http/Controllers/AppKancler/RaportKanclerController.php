<?php

namespace App\Http\Controllers\AppKancler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

use App\Zakaz;

class RaportKanclerController extends Controller
{
    public function index(){
        
         //get ist all zakaz;
        $list_zakazs = Zakaz::with('orders')->orderBy('created_at', 'desc')->paginate(5);
        $list_zakazs_count = Zakaz::with('orders')->count();
        if (view()->exists('mylayouts.main.raport_kancler.all_list_zakazs')) {
            //for raport
            $formySwith = 25;
            return view('mylayouts.main.admin_page', compact('formySwith', 'list_zakazs', 'list_zakazs_count'));
        } else {
            abort('404');
        }
        
        
    }
    
        public function show($id_zakr) {
        $zakaz = Zakaz::findOrFail($id_zakr);
        $orders_zakaz = $zakaz->orders()->with('otdel')->get();
        $group_otdel_orders = $orders_zakaz->groupBy('otdel_id');

        if (view()->exists('mylayouts.main.raport_kancler.all_list_otdel_raport')) {
            $formySwith = 26;
            return view('mylayouts.main.admin_page', compact('formySwith', 'group_otdel_orders', 'zakaz'));
        } else {
            abort('404');
        }
    }
    
    public function showRaportOtdel($id_zak=0, $id_otdel=0){

        $zakaz = Zakaz::findOrFail($id_zak);
        $otdel_orders = $zakaz->orders()
                ->with('user', 'product')
                ->where('otdel_id', $id_otdel)
                ->orderBy('user_id')
                ->get();

        $zak_id = $zakaz->id;
        $orders = $zakaz->orders()->where('otdel_id', $id_otdel)->with('product')->orderBy('discriptorder')->get();
        $res = $orders->groupBy('discriptorder');

        if (view()->exists('mylayouts.main.raport_kancler.otdel_order_raport')) {
            
            $formySwith = 27;
            return view('mylayouts.main.admin_page', compact('formySwith', 'zakaz', 'otdel_orders', 'res'));
        } else {
            abort(404);
        }
    }
        
          public function showSvod($id_zakaz){
              
              $zakaz = Zakaz::findOrFail($id_zakaz);
              $orders_zakaz = $zakaz->orders()->with('product')
                      ->where('valid', 'yes')
                      ->where('count_good', '>', 0)
                      ->orderBy('product_id')
                      ->get();
              $group_orders = $orders_zakaz->groupBy('discriptorder');
              //dump($orders_zakaz);
              if(view()->exists('mylayouts.main.raport_kancler.show_svod')){
                  //for show svodn
                  $formySwith=28;
                  return view('mylayouts.main.admin_page', compact('formySwith', 'zakaz', 'orders_zakaz','group_orders'));
              }else{
                  abort(404);
              }
              
              
              
              dump($group_orders);
              //exit();
              
          }
    
        public function downloadSvodPDF($id_zak=0){


        $zakaz = Zakaz::findOrFail($id_zak);
        $zakaz_name = $zakaz->zakazname;
              $orders_zakaz = $zakaz->orders()->with('product')
                      ->where('valid', 'yes')
                      ->where('count_good', '>', 0)
                      ->orderBy('product_id')
                      ->get();

                $group_orders = $orders_zakaz->groupBy('discriptorder');
        
            if (view()->exists('mylayouts.main.raport_kancler.get_pdf_svodni')) {
                $pdf = PDF::loadView('mylayouts.main.raport_kancler.get_pdf_svodni', compact('formySwith', 'zakaz', 'orders_zakaz','group_orders'));
                $name ='Заказ_'.mb_strtolower($zakaz_name).'.pdf';
                $name_edit = str_replace(' ', '_', $name);
                PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
                return $pdf->stream($name_edit);
                //return $pdf->stream('Заказ_'.strtolower($otdel).'_'.strtolower($zakaz_name).'.pdf');
            } else {
                abort(404);
            }  
        } 
    
    
    
}
