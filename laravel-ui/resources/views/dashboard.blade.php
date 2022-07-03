@extends('layouts.app')
@section('title') Dashboard @endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Jumlah Kategori</div>
                <div class="card-body">
                   <h4>{{ $count['category'] }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Jumlah Artikel</div>
                <div class="card-body">
                   <h4>{{ $count['artikel'] }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
