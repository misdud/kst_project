<?php

namespace App\Http\Controllers\AppKancler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\Otdel;
use App\Product;
use App\User;
use App\Zakaz;
use Auth;

class MyOrderResourseController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user = Auth::user();
        $id = $user->id;
        $my_list_orders = Order::select('id', 'zakaz_id', 'user_id')->where('user_id', $id)->get();
        if (!$my_list_orders->isEmpty()) {
            $group = $my_list_orders->groupBy('zakaz_id');

            $arr_zakaz = [];
            foreach ($group as $k => $grop) {
                $arr_zakaz[] .= $k;
            }
            $all_zakaz_user = Zakaz::select('id', 'zakazname','zakazactiv','dodate','created_at')->whereIn('id', $arr_zakaz)->latest()->paginate(10);
//            dump($arr_zakaz);
//            dump($all_zakaz_user);
            if(view()->exists('mylayouts.main.admin_page')){
                $otdel = $user->otdel->otdelfullname;
                //for user order list
                $formySwith=15;
                return view('mylayouts.main.admin_page', compact('all_zakaz_user', 'formySwith', 'otdel'));
            }
        } else {
            $formySwith=16;
            return view('mylayouts.main.admin_page', compact('formySwith'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        
        $user=Auth::user();
        $id_user=$user->id;
        $orders_zakaz = Order::select('id', 'discriptorder', 'count', 'valid', 'user_id', 'product_id', 'zakaz_id' )->where('zakaz_id', $id)
                ->where('user_id', $id_user)->get();
        dump($orders_zakaz);
        exit();
        
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
