@extends('layout')

<div class="">
@section('sidenave')
@include('sidenav.sidenave')
@endsection
</div>

@section('content')
@include('Compement.dahbord',[['Stocks' => $Stocks],['materiel_stock' => $materiel_stock],['stock_entree' => $stock_entree],['stocksorti' => $stocksorti],['employer_quantite' => $employer_quantite]])
@endsection
