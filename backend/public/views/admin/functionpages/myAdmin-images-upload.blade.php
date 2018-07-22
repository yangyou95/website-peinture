@extends('admin.default')



@section('content')

<!-- <body>
<form action="{{url('file')}}" method="post" enctype="multipart/form-data">
    <table border="1" align="center">
        <tr>
            <td>昵称</td>
            <td><input type="text" name="name"/></td>
        </tr>
        <tr>
            <td>选择图片</td>
            <td><input type="file" name="photo"/></td>
        </tr>
        <tr>
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <td><input type="submit" value="提交"/></td>
            <td></td>
        </tr>
    </table>
</form>
</body> -->

<div class="row">

  <form class="needs-validation" action="{{route('ajouter_peinture')}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}

    <div class="mb-3">
        <label for="category">Categories</label>
        <select class="form-control" name="category">


          <option>Production Personnelles</option>
          <option>Resturations</option>
          <option>Nature Morte</option>


        </select>
    </div>

    <div class="mb-3">
        <label for="sous-categories">Sous-Categorie</label>
        <select class="form-control" name="sous-categories">
          @foreach($scs as $sc)
          <option> {{$sc->name}}</option>
          @endforeach
        </select>
    </div>


      <div class="mb-3">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" placeholder="title" required>
      </div>

      <div class="mb-3">
          <label for="description">Description</label>
          <textarea class="form-control" name="description" rows="10" placeholder="Description" required></textarea>

      </div>

      <div class="mb-3">
          <label for="title">Prix</label>
          <input type="text" class="form-control" name="prix" placeholder="Entrer le Prix" required>
      </div>


      <div class="md-12">
        <label for="title">Image de Peinture</label>
        <div class="thumbnail">
          <div class="caption">
            <!-- <h3>Image de Peinture</h3> -->

             <input type="file" name="file" >


            </p>
          </div>
        </div>

        <!-- <div class="thumbnail">
          <img src="..." alt="...">
          <div class="caption">
            <h3>Deuxième Image</h3>
            <p><a href="#" class="btn btn-primary" role="button">Uploader</a>
              <label for="file" class="btn btn-default">
             Choisir
             <input id="file" type="file" style="display:none">
           </label>
             </p>
          </div>
        </div> -->

        <!-- <div class="thumbnail">
          <img src="..." alt="...">
          <div class="caption">
            <h3>Troisème Image</h3>
            <p><a href="#" class="btn btn-primary" role="button">Uploader</a>
              <label for="file" class="btn btn-default">
             Choisir
             <input id="file" type="file" style="display:none">
           </label>
            </p>
          </div>
        </div> -->
      </div>


      <button class="btn btn-primary" type="submit">Submit</button>

  </form>







</div>



@endsection
