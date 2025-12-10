<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pet;
use App\Models\Adoption;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    // myprofile
    public function myprofile()
    {

        $user = User::find(Auth::user()->id);
        // dd($user->toArray());
        return view('customer.myprofile')->with('user', $user);
    }
    public function updatemyprofile(Request $request, $id)
    {
        $validation = $request->validate([
            'document'  => ['required', 'numeric', 'unique:users,document,' . $id],
            'fullname'  => ['required', 'string'],
            'gender'    => ['required'],
            'birthdate' => ['required', 'date'],
            'phone'     => ['required'],
            'email'     => ['required', 'lowercase', 'email', 'unique:users,email,' . $id],
        ]);

        // PROCESAR FOTO
        if ($request->hasFile('photo')) {

            $photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images/'), $photo);

            if ($request->originalphoto != 'no-photo.png') {
                unlink(public_path('images/') . $request->originalphoto);
            }
        } else {
            $photo = $request->originalphoto;
        }

        // ACTUALIZAR USUARIO
        $user = User::find($id);

        $user->document = $request->document;
        $user->fullname = $request->fullname;
        $user->gender = $request->gender;
        $user->birthdate = $request->birthdate;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->photo = $photo;

        if ($user->save()) {
            return redirect('dashboard')->with('message', 'My profile was successfully edited!');
        }
    }


    // make Adoption
    public function listpets()
    {
        $pets = Pet::where('status', 0)->orderBy('id','DESC')->paginate(10);
        return view('customer.makeadoption')->with('pets', $pets);
    }

    // my adoptions
    public function myadoptions()
    {
        $adopts = Adoption::where('user_id', Auth::user()->id)->get();
        //  dd($adopts->toArray());
         return view('customer.myadoptions')->with('adopts', $adopts);
    }
    public function showadoption(Request $request) {

        $adopt = Adoption::find($request->id);
        // dd($adopt->toArray());
        return view('customer.showadoption')->with('adopt',$adopt);
    }


    public function confirmadoption(Request $request) {
        $pet = Pet::find($request->id);
        return view('customer.confirmadoption')->with('pet', $pet);
    }

    public function makeadoption(Request $request) {
        // Validar que el usuario autenticado intente crear la adopción
        $adoption = new Adoption();
        $adoption->user_id = Auth::user()->id;
        $adoption->pet_id = $request->pet_id;
        
        if ($adoption->save()) {
            // Actualizar el estado del animal a adoptado
            $pet = Pet::find($request->pet_id);
            $pet->status = 1;
            $pet->save();
            
            return redirect('myadoptions/')->with('message', 'Adoption was successfully created!');
        }
        
        return redirect('makeadoption/')->with('error', 'Error creating adoption');
    }
    
    public function search(Request $request) {
         $pets = Pet::kinds($request->q)->orderBy('id', 'DESC')->paginate(20);
        // dd($adopt->toArray());
        return view('customer.search')->with('pets',$pets);
    }
}


    // Route::get('myprofile/',[CustomerController::class,'myprofile']);
    // Route::get('myprofile/{id}',[CustomerController::class,'updatemyprofile']);

    // Route::get('myadoptions/',[CustomerController::class,'showadoptions']);
    // Route::get('myadoptions/{id}',[CustomerController::class,'showadoption']);

    // Route::get('makeadoption/',[CustomerController::class,'listpets']);
    // Route::get('makeadoption/{id}',[CustomerController::class,'confirmadoption']);
    // Route::get('makeadoption/{id}',[CustomerController::class,'makeadoption']);
    // Route::get('search/makeadoption',[CustomerController::class,'search']);
