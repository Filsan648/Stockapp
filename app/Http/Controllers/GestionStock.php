<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Materiel;
use App\Models\Employer;
use App\Models\Stock;
class GestionStock extends Controller
{

 public function stock_get () {
    $materiel=Materiel::pluck("materiel");
    $employer=Employer::pluck("name");
    return (view('app.stockpage',compact("materiel","employer")));

 }
 public function materiel_get () {
    $materiel=Materiel::get();
    return (view('app.materielpage',compact("materiel")));

 }

 public function employer_get () {
    $employer=Employer::get();
    return (view('app.employerpage',compact("employer")));

 }

 public function materiel_post(Request $request) {

    Materiel::create(
      [  "materiel"=>$request->Materiel,
      "quantite"=>$request->quantite,
    ]);

    Stock::create(
        [
          "typestock"=>"entree",
          "date"=>$request->date,
          "materiel"=>$request->Materiel,
          "nom_employer"=>"null",
          "quantite"=>$request->quantite
      ]);
   }

   public function employer_post(Request $request) {

    Employer::create(
      [
        "name"=>$request->nom,
        "fonction"=>$request->fonction,
        "Departement"=>$request->departement
    ]);
    return redirect()->back()->with('success', 'Sortie de stock enregistrée avec succès.');
   }
   public function stock_post(Request $request) {

     Stock::create(
        [
          "typestock"=>"entree",
          "date"=>$request->date,
          "materiel"=>$request->materiel,
          "nom_employer"=>"null",
          "quantite"=>$request->nombre_ajout
      ]);
     $materiel= Materiel::where('materiel', $request->materiel)->pluck('quantite')->first();

      Materiel::where('materiel', $request->materiel)
      ->update([
          'quantite' => $materiel + $request->nombre_ajout
      ]);
      return redirect()->back()->with('success', 'Sortie de stock enregistrée avec succès.');


   }
   public function stock_post_sorti(Request $request)  {
    $materiel= Materiel::where('materiel', $request->materiel)->pluck('quantite')->first();
    if ($materiel >= $request->nombre_sortie) {

        Stock::create([
            "typestock"     => "sorti",
            "date"          => $request->date,
            "materiel"      => $request->materiel,
            "nom_employer"  => $request->client,
            "quantite"      => $request->nombre_sortie
        ]);

        Materiel::where('materiel', $request->materiel)
            ->update([
                'quantite' => $materiel - $request->nombre_sortie
            ]);

        return redirect()->back()->with('success', 'Sortie de stock enregistrée avec succès.');

    } else {
        return redirect()->back()->with('error', 'Stock insuffisant pour effectuer cette sortie. Veuillez vérifier la quantité disponible.');
    }
   }
public function HistoriqueStock(){
    $type_mouvement=Stock::select('typestock')->distinct()->pluck('typestock');
    $materiel=Stock::select('materiel')->distinct()->pluck('materiel');
    $nom_employer=Stock::select('nom_employer')->distinct()->pluck('nom_employer');
    $date = Stock::select('date')->orderBy('date', 'asc')->pluck('date');
    $dateE = Stock::select('date')->orderBy('date', 'desc')->pluck('date');
    $quantite = Stock::select('quantite')->orderBy('quantite', 'desc')->pluck('quantite');
    $stock= Stock::get();

 return view('app.historique',compact('stock'));
}


public function dashboard_get(){

    //chart1
$materiels=Materiel::pluck('materiel');
foreach( $materiels as $materiel){
    $quantite = Materiel::where('materiel', $materiel)->value('quantite'); // value() retourne une valeur simple
    $materiel_stock[] = ['materiel' => $materiel, 'quantite' => $quantite];
}

//chart2 stock entree par mois

 $months= Stock::
 where('typestock', 'entree')
  ->selectRaw('DISTINCT DATE_FORMAT(date, "%M") as month') // Sélectionner uniquement le mois
  ->pluck('month');


  foreach ($months as $month){
  $quantite_entree= stock:: where('typestock', 'entree')->whereRaw('DATE_FORMAT(Date, "%M") = ?', $month)
  ->sum('quantite');
  $quantite_sorti= stock:: where('typestock', 'sorti')->whereRaw('DATE_FORMAT(Date, "%M") = ?', $month)
  ->sum('quantite');
  $stock_entree[]=['month' => $month, 'quantite_entree' => $quantite_entree,'quantite_sorti' => $quantite_sorti];
  }

  //chart3 stock storie par mois

 $monthssorti= Stock::
 where('typestock', 'sorti')
  ->selectRaw('DISTINCT DATE_FORMAT(date, "%M") as month') // Sélectionner uniquement le mois
  ->pluck('month');


  foreach ($monthssorti as $month){
  $quantite_sorti= stock:: where('typestock', 'sorti')->whereRaw('DATE_FORMAT(Date, "%M") = ?', $month)
  ->sum('quantite');
  $stocksorti[]=['month' => $month, 'quantite_sorti' => $quantite_sorti];
  }

//chart4 employer par moi
$employers = Stock::where('typestock', 'sorti')
                ->select('nom_employer') // on sélectionne la colonne
                ->distinct()             // on indique qu'on veut des valeurs uniques
                ->pluck('nom_employer');
foreach($monthssorti as $month ){
foreach( $employers as $employer){
    $quantite_prix=Stock:: where('typestock', 'sorti')->where('nom_employer', $employer)
    ->whereRaw('DATE_FORMAT(Date, "%M") = ?', $month)
    ->sum('quantite');
    $employer_quantite[]=['employer' => $employer, 'quantite_prix' => $quantite_prix,'month' =>$month];
}

}


//chart4 employer par moi stock

$monthsstocks= Stock:: selectRaw('DISTINCT DATE_FORMAT(date, "%M") as month') // Sélectionner uniquement le mois
  ->pluck('month');

foreach ($monthsstocks as $monthsstock ){
    $stock_materiels=stock:: whereRaw('DATE_FORMAT(Date, "%M") = ?', $monthsstock)
    ->select('materiel') // on sélectionne la colonne
    ->distinct()
    ->pluck('materiel');

    foreach ($stock_materiels as $stock_materiel ){
        $stock_quantitesorti=stock::where('typestock', 'sorti')->where('materiel',$stock_materiel) ->whereRaw('DATE_FORMAT(Date, "%M") = ?', $monthsstock)
        ->sum('quantite');
        $stock_quantiteentree=stock::where('typestock', 'entree')->where('materiel',$stock_materiel)-> whereRaw('DATE_FORMAT(Date, "%M") = ?', $monthsstock)
        ->sum('quantite');
        $Stocks[]=['monthsstock' => $monthsstock, 'stock_materiel' => $stock_materiel,'stock_quantitesorti'=>$stock_quantitesorti,'stock_quantiteentree'=>$stock_quantiteentree];

    }

}
//Count
$Employer=Employer::count();
$Materiel=Materiel::count();
$Stock=0;
foreach($materiel_stock as $materiel ){

  $Stock=$Stock+$materiel['quantite'];
}

return(view('app.page',compact('Stock','Materiel','Employer','materiel_stock','stock_entree','stocksorti','employer_quantite','Stocks')));

}




}

















