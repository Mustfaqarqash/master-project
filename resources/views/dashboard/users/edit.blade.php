@extends('layouts.dashboard')

@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xl">
            <div class="card mb-6">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ isset($user) ? 'Edit User' : 'Add User' }}</h5>
                    <small class="text-body float-end">Default label</small>
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

                    <form action="{{ isset($user) ? route('users.update', $user->id) : route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($user))
                            @method('PUT')
                        @endif

                        <div class="form-floating form-floating-outline mb-6">
                            <input type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe" name="name" value="{{ old('name', isset($user) ? $user->name : '') }}" required />
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
                                        value="{{ old('email', isset($user) ? $user->email : '') }}"
                                        required
                                    />
                                    <label for="basic-default-email">Email</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-floating form-floating-outline mb-6">
                            <select name="role" id="role" class="form-control" required>
                                <option value="user" {{ (isset($user) && $user->role == 'user') ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ (isset($user) && $user->role == 'admin') ? 'selected' : '' }}>Admin</option>
                                <option value="store" {{ (isset($user) && $user->role == 'store') ? 'selected' : '' }}>Author</option>
                            </select>
                            <label for="role">Role</label>
                        </div>

                        <div class="form-floating form-floating-outline mb-6">
                            <input type="file" class="form-control" name="image" />
                            <label for="image">Profile Image (optional)</label>
                        </div>

                        <button type="submit" class="btn btn-primary d-grid w-100">{{ isset($user) ? 'Update' : 'Add' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
