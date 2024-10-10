@extends('layouts.dashboard')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xl">
            <div class="row mb-12 g-6">
                <div class="col-md">
                    <div class="card">
                        <div class="row g-0">
                            <div class="col-md-2">
                                @if ($offer->images->isNotEmpty())
                                    <img class="card-img card-img-left" src="{{ asset('storage/' . $offer->images->first()->path) }}" alt="Card image" />
                                @else
                                    <img class="card-img card-img-left" src="{{ asset('path/to/default/image.jpg') }}" alt="Default image" />
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $offer->title }}</h5>
                                    <p class="card-text">{{ $offer->description }}</p>
                                    <p class="card-text"><small class="text-muted">{{ $offer->created_at->format('Y/m/d') }}</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12">
                <div class="card mb-6">
                    <div class="card-header px-0 pt-0">
                        <div class="nav-align-top">
                            <ul class="nav nav-tabs nav-fill" role="tablist">
                                <li class="nav-item">
                                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-favorites" aria-controls="navs-justified-favorites" aria-selected="true">
                                        <span class="d-none d-sm-block"><i class="tf-icons ri-star-line me-1_5"></i> Favorites</span>
                                        <i class="ri-star-line ri-20px d-sm-none"></i>
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-ratings" aria-controls="navs-justified-ratings" aria-selected="false">
                                        <span class="d-none d-sm-block"><i class="tf-icons ri-star-half-line me-1_5"></i> Ratings</span>
                                        <i class="ri-star-half-line ri-20px d-sm-none"></i>
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-justified-feedback" aria-controls="navs-justified-feedback" aria-selected="false">
                                        <span class="d-none d-sm-block"><i class="tf-icons ri-message-2-line me-1_5"></i> Feedback</span>
                                        <i class="ri-message-2-line ri-20px d-sm-none"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content p-0">
                            <!-- Favorites Tab -->
                            <div class="tab-pane fade show active" id="navs-justified-favorites" role="tabpanel">
                                <h6>User Favorites</h6>
                                @foreach($favorites as $favorite)
                                    <div class="mb-3">
                                        <strong>{{ $favorite->user->name }}</strong> marked this offer as favorite.
                                    </div>
                                @endforeach
                            </div>

                            <!-- Ratings Tab -->
                            <div class="tab-pane fade" id="navs-justified-ratings" role="tabpanel">
                                <h6>User Ratings</h6>
{{--                                @foreach($ratings as $rating)--}}
{{--                                    <div class="mb-3">--}}
{{--                                        <strong>{{ $rating->user->name }}:</strong>--}}
{{--                                        <p>{{ $rating->rate }} Stars</p>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
                            </div>

                            <!-- Feedback Tab -->
                            <div class="tab-pane fade" id="navs-justified-feedback" role="tabpanel">
                                <h6>User Feedbacks</h6>
                                @foreach($feedbacks as $feedback)
                                    <div class="mb-3">
                                        <strong>{{ $feedback->user->name }}:</strong>
                                        <p>{{ $feedback->feedback }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-6">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Offer Details</h5>
                    <small class="text-body float-end">View offer information</small>
                </div>
                <div class="card-body">
                    <!-- Displaying Errors -->
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <!-- Offer Details -->
                    <div class="mb-3">
                        <h6>Store:</h6>
                        <p>{{ $offer->store->name }}</p>
                    </div>
                    <div class="mb-3">
                        <h6>Category:</h6>
                        <p>{{ $offer->category->name }}</p>
                    </div>
                    <div class="mb-3">
                        <h6>Created At:</h6>
                        <p>{{ $offer->created_at->format('Y/m/d') }}</p>
                    </div>
                    <div class="mb-3">
                        <h6>Updated At:</h6>
                        <p>{{ $offer->updated_at->format('Y/m/d') }}</p>
                    </div>
                    <a href="{{ route('offer.index') }}" class="btn btn-secondary">Back to Offers</a>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
