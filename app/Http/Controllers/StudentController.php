<?php
namespace  App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function test1()
    {
     //   return 'test1';
      //  $students= DB::select('select * from student');
     //   var_dump($students);
        //数据库新增 insert
        //$bool=DB::insert('insert into student(name,age) values (?,?)',['yage',25]);
        //var_dump($bool);
        //数据库修改 update
        //$num=DB::update('update student set age =? where name =? ',[23,'shenjian']);
        //var_dump($num);
        //数据库查询 select
        //$students= DB::select('select * from student where id >?',[1]);
        //dd($students);
        //数据库删除 delete
        //$num=DB::delete('delete from student where id>?',[1]);
        //var_dump($num);
    }
//使用查询构造器添加数据
    public function query1()
    {
//        $bool=DB::table('student')->insert(
//            ['name'=>'xutao','age'=>26]
//        );
//        var_dump($bool);
//        $id=DB::table('student')->insertgetid(
//            ['name'=>'binjie','age'=>26]
//        );
//        var_dump($id);
        $bool=DB::table('student')->insert([
            ['name'=>'wangsai','age'=>26],
            ['name'=>'qiangge','age'=>26]
        ]);
        var_dump($bool);
    }
//使用查询构造器更新数据
    public function query2()
    {
//        $num=DB::table('student')
//        ->where('id',1)
//        ->update(['age'=>18]);
//        var_dump($num);
       // $num=DB::table('student')->increment('age',2);
        $num=DB::table('student')
            ->where('id',1)
            ->decrement('age',2,['name'=>'smilej']);
        var_dump($num);
    }
//使用查询构造器删除数据  DB::table('student')->truncate(); 清空数据表，不返回任何值
    public function query3()
    {
        $num=DB::table('student')
            ->where('id','>=',6)
            ->delete();
        var_dump($num);
    }
//使用查询构造器查询数据
    public function query4()
    {
        //get
        // $student=DB::table('student')->get();  //get是返回所有
        //first
//        $student=DB::table('student')
//            ->orderBy('id','desc')
//            ->first();
        //where
//        $student=DB::table('student')
//              ->where('id','>=',4)
//              ->get();
//        $student=DB::table('student')
//            ->whereRAW('id >=? and age>?',[4,26])
//            ->get();
        //pluck   //返回指定的字段
//        $student=DB::table('student')
//        ->whereRAW('id >=? and age>?',[4,26])
//        ->pluck('name');  //指定name字段
        //lists  和pluck差不多，但是可以指定下标
//        $student=DB::table('student')
//            ->whereRAW('id >=? and age>?',[4,26])
//            ->lists('name','id');  //指定name字段和下标id
//        dd($student);
        //select  选择指定返回的字段
//        $student=DB::table('student')
//            ->whereRAW('id >=? and age>?',[4,26])
//            ->select('name','id','age')  //指定name字段和下标id
//            ->get();
        //  dd($student);
        //chunk
        echo '<pre>';
        DB::table('student')->chunk(2, function ($students) {
            var_dump($students);
            return false;
        });
    }
//查询构造器的聚合函数
    public function query5()
    {
       // $num=DB::table('student')->count();
       // $max=DB::table('student')->max('age');
       // $min=DB::table('student')->min('age');
       // $avg=DB::table('student')->avg('age');
        $sum=DB::table('student')->sum('age');
        var_dump($sum);
    }

}
