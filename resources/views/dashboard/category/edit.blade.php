@extends('layouts.dashboard')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xl">
            <div class="card mb-6">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Category</h5>
                    <small class="text-body float-end">Modify category details</small>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-floating form-floating-outline mb-6">
                            <input type="text" class="form-control" id="categoryName" placeholder="Category Name" name="name" value="{{ old('name', $category->name) }}" required />
                            <label for="categoryName">Category Name</label>
                        </div>

                        <div class="form-floating form-floating-outline mb-6">
                            <textarea class="form-control" id="categoryDescription" placeholder="Category Description" name="description" required>{{ old('description', $category->description) }}</textarea>
                            <label for="categoryDescription">Category Description</label>
                        </div>

                        <div class="form-floating form-floating-outline mb-6">
                            <select name="user_id" id="userId" class="form-control" required>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ $category->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                            <label for="userId">User</label>
                        </div>

                        <div class="form-floating form-floating-outline mb-6">
                            <input type="file" class="form-control" name="image" />
                            <label for="image">Update Category Image (optional)</label>
                            @if($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}" alt="Current Image" width="100px" class="mt-2" />
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary d-grid w-100">Update Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
