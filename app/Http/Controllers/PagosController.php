<?php

namespace App\Http\Controllers;

use App\Models\pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        $data['pagos'] = pago::paginate();
        $content = 'pagos.seePagos';
        return view('dashboard', $data, compact('content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $content = 'pagos.seePagos';
        $pago = DB::table('pagos')->where('id', 'like', '%'.$search.'%')->paginate();

        if(!empty($search)){
            return view('dashboard', ['pagos' => $pago], compact('content'));
            
        } else {
            return redirect('/seePagos');
        }
    }
}
