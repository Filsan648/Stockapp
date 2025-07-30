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
@include('Compement.commande',['User' => $User,'Commandes'=>$Commandes])
@endsection
