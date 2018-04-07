<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
//路由get请求，还有个post请求
Route::get('basic1',function (){
    return 'hello word';
});
//路由群组，any注册所有路由请求
Route::any('multy2',function (){
   return 'multy2';
});
//路由数字和字母的正则测试
Route::get('use/{id}/{name?}',function ($id,$name){
   return 'user-'.$id.'-name-'.$name;
})->where(['id'=>'[0-9]+','name'=> '[a-z]+']);
//路由视图测试
Route::get('view', function () {
    return view('welcome');
});
//路由和控制器测试
//Route::get('member/info','MemberController@info');
/*Route::any('member/info',[
    'uses'=>'MemberController@info',
    'as'=>'memberinfo'
]);*/
Route::get('member/{id}','MemberController@info')
->where('id','[0-9]+');

Route::any('test1',['uses'=>'StudentController@test1']);

Route::any('query1',['uses'=>'StudentController@query1']);
Route::any('query2',['uses'=>'StudentController@query2']);
Route::any('query3',['uses'=>'StudentController@query3']);
Route::any('query4',['uses'=>'StudentController@query4']);
Route::any('query5',['uses'=>'StudentController@query5']);

Route::any('orm1',['uses'=>'StudentController@orm1']);
Route::any('orm2',['uses'=>'StudentController@orm2']);
Route::any('orm3',['uses'=>'StudentController@orm3']);
Route::any('orm4',['uses'=>'StudentController@orm4']);

Route::any('section1',['uses'=>'StudentController@section1']);

Route::any('url',['as'=>'url','uses'=>'StudentController@urlTest']);

Route::any('request1',['uses'=>'StudentController@request1']);