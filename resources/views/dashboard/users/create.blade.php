<div
    class="offcanvas offcanvas-end"
    data-bs-scroll="true"
    tabindex="-1"
    id="add-user"
    aria-labelledby="offcanvasBothLabel">
    <div class="offcanvas-header">
        <h5 id="offcanvasBothLabel" class="offcanvas-title">Add User</h5>
        <button
            type="button"
            class="btn-close text-reset"
            data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body my-auto mx-0 flex-grow-0">
        <div class="col-xl">
            <div class="mb-6">
                <div class="card-body">
                    <!-- Form for adding a new user -->
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-floating form-floating-outline mb-6">
                            <input type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe" name="name" required />
                            <label for="basic-default-fullname">Full Name</label>
                        </div>

                        <div class="mb-6">
                            <div class="input-group input-group-merge">
                                <div class="form-floating form-floating-outline">
                                    <input
                                        type="email"
                                        id="basic-default-email"
                                        class="form-control"
                                        placeholder="john.doe"
                                        aria-label="john.doe"
                                        name="email"
                                        required
                                    />
                                    <label for="basic-default-email">Email</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-floating form-floating-outline mb-6">
                            <input
                                type="password"
                                id="password"
                                class="form-control"
                                name="password"
                                placeholder="Password"
                                required
                            />
                            <label for="password">Password</label>
                        </div>

                        <div class="form-floating form-floating-outline mb-6">
                            <select name="role" id="role" class="form-control">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                                <option value="store">Author</option>
                            </select>
                            <label for="role">Role</label>
                        </div>

                        <div class="form-floating form-floating-outline mb-6">
                            <input type="file" class="form-control" name="image" />
                            <label for="image">Profile Image (optional)</label>
                        </div>

                        <button type="submit" class="btn btn-primary d-grid w-100">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
