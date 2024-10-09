@extends('layouts.dashboard')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xl">
            <div class="card mb-6">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Store</h5>
                    <small class="text-body float-end">Modify store details</small>
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

                    <form action="{{ route('stores.update', $store->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-floating form-floating-outline mb-6">
                            <input type="text" class="form-control" id="storeName" placeholder="Store Name" name="name" value="{{ old('name', $store->name) }}" required />
                            <label for="storeName">Store Name</label>
                        </div>

                        <div class="form-floating form-floating-outline mb-6">
                            <textarea class="form-control" id="storeDescription" placeholder="Store Description" name="description" required>{{ old('description', $store->description) }}</textarea>
                            <label for="storeDescription">Store Description</label>
                        </div>

                        <div class="form-floating form-floating-outline mb-6">
                            <input type="url" class="form-control" id="storeWebsite" placeholder="Store Website" name="website" value="{{ old('website', $store->website) }}" required />
                            <label for="storeWebsite">Store Website</label>
                        </div>

                        <div class="form-floating form-floating-outline mb-6">
                            <input type="text" class="form-control" id="storeWhatsapp" placeholder="Store Whatsapp" name="whatsapp" value="{{ old('whatsapp', $store->whatsapp) }}" required />
                            <label for="storeWhatsapp">Store Whatsapp</label>
                        </div>

                        <div class="form-floating form-floating-outline mb-6">
                            <select name="city_id" id="cityId" class="form-control" required>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" {{ $store->city_id == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                            <label for="cityId">City</label>
                        </div>

                        <div class="form-floating form-floating-outline mb-6">
                            <input type="file" class="form-control" name="image" />
                            <label for="image">Update Store Image (optional)</label>
                            @if($store->image)
                                <img src="{{ asset('storage/' . $store->image) }}" alt="Current Image" width="100px" class="mt-2" />
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary d-grid w-100">Update Store</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
