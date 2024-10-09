@extends('layouts.dashboard')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xl">
            <div class="card mb-6">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Product</h5>
                    <small class="text-body float-end">Modify product details</small>
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

                    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Product Name -->
                        <div class="form-floating form-floating-outline mb-6">
                            <input type="text" class="form-control" id="productName" placeholder="Product Name" name="name" value="{{ old('name', $product->name) }}" required />
                            <label for="productName">Product Name</label>
                        </div>

                        <!-- Product Description -->
                        <div class="form-floating form-floating-outline mb-6">
                            <textarea class="form-control" id="productDescription" placeholder="Product Description" name="description" required>{{ old('description', $product->description) }}</textarea>
                            <label for="productDescription">Product Description</label>
                        </div>

                        <!-- Product Price -->
                        <div class="form-floating form-floating-outline mb-6">
                            <input type="number" step="0.01" class="form-control" id="productPrice" placeholder="Product Price" name="price" value="{{ old('price', $product->price) }}" required />
                            <label for="productPrice">Product Price</label>
                        </div>

                        <!-- Discount -->
                        <div class="form-floating form-floating-outline mb-6">
                            <input type="number" step="0.01" class="form-control" id="productDiscount" placeholder="Product Discount" name="discount" value="{{ old('discount', $product->discount) }}" required />
                            <label for="productDiscount">Product Discount (%)</label>
                        </div>

                        <!-- Quantity -->
                        <div class="form-floating form-floating-outline mb-6">
                            <input type="number" class="form-control" id="productQuantity" placeholder="Product Quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}" required />
                            <label for="productQuantity">Product Quantity</label>
                        </div>

                        <!-- Expiration Date -->
                        <div class="form-floating form-floating-outline mb-6">
                            <input type="date" class="form-control" id="expireDate" placeholder="Expiration Date" name="expire_date" value="{{ old('expire_date', $product->expire_date) }}" />
                            <label for="expireDate">Expiration Date (optional)</label>
                        </div>

                        <!-- Store Select -->
                        <div class="form-floating form-floating-outline mb-6">
                            <select name="store_id" id="storeId" class="form-control" required>
                                @foreach($stores as $store)
                                    <option value="{{ $store->id }}" {{ $product->store_id == $store->id ? 'selected' : '' }}>{{ $store->name }}</option>
                                @endforeach
                            </select>
                            <label for="storeId">Store</label>
                        </div>

                        <!-- Subcategory Select -->
                        <div class="form-floating form-floating-outline mb-6">
                            <select name="sub_category_id" id="subCategoryId" class="form-control" required>
                                @foreach($subCategories as $subCategory)
                                    <option value="{{ $subCategory->id }}" {{ $product->sub_category_id == $subCategory->id ? 'selected' : '' }}>{{ $subCategory->name }}</option>
                                @endforeach
                            </select>
                            <label for="subCategoryId">Subcategory</label>
                        </div>

                        <!-- Product Image -->
                        <div class="form-floating form-floating-outline mb-6">
                            <input type="file" class="form-control" name="image" />
                            <label for="image">Update Product Image (optional)</label>
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image->path) }}" alt="Current Image" width="100px" class="mt-2" />
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary d-grid w-100">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
