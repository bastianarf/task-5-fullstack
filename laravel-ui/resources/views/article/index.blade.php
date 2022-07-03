@extends('layouts.app')
@section('title') Article @endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@yield('title')</div>
                <div class="card-body">
                    @include('layouts.messages')
                    <a href="{{ route('article.create') }}" class="btn btn-primary btn-sm">Add @yield('title')</a>
                    <table class="table table-bordered mt-4">
                        <thead>
                            <tr>
                                <th scope="col" width="30">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Category</th>
                                <th scope="col" width="130">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $d)
                            <tr>
                                <th scope="row">{{  $loop->iteration }}</th>
                                <td><a href="{{ route('detail', $d->id) }}" target="_blank">{{ $d->title }}</a></td>
                                <td>{{ $d->category->name }}</td>
                                <td>
                                        <a href="{{ route('article.edit', $d->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('article.destroy', $d->id) }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin HAPUS?')">
                                                Delete
                                            </button>
                                        </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">Empty</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
