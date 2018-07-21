@extends('admin.default')



@section('content')


<table class="table table-bordered table-responsive" style="margin-top: 10px">
  <thead>
    <tr>
      <th> ID </th>
      <th> Sous-Categorie </th>
      <th> Categorie </th>
      <th> Created at</th>
    </tr>
  </thead>
  <tbody>
  @foreach($scs as $sc)
    <tr>
      <td> {{$sc->id}}</td>
      <td> {{$sc->name}}</td>
      <td> {{$sc->categories}}</td>
      <td> {{$sc->created_at}}</td>

    </tr>
  @endforeach

  </tbody>



@endsection
