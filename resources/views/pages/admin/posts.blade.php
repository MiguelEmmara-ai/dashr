@extends('layouts.admin.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Bootstrap Table with Header - Light -->
            <div class="card">
                <h5 class="card-header">All Posts</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Thumbnail</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @forelse ($posts as $post)
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td><strong>{{ $post->title }}</strong></td>
                                    <td><img class="img-fluid" src="https://picsum.photos/120/100"></td>

                                    <td>
                                        <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                                class="avatar avatar-xs pull-up" title="Lilian Fuller">
                                                <img src="{{ asset('/storage/avatar-1.jpg') }}" alt="Avatar"
                                                    class="rounded-circle" />
                                            </li>
                                            <strong>{{ $post->author->name }}</strong>
                                        </ul>
                                    </td>

                                    <td><span class="badge bg-label-success me-1">Published</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('posts.edit', $post->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>

                                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
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
