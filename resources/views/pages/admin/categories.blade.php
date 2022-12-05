@extends('layouts.admin.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Bootstrap Table with Header - Light -->
            <div class="card">
                <h5 class="card-header">All Categories</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @forelse ($categories as $category)
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td><strong>{{ $category->name }}</strong></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('admin-categories.edit', $category->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>

                                                <form action="{{ route('admin-categories.destroy', $category->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf

                                                    @method('delete')
                                                    <button class="dropdown-item">
                                                        <i class="bx bx-trash me-1"></i> Delete</button>
                                                </form>

                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center p5">
                                    No Posts
                                </td>
                            </tr>
                        @endforelse

                    </table>
                </div>
            </div>
            <!-- Bootstrap Table with Header - Light -->
        </div>
        <!-- / Content -->

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                    ©
                    <?php echo date('Y'); ?> , made with ❤️ by
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
@endsection
