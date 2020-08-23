@extends('layouts.default')

@section('title','New Post')

@section('content')
<h1>
  <a href="{{ url('/') }}" style="float: right;font-size: 12px">Back</a>
  New Post
</h1>
<form method="post" action="{{ url('/posts') }}">
{{ csrf_field()}}
<p>
  <input type="text" name="title" placeholder="enter title" value="{{ old('title') }}">
  @if($errors->has('title'))
    <span class="error">{{$errors->first('title')}}</span>
  @endif
</p>
<p>
  <textarea name="body" placeholder="enter body" value="{{ old('body') }}"></textarea>
  @if($errors->has('body'))
    <span class="error">{{$errors->first('body')}}</span>
  @endif
</p>
<p>
  <input type="submit" value="Add">
</p>
@endsection