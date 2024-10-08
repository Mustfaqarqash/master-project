<div class="offcanvas offcanvas-end" tabindex="-1" id="add-subcategory" aria-labelledby="add-subcategory-label">
    <div class="offcanvas-header">
        <h5 id="add-subcategory-label">Add New SubCategory</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <!-- Add SubCategory Form -->
        <form action="{{ route('subCategory.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="subCategoryName" class="form-label">SubCategory Name</label>
                <input type="text" class="form-control" id="subCategoryName" name="name" placeholder="Enter subcategory name" required>
            </div>

            <div class="mb-3">
                <label for="categoryId" class="form-label">Category</label>
                <select class="form-select" id="categoryId" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="subCategoryImage" class="form-label">SubCategory Image</label>
                <input type="file" class="form-control" id="subCategoryImage" name="image" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Add SubCategory</button>
        </form>
    </div>
</div>
