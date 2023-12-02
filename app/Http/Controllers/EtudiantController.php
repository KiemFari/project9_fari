<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Tuteur;

class EtudiantController extends Controller
{
    public function liste_etudiant()
    {
        $etudiants =Etudiant::all();
        $tuteurs =Tuteur::all();
        return view ('etudiant.liste' , compact('etudiants', 'tuteurs'));
    }
    public function ajouter_etudiant()
    {
        $tuteurs = Tuteur::all();
        $etudiants = Etudiant::all();
        return view('etudiant.ajouter', compact('etudiants', 'tuteurs'));
    }

    public function ajouter_etudiant_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'classe' => 'required',

        ]);

        $etudiant = new Etudiant();
        $etudiant->nom = $request ->nom;
        $etudiant->prenom = $request ->prenom;
        $etudiant->classe = $request ->classe;
         $etudiant->image = $request ->image;
        $etudiant->tuteur_id = $request ->tuteur;

        // verification d'image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalExtension();
            $chemonImage ->storage('images', 'public');
            $etudiant->image = $imageName;
        }
            $etudiant ->save();

            return redirect('/ajouter')-> with('status' ,'L/etudiant a bien été ajouter avec success.');

    }
        public function update_etudiant($id){
            $etudiants = Etudiant::find($id);
            $tuteurs = tuteur::all();

            return view('etudiant.update', compact('etudiants' , "tuteurs"));

        }

         public function update_etudiant_traitement(Request $request){
            $request->validate([
                'nom' => 'required',
                'prenom' => 'required',
                'classe' => 'required',
                'image' => 'required',
            ]);
            $etudiant = Etudiant::find($request ->id);
            $etudiant ->nom = $request ->nom;
            $etudiant ->prenom = $request ->prenom;
            $etudiant ->classe = $request ->classe;
            $etudiant ->image= $request ->image;
            $etudiant ->update();

            return redirect('/etudiant')-> with('status' ,'L/etudiant a bien été modifier avec success.');
         }

         public function delete_etudiant($id){
            $etudiant = Etudiant::find($id);
            $etudiant->delete();
            return redirect('/etudiant')-> with('status' ,'L/etudiant a bien été supprimé avec success.');
         }



        public function image()
        {
            return $this->hasOne(Image::class);
        }

    }



