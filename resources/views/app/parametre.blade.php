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
@include('Compement.parametre ',['user'=>$user])
@endsection
