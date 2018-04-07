@extends('layouts')

@section('header')
    @parent
    shenjian
@stop

@section('sidebar')
    @parent
    <P>xutao</P>
@stop

@section('content')
    content
    {{--
    <!--1.模板中输出PHP变量-->
    <p>{{$name}}</p>
    <!--2.模板中输出PHP代码-->
    <p>{{date('Y-m-d H:i:s'),time()}}</p>
    <p>{{in_array($name,$arr) ? 'true':'false'}}</p>  //name传进来的变量是否在数组arr里面，是返回true，不是则返回false
    <P>{{var_dump($arr)}}</P>
    <p>{{isset($name) ?$name:'default'}}</p>
    <p>{{$name1 or 'default'}}</p>
    <!--3.原样输出-->
    <p>@{{$name}}</p>     }}
    {{--4.模板注释--}} {{--区别于HTMEL的网页注释，网页注释在网页源码里可以看到，但是模板注释在网页源码里看不到，用于隐藏隐私注释 --}}
    {{--5.引入子视图--}}
    {{--@include('student.common1',['message'=>'溜溜球'])--}}

    <br>
    @if ($name=='yage')
        im yage
    @elseif($name=='xutao')
        im xutao
    @else
        who am i?
    @endif

    <br>
    @if(in_array($name,$arr))
        ture
    @else
        flase
    @endif

    <br>
    @unless($name=='yage')
        i am yage
    @endunless

    <br>
    {{--@for ($i=0;$i<10;$i++)--}}
        {{--<p>{{{$i}}}</p>    //和教程里面不一样的是，变量里面需要三层的{}才能正常显示--}}
    {{--@endfor--}}

    {{--@foreach($students as $student)--}}
       {{--<p>{{{$student->name}}}</p>--}}
    {{--@endforeach--}}

    {{--@forelse($students as $student)--}}
        {{--<p>{{{$student->name}}}</p>--}}
    {{--@empty--}}
    {{--null--}}
    {{--@endforelse--}}
    <br>
    <a href="{{url('url')}}">url()</a>   ? 好像有点问题，直接用路由名不行但是后面用路由别名是可以的
    <br>
    <a href="{{action('StudentController@urlTest')}}">action()</a>
    <br>
    <a href="{{route('url')}}">route()</a>




@stop
