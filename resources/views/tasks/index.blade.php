@extends('layouts.app')

@section('content')

    <h1>タスク一覧</h1>

    @if (count($tasks) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>メッセージ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    {{--    タスク詳細ページへのリンク　--}}
                    <td>{!! link_to_route('tasks.show',$task->id, ['task' => $task->id]) !!}</td>
                    <td>{{ $task->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    
    {{--メッセージ作成メッセージのリンク--}}
   {!! link_to_route('tasks.create', '＋', [], ['class' => 'btn btn-primary']) !!}
    
    
    

@endsection