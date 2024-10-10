@extends('layouts.dashboard')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xl">
            <div class="card mb-6">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Offer</h5>
                    <small class="text-body float-end">Modify offer details</small>
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
                        <img src="{{ asset('storage/' . $offer->images->first()->path) }}" alt="Offer Image" width="150px" class="mb-5">
                    <form action="{{ route('offer.update', $offer->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Offer Title -->
                        <div class="form-floating form-floating-outline mb-6">
                            <input type="text" class="form-control" id="offerTitle" placeholder="Offer Title" name="title" value="{{ old('title', $offer->title) }}" required />
                            <label for="offerTitle">Offer Title</label>
                        </div>

                        <!-- Offer Description -->
                        <div class="form-floating form-floating-outline mb-6">
                            <textarea class="form-control" id="offerDescription" placeholder="Offer Description" name="description" required>{{ old('description', $offer->description) }}</textarea>
                            <label for="offerDescription">Offer Description</label>
                        </div>

                        <!-- Store Select -->
                        <div class="form-floating form-floating-outline mb-6">
                            <select name="store_id" id="storeId" class="form-control" required>
                                @foreach($stores as $store)
                                    <option value="{{ $store->id }}" {{ $offer->store_id == $store->id ? 'selected' : '' }}>{{ $store->name }}</option>
                                @endforeach
                            </select>
                            <label for="storeId">Store</label>
                        </div>

                        <!-- Offer Category Select -->
                        <div class="form-floating form-floating-outline mb-6">
                            <select name="offers_category_id" id="offerCategoryId" class="form-control" required>
                                @foreach($offerCategories as $category)
                                    <option value="{{ $category->id }}" {{ $offer->offers_category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <label for="offerCategoryId">Offer Category</label>
                        </div>

                        <!-- Offer Image -->
                        <div class="form-floating form-floating-outline mb-6">
                            <input type="file" class="form-control" name="image" />
                            <label for="image">Update Offer Image (optional)</label>




                        </div>

                        <button type="submit" class="btn btn-primary d-grid w-100">Update Offer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection

