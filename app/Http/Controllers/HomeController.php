<?php

namespace App\Http\Controllers;

use App\Pendiente;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userID = Auth::user()->id;
        $datos['pendientes'] = Pendiente::where('user_id', '=', $userID)->where('status', '=', 'FFFF00')->OrderBy('status', 'desc')->get();
        return view ('pendientes.index', $datos);
        //return view('home');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('pendientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosPendientes = request()->except('_token'); // excepto _token
        $datosPendientes['user_id'] = Auth::user()->id;

        Pendiente::insert($datosPendientes);

        return redirect('pendientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pendiente  $pendientes
     * @return \Illuminate\Http\Response
     */
    public function show(Pendiente $pendientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pendiente  $pendientes
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pendiente = Pendiente::findOrFail($id);
        return view('pendientes.edit', compact('pendiente'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pendiente  $pendientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosPendiente = request()->except(['_token', '_method']);

        Pendiente::where('id', '=', $id)->update($datosPendiente);

        $pendiente = Pendiente::findOrFail($id);
        // return view('pendientes.edit', compact('pendiente'));

        return redirect('pendientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pendiente  $pendientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pendiente = Pendiente::findOrFail($id);

        Pendiente::destroy($id);

        return redirect('pendientes');
    }

    public function pdf()
    {
        $userID = Auth::user()->id;
        $datos['pendientes'] = Pendiente::where('user_id', '=', $userID)->orderBy('status', 'desc')->get();
        
        return view('pendientes.reporte', $datos); 
    }
}
