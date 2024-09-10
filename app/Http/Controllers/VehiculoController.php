<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Inertia\Inertia;
use function Spatie\LaravelPdf\Support\pdf;

class VehiculoController extends Controller
{
    //index
    public function index()
    {
        $vehiculos = Vehiculo::all();
        return Inertia::render('Vehiculos/Index', [
            'vehiculos' => $vehiculos
        ]);
    }

    //create
    public function create()
    {
        return Inertia::render('Vehiculos/Form', [
            'vehiculo' => null
        ]);
    }

    public function store()
    {
        request()->validate([
            'numero_economico' => 'required',
            'marca' => 'required',
            'tipo' => 'required',
            'modelo' => 'required',
            'placa' => 'required',
            'no_serie' => 'required',
            'no_motor' => 'required',
            'area_asignacion' => 'required',
            'resguardante' => 'required',
        ]);

        Vehiculo::create(request()->all());

        return redirect()->route('vehiculos.index');
    }

    //Edit
    public function edit(Vehiculo $vehiculo)
    {

        return Inertia::render('Vehiculos/Form', [
            'vehiculo' => $vehiculo
        ]);
    }

    //Update
    public function update(Vehiculo $vehiculo)
    {
        request()->validate([
            'numero_economico' => 'required',
            'marca' => 'required',
            'tipo' => 'required',
            'modelo' => 'required',
            'placa' => 'required',
            'no_serie' => 'required',
            'no_motor' => 'required',
            'area_asignacion' => 'required',
            'resguardante' => 'required',
        ]);

        $vehiculo->update(request()->all());

        return redirect()->route('vehiculos.index');
    }

    //Destroy
    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();
        return redirect()->back();
    }

    ///vehiculos/pdf
    public function pdf()
    {
        $vehiculos = Vehiculo::all();
        $today = now()->format('d-m-Y');
        $pdf = pdf()->view('/vehiculos_list', compact('vehiculos'))->name('vehiculos_list_' . $today . '.pdf')->download();
    }
}
