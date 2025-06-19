@extends('layout')

<div class="">
@section('sidenave')
@include('sidenav.sidenave')
@endsection
</div>
@section('content')
@include('Compement.addmateriel',['materiel' => $materiel])
@endsection
