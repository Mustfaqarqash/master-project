<div class="offcanvas offcanvas-end" tabindex="-1" id="add-offer" aria-labelledby="add-offer-label">
    <div class="offcanvas-header">
        <h5 id="add-offer-label">Add New Offer</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <!-- Add Offer Form -->
        <form action="{{ route('offer.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="offerTitle" class="form-label">Offer Title</label>
                <input type="text" class="form-control" id="offerTitle" name="title" placeholder="Enter offer title" required>
            </div>

            <div class="mb-3">
                <label for="offerDescription" class="form-label">Description</label>
                <textarea class="form-control" id="offerDescription" name="description" rows="3" placeholder="Enter offer description" required></textarea>
            </div>

            <div class="mb-3">
                <label for="offerCategoryId" class="form-label">Offer Category</label>
                <select class="form-select" id="offerCategoryId" name="offers_category_id" required>
                    @foreach($offerCategories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
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
                <label for="offerImage" class="form-label">Offer Image</label>
                <input type="file" class="form-control" id="offerImage" name="image" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Offer</button>
        </form>
    </div>
</div>
