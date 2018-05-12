<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rule;
use App\Model\Department;
use App\Model\Position;
use Illuminate\Support\Facades\Auth;
use App\Createlink;
use Carbon\Carbon;

use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    private $department;
    private $position;

    public function __construct()
    {
        $this->middleware('auth.basic.once', ['except' => ['store']]);

        $this->middleware(function ($request, $next) {
            $this->department = Auth::user() ? Auth::user()->department : null;
            $this->position = Auth::user() ? Auth::user()->position : null;
            return $next($request);
        })->except('store');
    }

    /**
     * GET /users
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 搜索查看成员 => 主席团&秘书部
        if(!($this->department == Department::ZHUXITUAN
             || $this->department == Department::MISHUBU || $this->department == Department::XIANGMUKAIFABU)) {
            return response()->json(['status' => 403, 'msg' => 'forbidden'], 403);
        }

        return User::All();
    }

    /**
     * GET /users/create
     *
     * Deprecated.  Use POST /user instead
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('404');
    }

    /**
     * POST /users
     *
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, string $link)
    {
        //尝试加入搜索link功能,如果找到可以注册，找不到返回一个错误
        $searchlink = Createlink::find($link);
        if($searchlink == null) {
            return response()->json(['status' => 404, 'msg' => '没有此注册链接!']);
        }
        $depart=Createlink::find($link)->department;
        $posit=Createlink::find($link)->position;
        //比较当前注册时间与数据库中expires过期时间，如果大于，不允许注册，链接失效
        $expires = (Createlink::find($link)->expires);
        $expires_time = (date_parse_from_format("y-m-d H:i:s",$expires));
        $now = Carbon::now();
        $now_time = (date_parse_from_format("y-m-d H:i:s",$now));
        if($expires_time<($now_time)){
          return response()->json(['status' => 400, 'msg' => '注册链接已过期!']);
        }

        //比较当前注册时间与数据库中expires过期时间，如果大于，不允许注册，链接失效
        // 该段代码重复了
        // $expires = (Createlink::find($link)->expires);
        // $expires_time = (date_parse_from_format("y-m-d H:i:s",$expires));
        // $now = Carbon::now();
        // $now_time = (date_parse_from_format("y-m-d H:i:s",$now));
        // if($expires_time<($now_time)){
        //   return response()->json(['status' => 400, 'msg' => 'Link times out!'], 400);
        // }


        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|max:255',
            'password' => 'required',
            'name' => 'required|max:100',
            /*'department' => [
            	'required',
            	Rule::in(\App\Model\Department::getKeys()),
            ],
            'position' => [
            	'required',
            	Rule::in(\App\Model\Position::getKeys()),
            ],*/
            'school' => 'required|max:100',
            'phone_number' => 'required|digits_between:10,15',
            'birthday' => 'required|date',
            'arrive_date' => 'required|date'
            
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        // 转化传进来部门和位置的字母为中文
     //    $array_key_department = \App\Model\Department::getKeys();
     //    $array_value_department = \App\Model\Department::getValues();
    	// for($x=0;$x<count($array_key_department);$x++){
    	// 	if ($array_key_department[$x] == $request->department){
    	// 		$request->department = $array_value_department[$x];
    	// 	}
    	// }
    	// $array_key_position = \App\Model\Position::getKeys();
     //    $array_value_position = \App\Model\Position::getValues();
    	// for($x=0;$x<count($array_key_position);$x++){
    	// 	if ($array_key_position[$x] == $request->position){
    	// 		$request->position = $array_value_position[$x];
    	// 	}
    	// }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->department = $depart;
        $user->position = $posit;
        $user->school = $request->school;
        $user->phone_number = $request->phone_number;
        $user->birthday = $request->birthday;
        $user->arrive_date = $request->arrive_date;
        $user->password = Hash::make($request->password);
        $user->isWorking = True;
        $user->isAvaible = True;
        $user->save();

        return response()->json(['status' => 200, 'msg' => '用户: '.$user->name.', 邮箱: '.$user->email.', 部门: '.$user->department.', 职位: '.$user->position.' 创建成功!']);
    }

    /**
     * GET /users/{user.id}
     *
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!ctype_digit($id)) {
            return response()->json(['status' => 400, 'msg' => 'Bad Request. Invalid input.'], 400);
        }

        // 搜索查看成员 => 主席团&秘书部
        if(!($this->department == Department::ZHUXITUAN
             || $this->department == Department::MISHUBU || $this->department == Department::XIANGMUKAIFABU)) {
            return response()->json(['status' => 403, 'msg' => 'forbidden'], 403);
        }

        return User::where('id', $id)
                    ->get();
    }

    /**
     * GET /users/{user}/edit
     *
     * Deprecated.
     * Use POST /users instead
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('404');
    }

    /**
     * PUT/PATCH /users/{user.id}
     *
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!ctype_digit($id)) {
            return response()->json(['status' => 400, 'msg' => 'Bad Request. Invalid input.'], 400);
        }


        // 修改成员 => 主席团&秘书部部长&秘书部副部长
        if(!($this->department == Department::ZHUXITUAN ||
             $this->department == Department::XIANGMUKAIFABU ||
            ($this->department == Department::MISHUBU &&
                ($this->position == Position::BUZHANG || $this->position == Position::FUBUZHANG)))) {
            return response()->json(['status' => 403, 'msg' => '主席团，秘书部; 部长, 副部长']);
        }

        $messages = [
            'boolean' =>  'The :attribute field must be 1 or 0.',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'email' => [
                'required',
                'max:100',
                Rule::unique('users')->ignore($id),
            ],
            'school' => 'required|max:100',
            'phone_number' => 'required|digits_between:10,15',
            'department' => [
            	'required',
            	Rule::in(\App\Model\Department::getKeys()),
            ],
            'position' => [
            	'required',
            	Rule::in(\App\Model\Position::getKeys()),
            ],
            'birthday' => 'required|date',
            'arrive_date' => 'required|date',
            'dimission_date' => 'date|nullable',
            'isAvaible' => 'boolean',
            'isWorking' => 'required|boolean'
        ],
        $messages);

        if ($validator->fails()) {
            return $validator->errors();
        }

        // 转化传进来部门和位置的字母为中文
        $array_key_department = \App\Model\Department::getKeys();
        $array_value_department = \App\Model\Department::getValues();
    	for($x=0;$x<count($array_key_department);$x++){
    		if ($array_key_department[$x] == $request->department){
    			$request->department = $array_value_department[$x];
    		}
    	}
    	$array_key_position = \App\Model\Position::getKeys();
        $array_value_position = \App\Model\Position::getValues();
    	for($x=0;$x<count($array_key_position);$x++){
    		if ($array_key_position[$x] == $request->position){
    			$request->position = $array_value_position[$x];
    		}
    	}


        $userDb = User::find($id);

        if ($userDb === null) {
            return response()->json(['status' => 404, 'msg' => 'User not exists']);
        }

        if($request->name) {
            $userDb->name = $request->name;
        }
        if($request->email) {
            $userDb->email = $request->email;
        }
        if($request->department) {
            $userDb->department = $request->department;
        }
        if($request->position) {
            $userDb->position = $request->position;
        }
        if($request->school) {
            $userDb->school = $request->school;
        }
        if($request->phone_number) {
            $userDb->phone_number = $request->phone_number;
        }
        if($request->birthday) {
            $userDb->birthday = $request->birthday;
        }
        if($request->arrive_date) {
            $userDb->arrive_date = $request->arrive_date;
        }
        if($request->password) {
            $userDb->password = Hash::make($request->password);
        }
        if($request->isWorking || $request->isWorking == 0) {
            $userDb->isWorking = $request->isWorking;
        }

        if($request->isAvaible) { //此处数据库里的数值不能是null
            $userDb->isAvaible = $request->isAvaible;
        }
        // return response()->json(['status' => 200, 'msg' => $request->dimission_date]);
        if($request->dimission_date|| !$request->dimission_date) {
            $userDb->dimission_date = $request->dimission_date;
        }

        $userDb->save();

        return response()->json(['status' => 200, 'msg' => 'success to update']);
    }

    /**
     * DELETE /users/{user_id}
     *
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        if(!ctype_digit($user_id)) {
            return response()->json(['status' => 400, 'msg' => 'Bad Request. Invalid input.'], 400);
        }

        // 删除 => 主席团&秘书部部长&秘书部副部长
        if(!($this->department == Department::ZHUXITUAN ||
            $this->department == Department::XIANGMUKAIFABU ||
            ($this->department == Department::MISHUBU &&
                ($this->position == Position::BUZHANG || $this->position == Position::FUBUZHANG)))) {
            return response()->json(['status' => 403, 'msg' => 'forbidden'], 403);
        }

        $userDel = User::find($user_id);

        if ($userDel === null) {
            return response()->json(['status' => 400, 'msg' => 'User not exists'], 403);
        }
        if ($userDel->id === $user_id) {
            return response()->json(['status' => 400, 'msg' => 'You can not delete your self'], 400);
        }

        $userDel->delete();

        return response()->json(['status' => 200, 'msg' => 'success to delete']);
    }

    /**
     * GET /users/count/show
     *
     * count user
     *
     * @return \Illuminate\Http\Response
     */
    public function countUser()
    {
        // 搜索查看成员 => 主席团&秘书部
        if(!($this->department == Department::ZHUXITUAN
             || $this->department == Department::MISHUBU
             || $this->department == Department::XUANCHUANBU
             || $this->department == Department::XIANGMUKAIFABU)) {
            return response()->json(['status' => 403, 'msg' => 'forbidden'], 403);
        }

        return User::All()->count();
    }

    /**
     * GET /users/{user.id}/posts
     *
     * Get all post of a user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    private function showPostsByUserId($id) {
        if(!ctype_digit($id)) {
            return response()->json(['status' => 400, 'msg' => 'Bad Request. Invalid input.'], 400);
        }

        $result = User::find($id)->posts()->get();
        foreach($result as $p){
            $p->setHidden(['html_content']);
        };
        return $result;
    }
}
