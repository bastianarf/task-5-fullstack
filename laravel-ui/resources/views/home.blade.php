@extends('layouts.app')
@section('title') Home @endsection

@section('content')
<div class="container">
    <div class="row">
        @foreach($data as $d)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header"><h4><a href="{{ route('detail', $d->id) }}">{{ $d->title }}</a></h4></div>
                <div class="card-body">
                    <img src="{{ url('uploads/images', $d->image) }}" style="width: 100%;">
                    <br> <br>
                    {{ \Illuminate\Support\Str::limit($d->content, 20)  }}...
                </div>
                <div class="card-footer">
                   <strong>Category:</strong> {{ $d->category->name }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
