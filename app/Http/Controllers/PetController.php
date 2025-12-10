<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PetsExport;


class PetController extends Controller
{
    public function index()
    {
        // $pets = Pet::all();
        $pets = Pet::orderBy('id', 'asc')->paginate(20);

        return view('pets.index', compact('pets'));
        // dd($pets->toArray());
    }
    public function create()
    {
        return view('pets.create');
        //  dd($pets->toArray());
    }
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name'          => ['required', 'string'],
            'image'         => ['image'],
            'kind'          => ['required'],
            'weight'        => ['required', 'numeric'],
            'age'           => ['required', 'numeric'],
            'breed'         => ['required', 'string'],
            'location'      => ['required','string'],
            'description'   => ['required', 'string'],
        ]);
        if ($request->hasFile('image')) {
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $image);
        } else {
            $image = 'no-image.png';
        }

        $pet = new Pet;
        $pet->name      = $request->name;
        $pet->image = $image;
        $pet->kind      = $request->kind;
        $pet->weight    = $request->weight;
        $pet->age       = $request->age;
        $pet->breed     = $request->breed;
        $pet->location  = $request->location;
        $pet->description  = $request->description;

        if ($pet->save()) {
            return redirect('pets')->with('message', 'The pet:  ' . $pet->name . '  was successfully added!');
        }
    }
    public function show(Pet $pet)
    {

        return view('pets.show')->with('pet', $pet);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
    {
        return view('pets.edit')->with('pet', $pet);
    }

    public function update(Request $request, Pet $pet)
    {
        // VALIDACIÓN
        $request->validate([
            'name'        => ['required', 'string'],
            'kind'        => ['required', 'string'],
            'weight'      => ['required', 'numeric'],
            'age'         => ['required', 'numeric'],
            'breed'       => ['nullable', 'string'],
            'location'    => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'active'      => ['required'],     // tinyint
            'image'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif'],
        ]);

        // PROCESAR FOTO

        $image = $pet->image; // Imagen actual guardada

        if ($request->hasFile('image')) {

            // Crear nuevo nombre único
            $imageName = time() . '.' . $request->image->extension();

            // Subir nueva imagen
            $request->image->move(public_path('images/'), $imageName);

            // Eliminar imagen anterior si NO es la imagen por defecto
            if ($pet->image !== 'no-image.png' && file_exists(public_path('images/' . $pet->image))) {
                unlink(public_path('images/' . $pet->image));
            }

            // Reemplazar la imagen
            $image = $imageName;
        }

        // ====================================
        // ACTUALIZAR CAMPOS
        // ====================================

        $pet->name        = $request->name;
        $pet->kind        = $request->kind;
        $pet->weight      = $request->weight;
        $pet->age         = $request->age;
        $pet->breed       = $request->breed;
        $pet->location    = $request->location;
        $pet->description = $request->description;
        $pet->active      = $request->active;
        $pet->image       = $image;

        // GUARDAR
        $pet->save();

        return redirect('pets')->with('message', 'The pet ' . $pet->name . ' was successfully updated!');
    }
    public function destroy(Pet $pet)
    {
        if($pet->image != 'no-image.png'){
            unlink(public_path('images/').$pet->image);
        }
        if($pet->delete()){
            return redirect('pets')->with('message','The pet: '.$pet->name.'Was successfully deleted');
        }
    }
    public function search(Request $request){
        $pets = Pet::names($request->q)->orderBy('id','desc')->paginate(20);
        return view('pets.search')->with('pets',$pets);
    }
    /**
     * Export all pets to PDF
     */
    public function pdf()
    {
        $pets = Pet::all();
        $pdf = Pdf::loadView('pets.pdf', compact('pets'));
        return $pdf->download('allpets.pdf');
    }

    /**
     * Export all pets to Excel
     */
    public function excel()
    {
        return Excel::download(new PetsExport, 'allpets.xlsx');
    }

    
}
