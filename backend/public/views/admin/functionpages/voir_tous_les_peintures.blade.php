@extends('admin.default')



@section('content')


<table class="table table-bordered table-responsive" style="margin-top: 10px">
  <thead>
    <tr>
      <th> ID </th>
      <th> name </th>
      <th> Sous categorie</th>
      <th> categorie </th>
      <th> Prix </th>
      <th> Path </th>
      <th> Created at</th>


    </tr>
  </thead>
  <tbody>
  @foreach($ps as $p)
    <tr>
      <td> {{$p->id}}</td>
      <td> {{$p->name}}</td>
      <td> {{$p->sous_categories}}</td>
      <td> {{$p->categories}}</td>
      <td> {{$p->prix}}</td>
      <td> {{$p->path}}</td>
      <td> {{$p->created_at}}</td>
    </tr>
  @endforeach

  </tbody>



@endsection
