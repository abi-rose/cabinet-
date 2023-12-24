<?php

namespace App\Http\Controllers;

use App\Models\Lit;
use App\Models\Chambre;
use App\Models\Medecin;
use App\Models\Patient;
use App\Models\Rendez_Vous;
use Illuminate\Http\Request;
use App\Models\Emploi_du_temp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Hospitalisation;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function register(Request $request)
    {
        // dd('oj');
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_de_naissance' => 'required|date',
            'adresse' => 'required|string|max:255',
            'email' => 'required|email',
            'telephone' => 'required|string',
            'genre' => ['required', 'in:masculin,feminin'],
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            // Si la validation échoue, renvoyer le formulaire avec les erreurs
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // dd('ok');
        // Sinon, créer un nouvel utilisateur et le stocker dans la base de données
        $user = Patient::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'date_de_naissance' => $request->date_de_naissance,
            'adresse' => $request->adresse,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'genre' => $request->genre,
            'password' => Hash::make($request->password)
        ]);
        // retour la vue
        return 'leye';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        if ($validator->fails()) {
            dd($validator->errors());
            // Si la validation échoue, renvoyer le formulaire avec les erreurs
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $credentials = $request->only('email', 'password');
        if (Auth::guard('patient')->attempt($credentials)) {
            return 'connecter';
        }
    }

    public function showmedecins()
    {
        $medecins = Medecin::all();
        return 'liste medecins';
    }
    /**
     * Store a newly created resource in storage.
     */
    public function demanderrendez()
    {
        return 'rendez-vous';
    }

    public function demanderHospitalisation()
    {
        return 'Hospitalisation';
    }
    public function enregstrerrendez(Request $request, Medecin $medecins)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required|date',
            'heure' => 'required|date_format:H:i:s'
        ]);
        $patient = Auth::guard('patient')->user()->id;
        $rendezVous = new Rendez_Vous();
        $rendezVous->date = $request->date;
        $rendezVous->heure = $request->heure;
        $rendezVous->medecin_id = $medecins->id;
        $rendezVous->patient_id = $patient;
        $rendezVous->save();
    }

    public function enregstrerHospitalisation(Request $request, Medecin $medecins)
    {
        $chambre_disponible = Chambre::where('disponible', 'oui')->first();
        if (isset($chambre_disponible)) {
            $lit_disponible = Lit::where('disponible', 'oui')->first();
            if (isset($lit_disponible)) {
                $validator = Validator::make($request->all(), [
                    'diagnostique' => 'required|string',
                    'traitement' => 'required|string',
                    'dateEntree' => 'required|date',
                    'dateSortie' => 'required|date'
                ]);
                $patient = Auth::guard('patient')->user()->id;
                $hospitalisation = new Hospitalisation();
                $hospitalisation->Diagnostic = $request->diagnostique;
                $hospitalisation->traitement = $request->traitement;
                $hospitalisation->date_entree = $request->dateEntree;
                $hospitalisation->date_sortie = $request->dateSortie;
                $hospitalisation->chambre_id  = $chambre_disponible->id;
                $hospitalisation->medecin_id = $medecins->id;
                $hospitalisation->patient_id = $patient;
                $hospitalisation->save();
            } else {
                return 'pas de lit disponible pour le moment';
            }
        } else {
            return 'pas de chambre disponible pour le moment';
        }
    }
    /**
     * Display the specified resource.
     */
    public function showemploi(Medecin $medecins)
    {
        $emploidutemps = Emploi_du_temp::where('medecin_id', $medecins->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
