@extends('layout')

@section('content')
    <div class="container">
        <form method="POST" action="/todos">
            {{ csrf_field() }}

        <div class="row todo">
            <div class="col"></div>
                <div class="col todo-notepad">
                    <h1>ToDo</h1>
                    <input type="text" class="form-control" name="task" placeholder="what needs to be done?" @keyup.enter="submit" size="35">
                    <br>
                    @foreach($todos as $todo)
                        <div class="todo-tasks">
                            <input class="form-check-input" type="checkbox" value="{{ $todo->isComplete }}" id="{{ $todo->id }}"
                            @if($todo->isComplete)
                                    checked="checked"
                                @endif
                            >       
                            <div>{{ $todo->task }}</div>
                        </div>
                    @endforeach

                    <to-do><to-do>
            </div>
            <div class="col"></div>
        </div>
        </form>

        <br>
        <div class="row">
        <div class="col"></div>
        <div class="col">
          <h4>Items left to do: {{ $remaining->count() }}</h4>
        </div>
        <div class="col"></div>
      </div>

      <br>
      <div class="row">
        <div class="col"></div>
        <div class="col-sm-1">
          <p>View: </p>
        </div>
        <div class="col center">
          <button class="btn btn-outline-dark todo-btn" @click="filterKey = 'all'">All</button>
        </div>
        <div class="col center">
          <button class="btn btn-outline-dark todo-btn" @click="filterKey = 'completed'">Completed</button>
        </div>
        <div class="col center">
          <button class="btn btn-outline-dark todo-btn" @click="filterKey = 'still'">To Do</button>
        </div>
        <div class="col"></div>
      </div>

      <br>

      <div class="row">
        <div class="col"></div>
        <div class="col-sm-1">
          <p>Actions: </p>
        </div>
        <div class="col center">
          <button class="btn btn-outline-dark todo-btn" @click="reactivateAll">Uncheck All</button>
        </div>
        <div class="col center">
          <button class="btn btn-outline-dark todo-btn" @click="completeAll">Complete All</button>
        </div>
        <div class="col center">
          <button class="btn btn-outline-dark todo-btn" @click="clearCompleted">Remove Completed</button>
        </div>
        <div class="col"></div>
      </div>


    </div>
@endsection