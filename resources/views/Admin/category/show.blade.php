@extends('layouts.app')

@section('content')
@if (Session::has('msg'))
    <div class="alert alert-success">
        <ul>
            <li>{{ Session::get('msg') }}</li>
        </ul>
    </div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add article categories.') }}
                    <a href="{{route('category.create')}}">Back</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{route('category.update',[$categoryPost->id])}}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input value="{{$categoryPost->title}}" type="text" name="title" class="form-control"  />
                            <input class="form-control btn-success mt-2" type="submit" value="Update" />
                        </div>
                    </form>
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection