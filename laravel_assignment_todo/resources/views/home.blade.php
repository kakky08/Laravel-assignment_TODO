@extends('layouts.app')

@section('content')
<h1>ToDoリスト</h1>
<form method="GET" id="select-form" action="/tasks">
    <div class="form-check form-check-inline">
        <input class="form-check-input post" type="radio" name="select" id="select1" value="2" onclick="formSwitch()">
        <label class="form-check-label" for="select1">すべて</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="select" id="select2"  onclick="formSwitch()" value="0">
        <label class="form-check-label" for="select2">作業中</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="select" id="select3"  onclick="formSwitch()" value="1">
        <label class="form-check-label" for="select3">完了</label>
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
        @if ($tasks->count() !== 0)
        @foreach ($tasks as $key=>$task)
        <tr>
            <th scope="row">{{ $key }}</th>
            <td>{{ $task->comment }}</td>
            <td class="row">
                <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                    @method('PUT')
                    @csrf
                    <button type="submit" class="btn btn-secondary margin-right">{{ $task->is_state ? '完了' : '作業中' }}</button>
                </form>
                <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-secondary">削除</button>
                </form>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
<h2>新規タスクの追加</h2>
<form method="POST" action="{{ route('tasks.store') }}" class="form-inline">
    @csrf
    <div class="form-group">
        <input type="text" name="task" class="form-control margin-right">
    </div>
    <button type="submit" class="btn btn-secondary form-btn">追加</button>
</form>
<script>
    const formSwitch = () =>
{
    return document.getElementById('select-form').submit();
}
</script>
@endsection
