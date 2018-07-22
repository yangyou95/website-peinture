<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Item;

use App\Sous_categorie;
use App\Peinture;



class AdminController extends Controller

{

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {



    }



    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function myAdmin()

    {

        return view('myAdmin');

    }



    /**

     * Show the my users page.

     *

     * @return \Illuminate\Http\Response

     */

    public function myUsers()

    {

        return view('myUsers');

    }

    /**

     * Show the upload peitnture images page.

     *

     * @return \Illuminate\Http\Response

     */

     public function voir_categories()
     {
       $scs = Sous_categorie::all(); #提取该表下所有数据

       return view('admin/functionpages/voir_tous_les_categories',compact(['scs']));#传入视图
     }

     public function voir_peintures()
     {
       $ps = Peinture::all(); #提取该表下所有数据

       return view('admin/functionpages/voir_tous_les_peintures',compact(['ps']));#传入视图
     }


    public function myAdminUpload()

    {
        $scs = Sous_categorie::all(); #提取该表下所有数据
        return view('admin/functionpages/myAdmin-images-upload',compact(['scs']));

    }

    public function myAdminUploadCategorie()
    {
      return view('admin/functionpages/myAdmin-new-sous-categories');
    }

    public function storeSousCategories(request $request)
    {
      // if ($request->hasFile(''));
      $this->validate($request,[
        'category'=>'required',
        'sous_categories'=>'required',
      ]);

      $sous_categories = new Sous_categorie;
      $sous_categories->name = $request ->input('sous_categories');
      $sous_categories->categories = $request -> input('category');
      $sous_categories->save();

      return 'Vous avez réussi à ajouter un nouveau sous categorie';

    }

    public function storePeintures(request $request)
    {
      // $this->validate($request,[
      //   'category'=>'required',
      //   'sous_categories'=>'required',
      //   'title'=>'required',
      //   'description'=>'required',
      //   'file'=>'required',
      // ]);

      if ($request->hasFile('file')){

        $filename = $request->file->getClientOriginalName();
        $filepath = $request->file->storeAs('public/upload',$filename);
        $request->file->storeAs('public/upload',$filename);

        $peinture = new Peinture;
        $peinture->name = $request ->input('title');
        $peinture->sous_categories = $request->input('sous-categories');
        $peinture->categories = $request ->input('category');
        $peinture->description = $request ->input('description');
        $peinture->prix = $request ->input('prix');
        $peinture->path = $filepath;

        $peinture->save();

        return 'Vous avez réussi à ajouter un nouveau peinture';

     }
    }

}
