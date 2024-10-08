@extends('layouts.dashboard')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xl">
            <div class="card mb-6">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit SubCategory</h5>
                    <small class="text-body float-end">Modify subcategory details</small>
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

                    <form action="{{ route('subCategory.update', $subCategory->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-floating form-floating-outline mb-6">
                            <input type="text" class="form-control" id="subCategoryName" placeholder="SubCategory Name" name="name" value="{{ old('name', $subCategory->name) }}" required />
                            <label for="subCategoryName">SubCategory Name</label>
                        </div>

                        <div class="form-floating form-floating-outline mb-6">
                            <select name="category_id" id="categoryId" class="form-control" required>
                                @foreach($categories as $category)
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="Current Image" width="40" class="mt-2" />
                                    <option value="{{ $category->id }}" {{ $subCategory->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <label for="categoryId">Parent Category</label>
                        </div>

                        <div class="form-floating form-floating-outline mb-6">
                            <input type="file" class="form-control" name="image" />
                            <label for="image">Update SubCategory Image (optional)</label>
                            @if($subCategory->image)
                                <img src="{{ asset('storage/' . $subCategory->image) }}" alt="Current Image" width="100px" class="mt-2" />
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary d-grid w-100">Update SubCategory</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
