<?php

namespace App\Http\Controllers;

use App\Models\pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        /*$date = Carbon::now();
        dd($date);*/
        $pagos = pago::all();
        $content = 'pagos.seePagosMembresias';
        return view('dashboard', compact('content','pagos'));
    }

    public function toJson()
    {
        $data['pagos'] = pago::paginate();
        //dd(json_encode($data));
        return redirect('/seePagos')->with('data', json_encode($data));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $total = 0;
        $ultimoId = pago::all('id')->last();
        $content = 'pagosMembresias.formPagosMembresias';
        if($ultimoId == null){
            $siguienteId = 1;
            return view('dashboard',compact('siguienteId','content','total'));
        }
        $siguienteId = (int)$ultimoId->id + 1;
        return view('dashboard',compact('siguienteId','content', 'total'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function show(Pago $pago)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function edit(Pago $pago)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pago $pago)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pago $pago)
    {

    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $content = 'pagos.seePagosMembresias';
        $pago = DB::table('pagos')->where('id', 'like', '%'.$search.'%')->paginate();

        if(!empty($search)){
            return view('dashboard', ['pagos' => $pago], compact('content'));

        } else {
            return redirect('/seePagos');
        }
    }
}
