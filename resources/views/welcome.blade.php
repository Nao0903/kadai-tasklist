@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name }}
        @include('tasks.index')
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Tasklist</h1>
             {{-- ユーザ登録ページへのリンク --}}
            {!! link_to_route('signup.get', 'アカウント登録してTasklistを利用する', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
     @endif
@endsection