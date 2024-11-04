@extends('layouts.admin_main')

@section('title', 'Post')
@section('pagename', 'Post')

@section('content')
    {{-- <section class="content">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $error }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
            Create
        </button>
        <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Post Creation</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('post.create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <select class="form-select" name="category_id" aria-label="Default select example">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="name"
                                    placeholder="Jahon yangiliklari...">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Description</label>
                                <input type="text" class="form-control" name="description" id="name"
                                    placeholder="Jahon yangiliklari...">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Body</label>
                                <input type="text" class="form-control" name="body" id="name"
                                    placeholder="Jahon yangiliklari...">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" id="name">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row mt-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Posts</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($models as $model)
                                    <tr>
                                        <td>{{ $model->id }}</td>
                                        <td>{{ $model->title }}</td>
                                        <td>{{ $model->description }}</td>
                                        <td><img src="{{ $model->image }}" alt="" width="100px"></td>
                                        <td>
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                data-bs-target="#edit{{ $model->id }}">
                                                Edit
                                            </button>
                                            <div class="modal fade" id="edit{{ $model->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Category
                                                                Creation</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('post.edit', $model->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')

                                                                <div class="mb-3">
                                                                    <select class="form-select" name="category_id"
                                                                        aria-label="Default select example">
                                                                        <option value="{{ $model->category_id }}">
                                                                            {{ $model->category->name }}</option>
                                                                        @foreach ($categories as $category)
                                                                            @if ($category->id == $model->category_id)
                                                                                {{ 'continiue' }}
                                                                            @endif
                                                                            <option value="{{ $category->id }}">
                                                                                {{ $category->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="name" class="form-label">Title</label>
                                                                    <input type="text" class="form-control"
                                                                        name="title" id="name"
                                                                        placeholder="Jahon yangiliklari..."
                                                                        value="{{ $model->title }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="name"
                                                                        class="form-label">Description</label>
                                                                    <input type="text" class="form-control"
                                                                        name="description" id="name"
                                                                        value="{{ $model->description }}"
                                                                        placeholder="Jahon yangiliklari...">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="name" class="form-label">Body</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $model->body }}" name="body"
                                                                        id="name"
                                                                        placeholder="Jahon yangiliklari...">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="name" class="form-label">Image</label>
                                                                    <input type="file" class="form-control"
                                                                        name="image" id="name">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <form action="{{ route('post.delete', $model->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{ $models->links() }}
            </div>
        </div>
    </section> --}}
@endsection
