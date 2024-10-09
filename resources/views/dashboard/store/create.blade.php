<div class="offcanvas offcanvas-end" tabindex="-1" id="add-store" aria-labelledby="add-store-label">
    <div class="offcanvas-header">
        <h5 id="add-store-label">Add New Store</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <!-- Add Store Form -->
        <form action="{{ route('stores.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="storeName" class="form-label">Store Name</label>
                <input type="text" class="form-control" id="storeName" name="name" placeholder="Enter store name" required>
            </div>

            <div class="mb-3">
                <label for="storeDescription" class="form-label">Description</label>
                <textarea class="form-control" id="storeDescription" name="description" rows="3" placeholder="Enter store description" required></textarea>
            </div>

            <div class="mb-3">
                <label for="storeWebsite" class="form-label">Website</label>
                <input type="url" class="form-control" id="storeWebsite" name="website" placeholder="Enter store website URL">
            </div>

            <div class="mb-3">
                <label for="storeWhatsApp" class="form-label">WhatsApp</label>
                <input type="tel" class="form-control" id="storeWhatsApp" name="whatsapp" placeholder="Enter WhatsApp number">
            </div>

            <div class="mb-3">
                <label for="storeCity" class="form-label">City</label>
                <select class="form-select" id="storeCity" name="city_id" required>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="storeImage" class="form-label">Store Image</label>
                <input type="file" class="form-control" id="storeImage" name="image" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Add Store</button>
        </form>

    </div>
</div>
