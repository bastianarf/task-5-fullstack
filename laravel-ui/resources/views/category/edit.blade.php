@extends('layouts.app')
@section('title') Update Category @endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@yield('title')</div>
                <form method="POST" action="{{ route('category.update', $data->id) }}">
                    @csrf
                    @method('patch')
                    <div class="card-body p-4">
                        <div class="form-group">
                            <label for="input1">Name :</label>
                            <input type="text" class="form-control mt-1 @error('name') is-invalid @enderror" id="input1"
                                aria-describedby="name" placeholder="Enter Name" name="name" value="{{ old('name') ?? $data->name }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">@yield('title')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
