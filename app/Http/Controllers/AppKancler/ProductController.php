<?php

namespace App\Http\Controllers\AppKancler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Gate;

class ProductController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if(Gate::denies('show_mang_kanc_admin')){
            return redirect()->route('no_access');
        }
        $products = Product::select('id', 'productname', 'units', 'productactiv')->orderBy('productname')->paginate(10);
        $product_count = Product::count();
//        dump($products);
//        exit();
        if (view()->exists('mylayouts.main.admin_page')) {
            //for get all list product
            $formySwith = 10;
            return view('mylayouts.main.admin_page', compact('products', 'formySwith', 'product_count'));
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
        if(Gate::denies('show_mang_kanc_admin')){
            return redirect()->route('no_access');
        }
        //for show form create
        $formySwith = 11;
        return view('mylayouts.main.admin_page', ['formySwith' => $formySwith]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
         if(Gate::denies('show_mang_kanc_admin')){
            return redirect()->route('no_access');
        }

        if ($request->isMethod('POST')) {


            $this->validate($request, [
                'productname' => ['required', 'string', 'max:100'],
                'productdiscr' => ['max:100']
            ]);

            Product::create([
                'productname' => $request->input('productname'),
                'productdiscript' => $request->input('productdiscr', 'Нет описания'),
                'units' => $request->input('unit'),
                'productactiv' => 1,
            ]);
            $product = $request->input('productname');

            return redirect()->back()->with('message_cr_prod', $product);
        } else {
            dump(2);
        }
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
         if(Gate::denies('show_mang_kanc_admin')){
            return redirect()->route('no_access');
        }
        
        $product= Product::findOrFail($id);
        //12 for show form edit product
        $formySwith = 12;
        return view('mylayouts.main.admin_page', ['formySwith' => $formySwith, 'product'=>$product]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        if(Gate::denies('show_mang_kanc_admin')){
            return redirect()->route('no_access');
        }
        
        $this->validate($request, ['productdiscr' => 'max:100']);
        $product=Product::findOrFail($id);
        $data = $request->only('productdiscr', 'unit');
        $activ =$request->input('prodactiv', 1);
        $product->update([
            'productdiscript'=>$data['productdiscr'],
            'units'=>$data['unit'],
            'productactiv'=>$activ,
        ]);
        return redirect()->back()->with('message_edit_prod', $product->productname);
        
        
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
