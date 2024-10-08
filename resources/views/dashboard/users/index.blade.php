@extends('layouts.dashboard')
@section("user_active" , "active")
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">


        <div class="mb-4 row gy-6">
            <!-- Congratulations card -->
            <div class="col-md-12 col-lg-4">
                <div class="card">
                    <div class="card-body text-nowrap">
                        <h5 class="card-title mb-0 flex-wrap text-nowrap">The Last User Data 🎉</h5>
                        <h5 class="mb-2">{{$lastUser->name}}</h5>
                        <h4 class="text-primary mb-0">{{$lastUser->role}}</h4>
                        <p class="mb-2">{{$lastUser->email}}</p>
                        <a href="javascript:;" class="btn btn-sm btn-primary">View details</a>
                    </div>
                    <img
                        src="{{ $lastUser->google_id ? asset( $lastUser->image) :
                                    (  $lastUser->image?asset('storage/' .  $lastUser->image):
                                     asset('assets/img/avatars/3.png')) }}"
                        class="position-absolute bottom-0 end-0   me-5 mb-5"
                        width="83"
                        style="border-radius: 50%"
                        alt="view details" />
                </div>
            </div>
            <!--/ Congratulations card -->
            <!-- Transactions -->
            <div class="col-lg-8">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="card-title m-0 me-2">User Analytics</h5>
                            <div class="dropdown">
                                <button
                                    class="btn text-muted p-0"
                                    type="button"
                                    id="transactionID"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="ri-more-2-line ri-24px"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                                    <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Share</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Update</a>
                                </div>
                            </div>
                        </div>
                        <p class="small mb-0"><span class="h6 mb-0">{{$growth}}</span> 😎users in this month</p>
                    </div>
                    <div class="card-body pt-lg-10">
                        <div class="row g-6">
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="avatar">
                                        <div class="avatar-initial bg-primary rounded shadow-xs">
                                            <i class="ri-vip-crown-line ri-22px"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <p class="mb-0">Admin</p>
                                        <h5 class="mb-0">{{$adminCount}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="avatar">
                                        <div class="avatar-initial bg-success rounded shadow-xs">
                                            <i class="ri-group-line ri-24px"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <p class="mb-0">Users</p>
                                        <h5 class="mb-0">{{$userCount}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="avatar">
                                        <div class="avatar-initial bg-warning rounded shadow-xs">
                                         <i class="ri-macbook-line ri-24px"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <p class="mb-0">Store</p>
                                        <h5 class="mb-0">{{$storeCount}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="avatar">
                                        <div class="avatar-initial bg-info rounded shadow-xs">
                                            <i class="ri-pie-chart-2-line ri-24px"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3">
                                        <p class="mb-0">All Users</p>
                                        <h5 class="mb-0">{{$allUser}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Transactions -->
        </div>


        <!-- Striped Rows -->
        <div class="card">
            <h5 class="card-header">Users Table</h5>
            <!-- Search Form -->
            <div class="row m-2 ">
                <div class="col-lg-12">
                    <form action="{{ route('users.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search by name or email" name="search" value="{{ request('search') }}">
                            <select name="role" class="form-select">
                                <option value="">All Roles</option>
                                <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>User</option>
                                <option value="store" {{ request('role') == 'store' ? 'selected' : '' }}>Store</option>
                            </select>
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($users as $user)
                        <tr>
                            <td>
                                <img src="{{ $user->google_id ? asset($user->image) :
                                    ( $user->image?asset('storage/' . $user->image):
                                     asset('assets/img/avatars/3.png')) }}"
                                     width="40px" style="border-radius: 50%" />

                                <span>{{ $user->name }}</span>
                            </td>

                            <td>{{$user->email}}</td>
                            <td>
                                @if($user->role == "admin")
                                    <div class="d-flex align-items-center">
                                        <i class="ri-vip-crown-line ri-22px text-primary me-2"></i>
                                        <span>Admin</span>
                                    </div>
                                @elseif($user->role == "user")
                                    <div class="d-flex align-items-center">
                                        <i class="ri-user-3-line ri-22px text-success me-2"></i>
                                        <span>User</span>
                                    </div>
                                @elseif($user->role =="store")
                                    <i class="ri-computer-line text-danger ri-22px me-2"></i>
                                    <span>Store</span>
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="ri-more-2-line"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}">
                                            <i class="ri-pencil-line me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="dropdown-item" type="submit">
                                                <i class="ri-delete-bin-6-line me-1"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$users->onEachSide(1)->links()}}
            </div>
        </div>
        <!--/ Striped Rows -->
        <div class="col-lg-4 col-md-6">
            <div class="mt-4">
                <button
                    class="btn btn-primary"
                    type="button"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#add-user"
                    aria-controls="offcanvasBoth">
                    Add Users
                </button>
                @include("dashboard.users.create")
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
