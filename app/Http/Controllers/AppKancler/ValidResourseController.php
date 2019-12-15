<?php

namespace App\Http\Controllers\AppKancler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Zakaz;
use App\Orders;
use App\Otdel;
use App\Product;
use App\User;
use App\Order;
use PDF;
use Gate;

class ValidResourseController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

         if(Gate::denies('show_moder_kanc_admin')){
            return redirect()->route('no_access');
        }

        //get ist all zakaz;
        $list_zakazs = Zakaz::with('orders')->orderBy('created_at', 'desc')->paginate(5);
        $list_zakazs_count = Zakaz::with('orders')->count();
        if (view()->exists('mylayouts.main.validate.all_list_zakaz')) {
            $formySwith = 22;
            return view('mylayouts.main.admin_page', compact('formySwith', 'list_zakazs', 'list_zakazs_count'));
        } else {
            abort('404');
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
         if(Gate::denies('show_moder_kanc_admin')){
            return redirect()->route('no_access');
        }
        $zakaz = Zakaz::findOrFail($id);
        $orders_zakaz = $zakaz->orders()->with('otdel')->get();
        $group_otdel_orders = $orders_zakaz->groupBy('otdel_id');
        //d($orders_zakaz);
        //dump($foo);

        if (view()->exists('mylayouts.main.validate.all_list_otdels')) {
            $formySwith = 23;
            return view('mylayouts.main.admin_page', compact('formySwith', 'group_otdel_orders', 'zakaz'));
        } else {
            abort('404');
        }
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
        if(Gate::denies('show_moder_kanc_admin')){
            return redirect()->route('no_access');
        }

        if ($request->isMethod('PUT')) {
            $order_edit = Order::select('id', 'discriptorder', 'user_id')->where('id', $id)->first();
            $user = $order_edit->user->name;
            $data = $order_edit->discriptorder . ' для  ' . $user;

            $order = Order::where('id', $id)->update([
                'count_good' => $request->input('valid_count'),
                'valid' => 'yes',
            ]);

            return redirect()->back()->with('msg_valid_order', $data);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if(Gate::denies('show_moder_kanc_admin')){
            return redirect()->route('no_access');
        }
        $order = Order::findOrFail($id);
        $res = Order::destroy($id);

        if ($res) {
            return redirect()->back()->with(['msg_del' => "{$order->discriptorder} - удалёно "]);
        } else {
            return redirect()->back()->with(['msg_del' => "Товар не был удалён"]);
        }
    }

    public function validOtdel($zakaz_id = null, $otdel_id = null) {
        if(Gate::denies('show_moder_kanc_admin')){
            return redirect()->route('no_access');
        }

        if (!Auth::check()) {
            return redirect('/login');
        }

        $zakaz = Zakaz::findOrFail($zakaz_id);
        $otdel_orders = $zakaz->orders()->with('user', 'product')->where('otdel_id', $otdel_id)->orderBy('user_id')->get();

        //-------------
        $zak_id = $zakaz->id;
        $orders = $zakaz->orders()->where('otdel_id', $otdel_id)->with('product')->orderBy('discriptorder')->get();
        $res = $orders->groupBy('discriptorder');
//        foreach ($res as $k=>$v){
//            //echo $v->product->productdiscript;
//            //echo $v->product->utits;
//            foreach ($v as $c){
//               //echo $c->product->productdiscript;
//               echo $c->product->units;
//            }
//            echo '<br>';
//        }
//        dump($res);
//        exit();
        if (view()->exists('mylayouts.main.validate.valid_orders')) {
            $formySwith = 24;
            return view('mylayouts.main.admin_page', compact('formySwith', 'zakaz', 'otdel_orders', 'res'));
        } else {
            abort(404);
        }
    }

    public function downloadZakazPDF($id_zak = 0, $id_otdel = 0) {
        if(Gate::denies('show_moder_kanc_admin')){
            return redirect()->route('no_access');
        }

        $otd = Otdel::findOrFail($id_otdel);
        $otdel=$otd->otdelfullname;

        $zakaz = Zakaz::findOrFail($id_zak);
        $zakaz_name = $zakaz->zakazname;
        $zakaz_date = $zakaz->created_at;
        $orders = $zakaz->orders()->where('otdel_id', $id_otdel)->with('user')->orderBy('discriptorder')->get();

        $result = $orders->groupBy('discriptorder');
        if (view()->exists('mylayouts.main.validate.get_pdf_otdel_zakaz')) {
            $pdf = PDF::loadView('mylayouts.main.validate.get_pdf_otdel_zakaz', compact('otdel', 'orders', 'zakaz_name', 'result', 'zakaz_date'));
            $name ='Заказ_'.mb_strtolower($otdel).'_'.mb_strtolower($zakaz_name).'.pdf';
            $name_edit = str_replace(' ', '_', $name);
            PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
            return $pdf->stream($name_edit);
            //return $pdf->stream('Заказ_'.strtolower($otdel).'_'.strtolower($zakaz_name).'.pdf');
        } else {
            abort(404);
        }
    }

}
