<?php

namespace App\Http\Controllers\AppKancler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Zakaz;
use App\Otdel;
use Auth;

class OrderOtdelController extends Controller {

    public function showList() {

        $user = Auth::user();
        $id_user = $user->id;
        $otdel_user = $user->otdel_id;

        $zakaz_list = Order::select('id', 'user_id', 'otdel_id', 'zakaz_id', 'created_at')
                        //->where('user_id', $id_user)
                        ->where('otdel_id', $otdel_user)
                        ->latest()->get();

//         $zakazs1 = Zakaz::find(3);
//                         $a=$zakazs1->orders()
//                        ->where('orders.user_id', $id_user)
//                        ->where('orders.otdel_id', $otdel_user)
//                        ->latest()->get();

        $list_group = $zakaz_list->groupBy('zakaz_id');

        $arr_group = [];
        foreach ($list_group as $k => $group) {
            $arr_group[] .= $k;
        }
        
        //кол всех        $zakazs = Zakaz::select('id', 'zakazname', 'zakazactiv', 'dodate', 'created_at')->whereIn('id', $arr_group)->latest()->paginate(5);
        $zakazs = Zakaz::select('id', 'zakazname', 'zakazactiv', 'dodate', 'created_at')->whereIn('id', $arr_group)->latest()->paginate(5);
        //$zakazs = Zakaz::select('id', 'zakazname', 'zakazactiv', 'dodate', 'created_at')->whereIn('id', $arr_group)->with('orders')->paginate(5);
        $otdel = Otdel::select('id', 'otdelfullname')->where('id', $otdel_user)->first();

        if(view()->exists('mylayouts.main.for_orders.otdel_order_list')){
            $formySwith = 19;
            return view('mylayouts.main.admin_page', compact('formySwith', 'otdel', 'zakazs', 'list_group' ));
        }else{
            return redirect()->back();
        }

    }
    
    public function showAllInZakaz($id_zakaz=0){
        
        $user = Auth::user();
        //$id_user = $user->id;
        $otdel_user = $user->otdel_id;
        $otd_user = $user->otdel->otdelfullname;
        $id_zak = $id_zakaz;
        
        $zakaz = Zakaz::findOrFail($id_zakaz);
        $zakaz_name = $zakaz->zakazname;
        $orders = $zakaz->orders()->where('otdel_id', $otdel_user)->with('user')->orderBy('created_at' ,'desc')->get();

//        $zakaz_list = Order::select('id', 'discriptorder', 'count','count_good',  'user_id', 'valid', 'otdel_id', 'zakaz_id', 'created_at')
//                        ->where('zakaz_id', $id_zak)
//                        ->where('otdel_id', $otdel_user)
//                        ->latest()->get();
        
        //dump($zakaz_list);
        if(view()->exists('mylayouts.main.for_orders.otdel_order_show')){
            
            $a=$orders->groupBy('product_id');
            dump($a);
            foreach ($a as $k=>$v){
                echo $v->count();
                foreach ($v as $v1){
                    echo $v1->discriptorder;
                }
                echo '<br>';
            }
            exit();

           //for show list orders in zakaz 
            $formySwith = 20;
            return view('mylayouts.main.admin_page', compact('formySwith', 'otd_user', 'orders' , 'zakaz_name' ));
        }else{
            abort('404');
        }
//        foreach ($orders as $v){
//            echo $v->user->name;
//        }
//        exit();

    }
    

}
