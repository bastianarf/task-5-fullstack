@extends('layouts.app')
@section('title') {{ $data->title }} @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $data->title }}</h4>
                </div>
                <div class="card-body">
                    <center>
                        <img src="{{ url('uploads/images', $data->image) }}" style="width: 400px;max-width:100%;">
                    </center>
                    <br> <br>
                    {{ \Illuminate\Support\Str::limit($data->content, 20) }}...
                </div>
                <div class="card-footer">
                    <strong>Category:</strong> {{ $data->category->name }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
