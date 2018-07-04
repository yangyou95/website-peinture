<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Item;



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

    public function myAdminUpload()

    {

        return view('myAdmin-images-upload');

    }



}
