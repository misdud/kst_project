<?php

namespace App\Http\Controllers\AppKancler;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Zakaz;

class ZakazMainController extends Controller {

    public function showListZakaz() {
        //проверка на права
        //закрытие / открытие если открытых нет

        $zakazs = Zakaz::select('id', 'zakazname', 'zakazactiv', 'dodate', 'created_at')->orderBy('created_at', 'desc')->paginate(10);
        $zakazs_count = Zakaz::count();
        $isIssetzaivka = Zakaz::select('id', 'zakazactiv')->where('zakazactiv', 1)->orderBy('created_at', 'desc')->first();
        if ($isIssetzaivka != NULL) {
            $isissetzakaz = TRUE;
        } else {
            $isissetzakaz = FALSE;
        }
        if (view()->exists('mylayouts.main.admin_page')) {
            // 7 for show list zakaz 
            $formySwith = 7;
            return view('mylayouts.main.admin_page', compact('zakazs', 'formySwith', 'isissetzakaz','zakazs_count'));
        } else {
            abort(404);
        }
    }

    public function showFormZakaz() {

        // 8 for show  form zakaz  
        $formySwith = 8;
        return view('mylayouts.main.admin_page', compact('formySwith'));
    }

    public function createZakaz(Request $request) {

        //проверка на права создания 

        if ($request->isMethod('POST')) {

            $this->validate($request, ['dodatezaivka' => 'required|date_format:Y-m-d|after:+5 day']);

            $zakaz = Zakaz::select('zakazactiv')->where('zakazactiv', 1)->orderBy('id', 'desc')->limit(1)->get();

            if ($zakaz->isEmpty()) {
                Zakaz::create([
                    'zakazname' => $request->input('zakazname'),
                    'zakazactiv' => 1,
                    'dodate' => $request->input('dodatezaivka'),
                ]);
                //создалась
                return redirect()->route('zakaz_list')->with(['message_zaivka' => 1, 'openzaivka' => 1]);
            } else {
                //ещё есть открытая заявка
                return redirect()->route('zakaz_list')->with(['message_zaivka' => 0, 'openzaivka' => 0]);
            }
        }
        return redirect()->back();
    }

    public function editZakaz($id = 0) {
        //проверка на права
        //закрытие / открытие если открытых нет
        $zakaz = Zakaz::findOrFail($id);
        $formySwith = 9;
        return view('mylayouts.main.admin_page', compact('zakaz', 'formySwith'));
    }

    public function editZakazdb(Request $request, $id = 0) {
        //проверка на права
        //закрытие / открытие если открытых нет
        if ($request->isMethod('PUT')) {
            $zakaz_activ = Zakaz::findOrFail($id);
            if ($zakaz_activ->zakazactiv == 1 && $request->input('openclosezakaz') == 0) {
                $zakaz_activ->zakazactiv=0;
                $zakaz_activ->save();
                return redirect()->route('zakaz_list');
            }else{
                $zakazm = Zakaz::select('zakazactiv')->where('zakazactiv', 1)->orderBy('id', 'desc')->limit(1)->get();
                if($zakazm->isEmpty()){
                    $zakaz_activ->zakazactiv=1;
                    $zakaz_activ->save();
                return redirect()->route('zakaz_list');
                }
     
                return redirect()->route('zakaz_list');
            }
        }
    }

}
