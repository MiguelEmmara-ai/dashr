@extends('layouts.admin.app')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Settings /</span> General Settings</h4>

            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills flex-column flex-md-row mb-3">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('general-settings.index') }}"><i
                                    class="bx bx-user me-1"></i>
                                General Settings</a>
                        </li>
                    </ul>
                    @if ($user->user_types == 'admin')
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <form method="POST" action="{{ route('general-settings.update', $general->id) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group mb-3 col-md-8">
                                            <label for="site_title" class="form-label">Site Title</label>
                                            <input class="form-control" type="text" id="site_title" name="site_title"
                                                value="{{ old('site_title') ? old('site_title') : $general->site_title }}" />
                                            @error('site_title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3 col-md-8">
                                            <label for="site_tagline" class="form-label">Site Tagline</label>
                                            <input class="form-control" type="text" id="site_tagline" name="site_tagline"
                                                value="{{ old('site_tagline') ? old('site_tagline') : $general->site_tagline }}" />
                                            @error('site_tagline')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3 col-md-8">
                                            <label for="site_meta_tags" class="form-label">Site Meta Tags</label>
                                            <input class="form-control" type="text" id="site_meta_tags"
                                                name="site_meta_tags"
                                                value="{{ old('site_meta_tags') ? old('site_meta_tags') : $general->site_meta_tags }}" />
                                            @error('site_meta_tags')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3 col-md-8">
                                            <label for="site_meta_description" class="form-label">Site Meta
                                                Description</label>
                                            <input class="form-control" type="text" id="site_meta_description"
                                                name="site_meta_description"
                                                value="{{ old('site_meta_description') ? old('site_meta_description') : $general->site_meta_description }}" />
                                            @error('site_meta_description')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3 col-md-8">
                                            <label for="logo_image" class="form-label">Logo Image</label>
                                            <input class="form-control" type="text" id="logo_image" name="logo_image"
                                                value="{{ old('logo_image') ? old('logo_image') : $general->logo_image }}" />
                                            @error('logo_image')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3 col-md-8">
                                            <label for="footer_copyright" class="form-label">Footer Copyright
                                                Message</label>
                                            <input class="form-control" type="text" id="footer_copyright"
                                                name="footer_copyright"
                                                value="{{ old('footer_copyright') ? old('footer_copyright') : $general->footer_copyright }}" />
                                            @error('footer_copyright')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2 mb-2">Save changes</button>

                                </div>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group mb-3 col-md-8">
                                        <label for="site_title" class="form-label">Site Title</label>
                                        <input class="form-control" type="text" id="site_title" name="site_title"
                                            value="{{ old('site_title') ? old('site_title') : $general->site_title }}" />
                                        @error('site_title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3 col-md-8">
                                        <label for="site_tagline" class="form-label">Site Tagline</label>
                                        <input class="form-control" type="text" id="site_tagline" name="site_tagline"
                                            value="{{ old('site_tagline') ? old('site_tagline') : $general->site_tagline }}" />
                                        @error('site_tagline')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3 col-md-8">
                                        <label for="site_meta_tags" class="form-label">Site Meta Tags</label>
                                        <input class="form-control" type="text" id="site_meta_tags"
                                            name="site_meta_tags"
                                            value="{{ old('site_meta_tags') ? old('site_meta_tags') : $general->site_meta_tags }}" />
                                        @error('site_meta_tags')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3 col-md-8">
                                        <label for="site_meta_description" class="form-label">Site Meta
                                            Description</label>
                                        <input class="form-control" type="text" id="site_meta_description"
                                            name="site_meta_description"
                                            value="{{ old('site_meta_description') ? old('site_meta_description') : $general->site_meta_description }}" />
                                        @error('site_meta_description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3 col-md-8">
                                        <label for="logo_image" class="form-label">Logo Image</label>
                                        <input class="form-control" type="text" id="logo_image" name="logo_image"
                                            value="{{ old('logo_image') ? old('logo_image') : $general->logo_image }}" />
                                        @error('logo_image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3 col-md-8">
                                        <label for="footer_copyright" class="form-label">Footer Copyright Message</label>
                                        <input class="form-control" type="text" id="footer_copyright"
                                            name="footer_copyright"
                                            value="{{ old('footer_copyright') ? old('footer_copyright') : $general->footer_copyright }}" />
                                        @error('footer_copyright')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2 mb-2" disabled>Save
                                        changes</button>
                                        <p>Only Admin can make changes</p>

                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

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
@endsection
