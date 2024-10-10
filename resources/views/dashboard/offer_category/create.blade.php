<div class="offcanvas offcanvas-end" tabindex="-1" id="add-offer-category" aria-labelledby="add-offer-category-label">
    <div class="offcanvas-header">
        <h5 id="add-offer-category-label">Add New Offer Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <!-- Add Offer Category Form -->
        <form action="{{ route('offersCategory.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="offerCategoryName" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="offerCategoryName" name="name" placeholder="Enter category name" required>
            </div>

            <div class="mb-3">
                <label for="offerCategoryDescription" class="form-label">Description</label>
                <textarea class="form-control" id="offerCategoryDescription" name="description" rows="3" placeholder="Enter category description" required></textarea>
            </div>

            <div class="mb-3">
                <label for="offerCategoryImage" class="form-label">Category Image</label>
                <input type="file" class="form-control" id="offerCategoryImage" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Add Offer Category</button>
        </form>
    </div>
</div>
