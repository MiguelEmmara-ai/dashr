@extends('layouts.admin.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Form controls -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Edit Author {{ $user->name }}</h5>
                    <div class="card-body">

                        <div class="form-group mb-3">
                            <label for="status" class="form-label">User Name</label>
                            <input type="text" class="form-control @error('status') is-invalid @enderror" name="status"
                                id="status" readonly value="{{ $author->name }}">
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <form action="{{ route('authors.update', $author->id) }}" method="POST" class="mb-5">
                            @method('PUT')
                            @csrf

                            <div class="form-group mb-3">
                                <label for="title">Status</label>
                                <select name="user_status" required class="form-control">
                                    <option value="{{ $author->user_status }}">({{ $author->user_status }})
                                    </option>
                                    <option value="PENDING">PENDING</option>
                                    <option value="SUSPEND">SUSPEND</option>
                                    <option value="ACTIVE">ACTIVE</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Update Status</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                    © <?php echo date('Y'); ?> , made with ❤️ by
                    <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                </div>
            </div>
        </footer>
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function() {
            fetch('/categories/checkCategorySlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug);
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
@endsection
