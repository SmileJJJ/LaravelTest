<?php
namespace  App\Http\Controllers;

use App\Http\Requests\Request;
use App\Student;
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

    public function orm1()
    {
        //all()
      //  $students=Student::all();

        //find()
      //  $students=Student::find(1);

        //findorfail //查询不到就报错
       // $students=Student::findorfail(2);

       // $students=Student::get();

//        $students=Student::where('id','>','1')
//        ->orderby('age','desc')
//        ->first();

//        echo '<pre>';
//        Student::chunk(2,function($student){
//            var_dump($student);
//        });
     //   dd($students);

        //聚合函数
     //   $num=Student::count();
      //  $num=Student::sum('age');
      //  $num=Student::avg('age');
      //  var_dump($num);
    }
    public function orm2()
    {
        //使用模型新增数据
//        $student= new Student();
//        $student->name='shenjian1';
//        $student->age=20;
//        $bool=$student->save();
//        dd($bool);
//        $Student=Student::find(13);
//        echo date('Y-m-d H:i:s'); //,$Student->created_at
        //使用模型的create方法新增数据
//        $student=Student::create(
//            ['name'=>'sj','age'=>21]
//        );
//        dd($student);
        //firstorcreated 以属性查找用户，若没有，则新增，并取得新的实例
//        $student=Student::firstOrcreate(
//            ['name'=>'sjj']
//        );
        //firstornew  //和created不同在于，新增但是不会自动保存进数据库，需要手动保存
        $student=Student::firstornew(
            ['name'=>'sjjj']
        );
        $bool=$student->save();
        dd($bool);

    }
    public function orm3()
    {
        //通过模型更新数据
//        $student=Student::find(1);
//        $student->name='kitty';
//        $bool=$student->save();
//        dd($bool);
        $num=Student::where('id','>',8)->update(
            ['age'=>55]
        );
        var_dump($num);
    }

    public function orm4()
    {
        //通过模型删除
//        $student=Student::find(16);
//        $bool=$student->delete();
//        dd($bool);
        //通过主键删除
      //  $num=Student::destroy(14,14);
//        $num=Student::destroy([10,11]);
//        dd($num);
        //删除指定条件数据
        $num=Student::where('age','>',30)->delete();
        dd($num);
    }

    public function section1()
    {
        $students=Student::get();
       // $students=[];
        $name='xutao';
        $arr=['yage','xutao'];
        return view('student.section1',[
            'name'=>$name,
            'arr'=>$arr,
            'students'=>$students,
        ]);
    }

    public function urlTest()
    {
        return '徐涛是溜溜球';
    }

    public function request1(\Illuminate\Http\Request  $request)
    {
        //1.取值
        //echo $request->input('name');
        //echo $request->input('sax','未知');
//        if($request->has('name'))
//        {
//            echo $request->input('name');
//        }
//        else{echo '无该参数';}
//        $ary=$request->all();
//        dd($ary);
        //2.判断请求类型
//        echo $request->method();
//        if($request->isMethod('get'))
//        {echo  'YES';}
//        else {echo 'NO';}
//        $res=$request->ajax();
//        var_dump($res);
//        $res=$request->is('student/*');
//        var_dump($res);
        echo  $request->url();
    }
}
