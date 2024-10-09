<div class="offcanvas offcanvas-end" tabindex="-1" id="add-product" aria-labelledby="add-product-label">
    <div class="offcanvas-header">
        <h5 id="add-product-label">Add New Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <!-- Add Product Form -->
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="productName" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="productName" name="name" placeholder="Enter product name" required>
            </div>

            <div class="mb-3">
                <label for="productDescription" class="form-label">Description</label>
                <textarea class="form-control" id="productDescription" name="description" rows="3" placeholder="Enter product description" required></textarea>
            </div>

            <div class="mb-3">
                <label for="productPrice" class="form-label">Price</label>
                <input type="number" class="form-control" id="productPrice" name="price" step="0.01" placeholder="Enter product price" required>
            </div>

            <div class="mb-3">
                <label for="productQuantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="productQuantity" name="quantity" placeholder="Enter product quantity" required>
            </div>

            <div class="mb-3">
                <label for="productDiscount" class="form-label">Discount</label>
                <input type="number" class="form-control" id="productDiscount" name="discount" step="0.01" placeholder="Enter product discount" value="0" required>
            </div>

            <div class="mb-3">
                <label for="expireDate" class="form-label">Expire Date</label>
                <input type="date" class="form-control" id="expireDate" name="expire_date" required>
            </div>

            <div class="mb-3">
                <label for="storeId" class="form-label">Store</label>
                <select class="form-select" id="storeId" name="store_id" required>
                    @foreach($stores as $store)
                        <option value="{{ $store->id }}">{{ $store->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="subCategoryId" class="form-label">Sub Category</label>
                <select class="form-select" id="subCategoryId" name="sub_category_id" required>
                    @foreach($subCategories as $subCategory)
                        <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="productImage" class="form-label">Product Image</label>
                <input type="file" class="form-control" id="productImage" name="image" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
</div>
