@extends('layouts.app')

@section('content')
<h1>ToDoリスト</h1>
<form method="POST" action="{{-- {{ route('select') }} --}}">
    @csrf
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="category" id="category1" value="1">
        <label class="form-check-label" for="category1">すべて</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="category" id="category2" value="2">
        <label class="form-check-label" for="category2">作業中</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="category" id="category3" value="3">
        <label class="form-check-label" for="category3">完了</label>
    </div>
</form>
<table class="table table-borderless">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">コメント</th>
            <th scope="col">状態</th>
        </tr>
    </thead>
    <tbody>
        @if ($tasks->count() === 0)
            <p>タスクがありません</p>
        @endif
        @foreach ($tasks as $key=>$task)
        <tr>
            <th scope="row">{{ $key }}</th>
            <td>{{ $task->comment }}</td>
            <td class="row">
                <form method="POST" action="{{-- {{ rotue('state.update') }} --}}">
                    {{-- TODO 状態に応じて表示内容の変更 --}}
                    <button type="submit" class="btn btn-secondary margin-right">作業中</button>
                </form>
                <form method="POST" action="{{-- {{ route('delete') }} --}}">
                    <button type="submit" class="btn btn-secondary">削除</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<h2>新規タスクの追加</h2>
<form method="POST" action="{{ route('add') }}" class="form-inline">
    @csrf
    <div class="form-group">
        <input type="text" name="task" class="form-control margin-right">
    </div>
    <button type="submit" class="btn btn-secondary form-btn">追加</button>
</form>
@endsection
