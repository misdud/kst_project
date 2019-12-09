<?php

namespace App\Http\Controllers\AppKancler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Order;
use App\Zakaz;
use Auth;

class OrderController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $isset_zakaz = Zakaz::select('id', 'zakazactiv', 'dodate')->where('zakazactiv', 1)->first();
        if ($isset_zakaz != NULL) {
            $is_isset_zakaz = TRUE;
            $do_date_zakaz = $isset_zakaz->dodate;
        } else {
            $is_isset_zakaz = FALSE;
        }
        $is_isset_zakaz = Zakaz::select('zakazactiv')->where('zakazactiv', 1)->count();
        $products = Product::select('id', 'productname', 'units')->where('productactiv', 1)->orderBy('productname')->paginate(10);
        $product_count = Product::where('productactiv', 1)->count();

        if (view()->exists('mylayouts.main.admin_page')) {
            //for get all orders product
            $formySwith = 13;
            return view('mylayouts.main.admin_page', compact('products', 'formySwith', 'product_count', 'is_isset_zakaz', 'do_date_zakaz'));
        } else {
            abort(404);
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
        $isset_zakaz = Zakaz::select('id', 'zakazactiv')->where('zakazactiv', 1)->first();
        if ($isset_zakaz != NULL) {
            $data = $request->only('productname', 'count', 'product_id');
            $user = $request->user();
//                    dump((int)$data['product_id']);
//        exit();
            Order::create([
                'discriptorder' => $data['productname'],
                'count' => $data['count'],
                'user_id' => $user->id,
                'product_id' => (int)$data['product_id'],
                'zakaz_id' => $isset_zakaz->id,
                'otdel_id' => $user->otdel_id,
            ]);
            
            return redirect()->route('orders.index')->with('order', $data['productname']);
            
        } else {
            return redirect()->back();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $product = Product::findOrFail($id);
//        dump($product);
//        exit();
        $formySwith = 14;
        return view('mylayouts.main.admin_page', ['formySwith' => $formySwith, 'product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
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
