@extends('layouts.dashboard')
@section("offer", "active")
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Last Offer Card -->
        <div class="mb-4 row gy-6">
            <!-- Last Offer card -->
            <div class="col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-body text-nowrap">
                        <h5 class="card-title mb-0 flex-wrap text-nowrap">The Last Offer 🎉</h5>
                        @if($offers->last())
                            <h5 class="mb-2">{{ $offers->last()->title }}</h5>
                            <p class="mb-2">{{ $offers->last()->description }}</p>
                            <p class="mb-2">{{ $offers->last()->created_at->format('d M Y') }}</p>
                            <a href="{{ route('offer.show', $offers->last()->id) }}" class="btn btn-sm btn-primary">View details</a>
                        @else
                            <p>No offers available yet.</p>
                        @endif
                    </div>
                    @if($offers->last() && $offers->last()->images->first())
                        <img
                            src="{{ asset('storage/' . $offers->last()->images->first()->path) }}"
                            class="position-absolute bottom-0 end-0 me-5 mb-5"
                            width="83"
                            alt="Offer Image" />
                    @endif
                </div>
            </div>
            <!--/ Last Offer card -->

            <!-- Offer Analytics -->
            <div class="col-lg-8">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="card-title m-0 me-2">Offer Analytics</h5>
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
                        <p class="small mb-0"><span class="h6 mb-0">{{ $offers->count() }}</span> 😎 offers in total</p>
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
                                        <p class="mb-0">Offers</p>
                                        <h5 class="mb-0">{{ $offers->total() }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Offer Analytics -->
        </div>

        <!-- Striped Rows -->
        <div class="card">
            <h5 class="card-header">Offers Table</h5>
            <!-- Search Form -->
            <div class="row m-2">
                <div class="col-lg-12">
                    <form action="{{ route('offer.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search by title or description" name="search" value="{{ request('search') }}">
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
                        <th>Title</th>
                        <th>Description</th>
                        <th>Store</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($offers as $offer)
                        <tr>
                            <td>
                                @if($offer->images->first())
                                    <img src="{{ asset('storage/' . $offer->images->first()->path) }}" alt="Offer Image" width="40px" >
                                @else
                                    <img src="default-image-path.jpg" alt="Default Image" width="40px" >
                                @endif
                                <span>{{ $offer->title }}</span>
                            </td>
                            <td>{{ Str::limit($offer->description, 50) }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $offer->store->image) }}" alt="Offer Image" width="40px" >
                                {{ $offer->store->name ?? 'N/A' }}
                            </td>
                            <td>
                                <img src="{{ asset('storage/' . $offer->category->image) }}" alt="Offer Image" width="40px" >
                                {{ $offer->category->name ?? 'N/A' }}
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="ri-more-2-line"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('offer.edit', $offer->id) }}">
                                            <i class="ri-pencil-line me-1"></i> Edit
                                        </a>
                                        <a class="dropdown-item" href="{{ route('offer.show', $offer->id) }}">
                                            <i class="ri-file-info-line"></i> Show
                                        </a>
                                        <form action="{{ route('offer.destroy', $offer->id) }}" method="POST">
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
                    {{ $offers->links() }}
                </div>
            </div>
        </div>
        <!--/ Striped Rows -->

        <!-- Add Offer Button -->
        <div class="col-lg-4 col-md-6 mt-4">
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#add-offer" aria-controls="offcanvasBoth">
                Add Offer
            </button>
            @include("dashboard.offer.create")
        </div>
    </div>
    <!-- / Content -->
@endsection
