@extends('admin.layouts.default')

@section('vendorCss')
    <!-- From validate -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/tagify/tagify.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <!-- Upload Multiple -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/dropzone/dropzone.css') }}" />
    <!-- Upload Multiple -->
    <!-- From validate -->
@endsection

@section('vendorJs')
    <!-- Form validate -->
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/bootstrap-select/bootstrap-select.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/tagify/tagify.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
    <!-- Upload Multiple -->
    <script src="{{ asset('assets/vendor/libs/dropzone/dropzone.js') }}"></script>
    <!-- Upload Multiple -->
    <!-- Form validate -->
@endsection

@section('pageJs')
    <script src="{{ asset('assets/js/form-validation.js') }}"></script>
    <script src="{{ asset('assets/js/forms-file-upload.js') }}"></script>
    <script src="{{ asset('assets/js/form-movie.js') }}"></script>
@endsection


@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Movie /</span> Add movie</h4>
        <div class="row">
            <!-- FormValidation -->
            <div class="col-12">
                <div class="card" style="min-height:550px">
                    <h5 class="card-header">Import movie from TMDB</h5>
                    <div class="card-body">
                        <div id="search-movies" class="navbar-nav flex-row border rounded" style="position: relative;">
                            <i class="ti ti-search ti-md me-2 cursor-pointer"
                                style="position: absolute;top: 10px; left: 8px"></i>
                            <input type="text" id="input-movies" class="form-control container-xxl border-0"
                                style="padding: 12px 40px;box-shadow: none;" placeholder="Search..."
                                aria-label="Search..." />
                            <i class="ti ti-x ti-sm cursor-pointer px-2 d-none" id="close"
                                style="line-height: 46.5px"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /FormValidation -->
        </div>
    </div>
@endsection
