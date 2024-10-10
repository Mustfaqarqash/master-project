@extends('layouts.dashboard')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xl">
            <div class="card mb-6">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Offer Category</h5>
                    <small class="text-body float-end">Modify offer category details</small>
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

                    <form action="{{ route('offersCategory.update', $offerCategory->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-floating form-floating-outline mb-6">
                            <input type="text" class="form-control" id="offerCategoryName" placeholder="Category Name" name="name" value="{{ old('name', $offerCategory->name) }}" required />
                            <label for="offerCategoryName">Offer Category Name</label>
                        </div>
                        <div class="form-floating form-floating-outline mb-6">
                            <input type="file" class="form-control" name="image" />
                            <label for="image">Update Offer Category Image (optional)</label>
                            @if($offerCategory->image)
                                <img src="{{ asset('storage/' . $offerCategory->image) }}" alt="Current Image" width="100px" class="mt-2" />
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary d-grid w-100">Update Offer Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
