@extends('admin.default')



@section('content')


<div class="row">

  <form class="needs-validation" action="{{route('ajouter_sous_categories')}}" method="POST">
    {{csrf_field()}}

    <div class="mb-3">
        <label for="category">Grande-Categorie</label>
        <select class="form-control" name="category">
          <option>Production Personnelles</option>
          <option>Resturations</option>
          <option>Nature Morte</option>
        </select>
    </div>


      <div class="mb-3">
          <label for="title">Sous-Categorie</label>
          <input type="text" class="form-control" name="sous_categories" placeholder="Entrer le nouveau sous-Categorie" required>
      </div>


      <button class="btn btn-primary" type="submit">Submit</button>

  </form>



</div>



@endsection
