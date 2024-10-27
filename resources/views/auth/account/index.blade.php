@extends("layouts.dashboard")
@section("category", "active")
@section('content')
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-align-top">
                    <ul class="nav nav-pills flex-column flex-md-row mb-6 gap-2 gap-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="javascript:void(0);">
                                <i class="ri-group-line me-1_5"></i> Account
                            </a>
                        </li>

                    </ul>
                </div>

                <!-- Account Information Card -->
                <div class="card mb-6">
                    <!-- Account Info -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-6">
                            <img
                                src="{{ $user->google_id ? asset( $user->image) :
                                    (  $user->image?asset('storage/' .  $user->image):
                                     asset('assets/img/avatars/3.png')) }}"
                                alt="user-avatar"
                                class="d-block w-px-100 h-px-100 rounded"
                                id="uploadedAvatar"
                            />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-sm btn-primary me-3 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">Upload new photo</span>
                                    <i class="ri-upload-2-line d-block d-sm-none"></i>
                                    <input type="file" id="upload" name="profile_image" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                </label>
                                <button type="button" class="btn btn-sm btn-outline-danger account-image-reset mb-4">
                                    <i class="ri-refresh-line d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Reset</span>
                                </button>
                                <div>Allowed JPG, GIF or PNG. Max size of 800K</div>
                            </div>
                        </div>
                    </div>

                    <!-- Form for Account Update -->
                    <div class="card-body pt-0">
                        <form id="formAccountSettings" method="POST" action="{{ route('account.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-1 g-5">
                                <!-- First Name -->
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <input class="form-control" type="text" id="firstName" name="first_name" value="{{ old('first_name', $user->name) }}" required />
                                        <label for="firstName">First Name</label>
                                    </div>
                                </div>

                                <!-- Last Name -->
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <input class="form-control" type="text" id="lastName" name="last_name" value="{{ old('last_name', $user->role) }}" required />
                                        <label for="lastName">Last Name</label>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <input class="form-control" type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required />
                                        <label for="email">Email</label>
                                    </div>
                                </div>

                                <!-- Other Fields -->
                                <!-- Add logic for other fields (e.g., phone_number, country, time_zone, etc.) similar to the ones above -->

                            </div>

                            <!-- Save Button -->
                            <div class="mt-6">
                                <button type="submit" class="btn btn-primary me-3">Save changes</button>
                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Delete Account Card -->
                <div class="card">
                    <h5 class="card-header">Delete Account</h5>
                    <div class="card-body">
                        <form id="formAccountDeactivation" action="{{ route('account.deactivate') }}" method="POST">
                            @csrf
                            <div class="form-check mb-6 ms-3">
                                <input class="form-check-input" type="checkbox" name="account_deactivation" id="accountActivation" />
                                <label class="form-check-label" for="accountActivation">
                                    I confirm my account deactivation
                                </label>
                            </div>
                            <button type="submit" class="btn btn-danger deactivate-account" disabled="disabled">Deactivate Account</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->

    <!-- JavaScript to handle enabling/disabling Deactivate button -->
    <script>
        document.getElementById('accountActivation').addEventListener('change', function() {
            document.querySelector('.deactivate-account').disabled = !this.checked;
        });
    </script>
@endsection
