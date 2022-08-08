@extends('layouts.master')

@section('headline', 'ToDo-Challenge')

@section('content')
    
    <div class="row my-4">
        <div class="col">
            <form method="post" action="{{ route('todo.store') }}" id="js-todo-create-form">
                @csrf
                
                <div class="row">
                    <div class="col-9">
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="col-3">
                        <button class="btn btn-success w-100" type="submit">Speichern</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    
    <div id="js-todo-list" data-url="{{ route('todo.load-list') }}">
        
    </div>
@endsection