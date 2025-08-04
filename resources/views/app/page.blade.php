@extends('layout')
<div class="">
@section('title')
@include('sidenav.title')
@endsection
</div>

<div class="">
@section('sidenave')
@include('sidenav.sidenave')
@endsection
</div>

@section('content')
@include('Compement.dahbord',[  ['Stock' => $Stock] , ['Materiel' => $Materiel] ,['Typestocks'=>$Typestocks] ,['Employer' => $Employer] ,   ['Stocks' => $Stocks],['materiel_stock' => $materiel_stock],['stock_entree' => $stock_entree],['stocksorti' => $stocksorti],['employer_quantite' => $employer_quantite]])
@endsection
