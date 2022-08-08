@if ($toDos->count() === 0)
    <div class="row">
        <div class="col">
            <div class="alert alert-info">
                Es wurden bisher keine ToDo's angelegt.
            </div>
        </div>
    </div>
@else
    <div class="row">
        <div class="col">
            <ul class="list-group">
                @foreach ($toDos as $toDo)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-10">
                                        @if($toDo->is_done)
                                            <i class="js-todo-undone" data-url="{{ route('todo.toggleDone', $toDo) }}">UNDONE</i>
                                        @else
                                            <i class="js-todo-done" data-url="{{ route('todo.toggleDone', $toDo) }}">DONE</i>
                                        @endif
                                        @if($toDo->is_done)<del>@endif{{ $toDo->title }}@if($toDo->is_done)</del>@endif
                                    </div>
                                    <div class="col-2 text-end">
                                        <i class="js-todo-edit-open" data-id="{{ $toDo->id }}">EDIT</i>
                                    </div>
                                </div>
                            </div>
                            @if($toDo->description)
                                <div class="col-12">
                                    @if($toDo->is_done)<del>@endif
                                        <small><i>{{ $toDo->description }}</i></small>
                                    @if($toDo->is_done)</del>@endif
                                </div>
                            @endif
                        </div>
                        <div class="row my-2" id="js-todo-edit-form-{{ $toDo->id }}" style="display: none;">
                            <div class="col-12">
                                <hr>
                                <form method="post" action="{{ route('todo.update', $toDo) }}">
                                    @csrf
                                    @method('put')

                                    <div class="row my-2">
                                        <div class="col">
                                            <input type="text" name="title" class="form-control" value="{{ $toDo->title }}">
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col">
                                            <textarea name="description" class="form-control">{{ $toDo->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col">
                                            <button type="submit" class="btn btn-success">Speichern</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif