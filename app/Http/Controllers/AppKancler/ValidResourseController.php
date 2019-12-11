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

class ValidResourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //test
        if(!Auth::check()){
            return redirect('/login');
        }

        //get ist all zakaz;
        $list_zakazs = Zakaz::with('orders')->orderBy('created_at','desc')->paginate(10);
        $list_zakazs_count = Zakaz::with('orders')->count();
        if(view()->exists('mylayouts.main.validate.all_list_zakaz')){
            $formySwith=22;
            return view('mylayouts.main.admin_page', compact('formySwith', 'list_zakazs', 'list_zakazs_count'));
        }else{
            abort('404');
        }
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $zakaz= Zakaz::findOrFail($id);
        $orders_zakaz = $zakaz->orders()->with('otdel')->get();
        $group_otdel_orders=$orders_zakaz->groupBy('otdel_id');
        //d($orders_zakaz);
        //dump($foo);
        
        if(view()->exists('mylayouts.main.validate.all_list_otdels')){
            $formySwith=23;
            return view('mylayouts.main.admin_page', compact('formySwith', 'group_otdel_orders', 'zakaz'));
        }else{
            abort('404');
        }
        
        foreach ($group_otdel_orders as $otdel){
         echo $otdel->count();
         //echo $otdel->otdel_id;
         foreach ($otdel as $a){
             echo $a->otdel->otdelfullname;
             echo $a->otdel->id;
             break;
         }
         
         //cho $otdel->otdel->otdelname;
         //dump($otdel); //$otdel->otdel->otdelname;
         //echo '<br>';
        }
        //exit();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        
        if($request->isMethod('PUT')){
        $order_edit = Order::select('id','discriptorder', 'user_id')->where('id', $id)->first();
        $user = $order_edit->user->name;
        $data = $order_edit->discriptorder.' для  '. $user; 
        
        $order = Order::where('id', $id)->update([
            'count_good'=>$request->input('valid_count'),
            'valid'=>'yes',
        ]);
        
        return redirect()->back()->with('msg_valid_order',$data);
    }else{
        return redirect()->back();
    }
    
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $res = Order::destroy($id);
        
        if($res){
            return redirect()->back()->with(['msg_del'=>"{$order->discriptorder} - удалёно "]);
        }else{
            return redirect()->back()->with(['msg_del'=>"Товар не был удалён"]);
        }
    }
    
    public function validOtdel($zakaz_id=null, $otdel_id=null){
        
        if(!Auth::check()){
            return redirect('/login');
        }
        
        $zakaz = Zakaz::findOrFail($zakaz_id);
        $otdel_orders=$zakaz->orders()->with('user','product')->where('otdel_id', $otdel_id)->orderBy('user_id')->get();
        
        if(view()->exists('mylayouts.main.validate.valid_orders')){
            $formySwith=24;
            return view('mylayouts.main.admin_page', compact('formySwith', 'zakaz', 'otdel_orders'));
        }else{
            abort(404);
        }
    }
    
}
