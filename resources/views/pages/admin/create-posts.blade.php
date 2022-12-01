@extends('layouts.admin.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Form controls -->
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Create Post</h5>
                    <div class="card-body">

                        <form action="{{ route('posts.store') }}" method="POST" class="mb-5" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" id="title" required placeholder="Amazing title goes here..."
                                    autofocus value="{{ old('title') }}">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group  mb-3">
                                <label for="slug" class="form-label">Slug</label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                    name="slug" id="slug" required value="{{ old('slug') }}">
                                @error('slug')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" name="category_id">
                                    @foreach ($categories as $category)
                                        @if (old('category_id') == $category->id)
                                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="body" class="form-label">Body</label>
                                <input id="body" type="hidden" name="body" required value="{{ old('body') }}">
                                <trix-editor input="body"></trix-editor>
                                @error('body')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Create Post</button>
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
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/all-posts/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug);
        });
    </script>
@endsection
