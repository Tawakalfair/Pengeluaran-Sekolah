@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <div class="d-flex align-items-center">
                  <h2> All Question</h2>
                  <div class="ml-auto">
                    <a href="{{route('questions.create')}}" class="btn btn-outline-secondary">Ask Question</a>
                  </div>
                </div>

              </div>

                <div class="card-body">
                  @include('layouts._messages')
                  @foreach ($questions as $question)
                    <div class="media">
                      <div class="d-flex flex-column counters">
                        <div class="vote">
                        <strong>{{$question->votes}}</strong> {{str_plural('vote',$question->votes)}}
                        </div>
                        <div class="status {{$question->status}}">
                          <strong>{{$question->answers_count}}</strong> {{str_plural('answer',$question->answers_count)}}
                        </div>
                        <div class="view">
                          {{$question->views ." ".str_plural('view',$question->views)}}
                        </div>
                      </div>
                    <div class="media-body">
                      <div class="d-flex align-items-center">
                        <h3 class="mt-0"><a href="{{$question->url}}">{{$question->title}}</a></h3>
                        <div class="ml-auto">
                          @if (Auth::user()->can('update-question',$question))
                          <a href="{{route('questions.edit',$question->id)}}" class="btn btn-outline-info btn-sm">Edit</a>
                          @endif

                          @if (Auth::user()->can('delete-question',$question))
                            <form class="form-delete" action="{{route('questions.destroy',$question->id)}}" method="post">
                              @method('DELETE')
                              @csrf
                              <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('are you sure ?')">Delete</button>
                            </form>
                          @endif

                        </div>
                      </div>

                      <p class="lead">
                        Asked by
                        <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                        <small class="text-muted">{{$question->created_date}}</small>
                      </p>
                      {{str_limit($question->body,250)}}
                    </div>
                    </div>
                    <hr>
                  @endforeach
                  <div class="pagination justify-content-center">
                    {{$questions->links()}}
                  </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection