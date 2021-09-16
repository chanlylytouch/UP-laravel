@extends('layout.app')
@section('body')
    <div class="text-center">
        <h6 class="heading">CATEGORIES LIST</h6>
        {{-- <button type="button" class="btn_add_category btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fa fa-plus"></i>
    </button> --}}
    </div>
    <div class="container">
        <a href="form" class="btn btn-info ml-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Create Category</a>
        <table class="table mt-1">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>

                            <a href="form" class="btn btn-info ml-2" data-bs-toggle="modal"
                                data-bs-target="#modelEditForm{{ $category->id }}">Edit</a>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $category->id }}">Delete</button>

                            <div class="modal fade bd-example-modal-sm" id="deleteModal{{ $category->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <form action="{{ route('destroy', $category->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            <div class="modal-body">
                                                @csrf
                                                @method('DELETE')
                                                ARE YOUR SURE WANT TO DELETE?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger">DELETE</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal right fade" id="deleteModal{{ $category->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">

                                <div class="col-4 ml-5">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Create category</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('destroy', $category->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    @csrf
                                                    @method('DELETE')
                                                    Are you sure want to delete this category?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger">DELETE</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    {{-- Edit category modle --}}
                    <div class="modal right fade" id="modelEditForm{{ $category->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Create category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="{{ route('update', $category->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="modal-body">
                                        @csrf
                                        @method('put')
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Name</label>
                                            <input type="text" class="form-control" hidden name="name"
                                                value="{{ $category->id }}" id="recipient-name" placeholder="Name">
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $category->name }}" id="recipient-name" placeholder="Name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Description</label>
                                            <input type="text" class="form-control" name="description"
                                                value="{{ $category->description }}" id="recipient-name"
                                                placeholder="description">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal right fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('create') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="recipient-name" placeholder="Name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Description</label>
                            <textarea class="form-control" name="description" id="message-text"
                                placeholder="Description"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
<style scoped="scss">
    .cards {
        transition: all 0.2s ease;
        cursor: pointer
    }

    .cards:hover {
        box-shadow: 5px 6px 6px 2px #e9ecef;
        transform: scale(1.1)
    }

    .heading {
        font-size: 20px;
        font-weight: 600;
        color: #3D5AFE
    }

    .btn_add_category {
        display: block;
        height: 50px;
        width: 50px;
        border-radius: 50%;
        border: 1px solid red;
        float: right;
    }

</style>
