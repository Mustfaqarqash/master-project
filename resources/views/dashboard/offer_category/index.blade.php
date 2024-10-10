@extends('layouts.dashboard')
@section("offersCategory", "active")
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Last Category Card -->
        <div class="mb-4 row gy-6">
            <!-- Last Category card -->
            <div class="col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-body text-nowrap">
                        <h5 class="card-title mb-0 flex-wrap text-nowrap">The Last Offer Category 🎉</h5>
                        @if($lastCategory)
                            <h5 class="mb-2">{{ $lastCategory->name }}</h5>
                            <h4 class="text-primary mb-0">{{ $lastCategory->description }}</h4>
                            <p class="mb-2">{{ $lastCategory->created_at->format('d M Y') }}</p>
{{--                            <a href="{{ route('offersCategory.show', $lastCategory->id) }}" class="btn btn-sm btn-primary">View details</a>--}}
                        @else
                            <p>No category available yet.</p>
                        @endif
                    </div>
                    <img
                        src="{{ $lastCategory && $lastCategory->image ? asset('storage/' . $lastCategory->image) : '' }}"
                        class="position-absolute bottom-0 end-0 me-5 mb-5"
                        width="83"
                        style="border-radius: 50%"
                        alt="Category Image" />
                </div>
            </div>
            <!--/ Last Category card -->

            <!-- Category Analytics -->
            <div class="col-lg-8">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="card-title m-0 me-2">Offer Category Analytics</h5>
                            <div class="dropdown">
                                <button class="btn text-muted p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ri-more-2-line ri-24px"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                                    <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Share</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Update</a>
                                </div>
                            </div>
                        </div>
                        <p class="small mb-0"><span class="h6 mb-0">{{ $categories->count() }}</span> 😎 categories in total</p>
                    </div>
                    <div class="card-body pt-lg-10">
                        <div class="row g-6">
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="avatar">
                                        <div class="avatar-initial bg-info rounded shadow-xs">
                                            <i class="ri-pie-chart-2-line ri-24px"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <p class="mb-0">Categories</p>
                                        <h5 class="mb-0">{{ $categories->total() }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Category Analytics -->
        </div>

        <!-- Striped Rows -->
        <div class="card">
            <h5 class="card-header">Offers Categories Table</h5>
            <!-- Search Form -->
            <div class="row m-2">
                <div class="col-lg-12">
                    <form action="{{ route('offersCategory.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search by name or description" name="search" value="{{ request('search') }}">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Table -->
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($categories as $category)
                        <tr>
                            <td>
                                @if($category->image)
                                    <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image" width="50px" style="border-radius: 50%">
                                @else
                                    <img src="default-image-path.jpg" alt="Default Image" width="40px" style="border-radius: 50%">
                                @endif
                                <span>{{ $category->name }}</span>
                            </td>


                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="ri-more-2-line"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('offersCategory.edit', $category->id) }}">
                                            <i class="ri-pencil-line me-1"></i> Edit
                                        </a>

                                        <form action="{{ route('offersCategory.destroy', $category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item" type="submit">
                                                <i class="ri-delete-bin-6-line me-1"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="m-2">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
        <!--/ Striped Rows -->

        <!-- Add Category Button -->
        <!-- Add Offer Category Button -->
        <div class="col-lg-4 col-md-6 mt-4">
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#add-offer-category" aria-controls="offcanvasBoth">
                Add Offer Category
            </button>
            @include('dashboard.offer_category.create')
        </div>

    </div>
    <!-- / Content -->
@endsection
