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

  <form class="needs-validation" action="#!/home" method="POST" novalidate>

    <div class="mb-3">
        <label for="category">Categorie</label>
        <select class="form-control" id="category">
          <option>Paris</option>
          <option>Marine</option>
          <option>Nature Morte</option>
          <option>Scène de vie quotidienne</option>
          <option>Ecole</option>

        </select>
    </div>


      <div class="mb-3">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" placeholder="title" required>
      </div>
      <div class="mb-3">
          <label for="description">Description</label>
          <textarea class="form-control" id="description" rows="10" placeholder="description" required></textarea>

      </div>


    <div class="md-12">
        <div class="thumbnail">
          <img src="..." alt="...">
          <div class="caption">
            <h3>Primier Image</h3>
            <p><a href="#" class="btn btn-primary" role="button">Uploader</a>
              <label for="file" class="btn btn-default">
             Choisir
             <input id="file" type="file" style="display:none">
           </label>

            </p>
          </div>
        </div>

        <div class="thumbnail">
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
        </div>

        <div class="thumbnail">
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
        </div>
      </div>

      <button class="btn btn-primary" type="submit" ng-click="$ctrl.submit()">Submit form</button>
  </form>







</div>



@endsection
