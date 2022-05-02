@extends('layouts.app')
@section('content')
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{route('category.create')}}" class="btn btn-danger w-100 mb-2">Add article categories</a>

                    <a href="{{route('post.create')}}" class="btn btn-danger w-100 mb-2">Add articles</a>

                    <a href="{{route('post.index')}}" class="btn btn-danger w-100 mb-2">List of articles</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
