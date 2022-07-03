@extends('layouts.app')
@section('title') Update Article @endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@yield('title')</div>
                <form method="POST" action="{{ route('article.update', $data->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="card-body p-4">
                        <div class="form-group">
                            <label for="input1">Title :</label>
                            <input type="text" class="form-control mt-1 @error('title') is-invalid @enderror"
                                id="input1" aria-describedby="title" placeholder="Enter title" name="title"
                                value="{{ old('title') ?? $data->title }}" required>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="input1">Content :</label>
                            <textarea class="form-control mt-1 @error('content') is-invalid @enderror" id="input1"
                                aria-describedby="content" placeholder="Enter content" name="content"
                                required>{{ old('content') ?? $data->content }}</textarea>
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="upload">Image :</label>
                            @if ($data->image)
                                <br>
                                <img src="{{ url('uploads/images', $data->image) }}" style="width:200px;max-width:100%;">
                            @endif
                            <br>
                            <input type="file" name="image" class="form-control-file mt-2 @error('image') is-invalid @enderror" id="upload">
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                          </div>
                        <div class="form-group mt-3">
                            <label for="input1">Category :</label>
                            <select class="form-select mt-1 @error('category') is-invalid @enderror" aria-label="Default select example" name="category">
                                <option disabled hidden value="">Pilih Kategori</option>
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->id }}">{{ $k->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
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
