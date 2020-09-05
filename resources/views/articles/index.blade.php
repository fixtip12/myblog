@extends('app')

@section('title', '記事一覧')

@section('content')
  @include('nav')
  @if (session('message'))
  <div class="alert alert-success mt-3">{{ session('message') }}</div>
  @endif
  @if (session('error_message'))
  <div class="alert alert-danger mt-3">{{ session('error_message') }}</div>
  @endif
  <div class="container">
    @foreach($articles as $article)
      {{-- ここから削除 --}}    

        {{--略--}}

      {{-- ここまで削除 --}}
      @include('articles.card') {{-- この行を追加 --}}      
    @endforeach
  </div>
@endsection