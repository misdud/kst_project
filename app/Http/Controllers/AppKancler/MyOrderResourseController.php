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
            $all_zakaz_user = Zakaz::select('id', 'zakazname', 'zakazactiv', 'dodate', 'created_at')->whereIn('id', $arr_zakaz)->latest()->paginate(10);
//            dump($arr_zakaz);
//            dump($all_zakaz_user);
              $all_count=$group->count();
            if (view()->exists('mylayouts.main.for_orders.my_orders_list')) {
                $otdel = $user->otdel->otdelfullname;
                //for user order list
                $formySwith = 15;
                return view('mylayouts.main.admin_page', compact('all_zakaz_user', 'formySwith', 'otdel','all_count'));
            }
        } else {
            $formySwith = 16;
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

        $user = Auth::user();
        $id_user = $user->id;
        $orders_user = Order::select('id', 'discriptorder', 'count', 'count_good', 'valid', 'user_id', 'created_at', 'zakaz_id')
                        ->where('zakaz_id', $id)
                        ->where('user_id', $id_user)->get();
        $otdel = $user->otdel->otdelfullname;
        if (view()->exists('mylayouts.main.for_orders.my_orders_in_zakaz')) {
            //for show my order in zakaz
            $formySwith = 18;
            return view('mylayouts.main.admin_page', compact('formySwith', 'otdel', 'orders_user'));
        } else {

            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        $user = Auth::user();
        $id_user = $user->id;
        $orders_zakaz = Order::select('id', 'discriptorder', 'count', 'count_good',  'valid', 'user_id', 'product_id', 'zakaz_id')
                        ->where('zakaz_id', $id)
                        ->where('user_id', $id_user)->latest()->get();
        $otdel = $user->otdel->otdelfullname;
        if (view()->exists('mylayouts.main.for_orders.my_orders_in_zakaz')) {
            //for show my order in zakaz
            $formySwith = 17;
            return view('mylayouts.main.admin_page', compact('formySwith', 'otdel', 'orders_zakaz'));
        } else {
            dump($orders_zakaz);
            exit();
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $order_count = Order::select('id', 'count','discriptorder')->where('id', $id)->first(); 
        if($order_count->count == $request->input('mycount')){
            return redirect()->back();
        }
        $order = Order::where('id', $id)->update([
            'count'=>$request->input('mycount'),
        ]);
        
        return redirect()->back()->with('msg2',$order_count->discriptorder);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id) {
        $product = Product::findOrFail($request->input('product_id'));
        Order::where('id', $id)->delete();
        return redirect()->back()->with('msg',$product->productname);
    }

}
