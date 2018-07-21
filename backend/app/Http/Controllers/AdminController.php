<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Item;

use App\Sous_categorie;



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


    public function myAdminUpload()

    {

        return view('admin/functionpages/myAdmin-images-upload');

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

}
