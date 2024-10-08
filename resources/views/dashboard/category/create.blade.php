<div class="offcanvas offcanvas-end" tabindex="-1" id="add-category" aria-labelledby="add-category-label">
    <div class="offcanvas-header">
        <h5 id="add-category-label">Add New Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <!-- Add Category Form -->
        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="categoryName" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="categoryName" name="name" placeholder="Enter category name" required>
            </div>

            <div class="mb-3">
                <label for="categoryDescription" class="form-label">Description</label>
                <textarea class="form-control" id="categoryDescription" name="description" rows="3" placeholder="Enter category description" required></textarea>
            </div>

            <div class="mb-3">
                <label for="userId" class="form-label">User</label>
                <select class="form-select" id="userId" name="user_id" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="categoryImage" class="form-label">Category Image</label>
                <input type="file" class="form-control" id="categoryImage" name="image">
            </div>

            <button type="submit" class="btn btn-primary">Add Category</button>
        </form>
    </div>
</div>
