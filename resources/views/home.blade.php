@extends('layouts.app')
@section('content')
<div class="container h-100">
    <div class="d-flex flex-row justify-content-center align-items-center">
        <div class="col-md-6">
            <h1 class="text-white display-5 text-center">ToDo.list - простой список задач</h1>
            <task-component></task-component>
        </div>
    </div>
</div>
@endsection