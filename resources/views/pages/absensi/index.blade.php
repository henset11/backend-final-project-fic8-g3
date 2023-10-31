@extends('layouts.app')

@section('title', 'Absensi')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>All Absensi Mahasiswa</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Absensi</a></div>
                    <div class="breadcrumb-item">All Absensi</div>
                </div>
            </div>
            <div class="section-body">
                @include('layouts.alert')
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Absensi</h4>
                                <div class="section-header-button">
                                    <a href="{{ route('absensiweb.create') }}" class="btn btn-primary">New Absensi</a>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="float-right">
                                    <form method="GET", action="{{ route('absensiweb.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="name">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>Nama Mahasiswa</th>
                                            <th>Hari</th>
                                            <th>Pertemuan</th>
                                            <th>Status</th>
                                            <th>Keterangan</th>
                                            <th>Kode Absensi</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($absensi_matkuls as $row)
                                            <tr>

                                                <td>
                                                    {{ $row->name }}
                                                </td>
                                                <td>
                                                    {{ $row->hari }}
                                                </td>
                                                <td>
                                                    {{ $row->pertemuan }}
                                                </td>
                                                <td>
                                                    {{ $row->status }}
                                                </td>
                                                <td>
                                                    {{ $row->keterangan }}
                                                </td>
                                                <td>
                                                    {{ $row->kode_absensi }}
                                                </td>
                                                <td>
                                                    {{ $row->latitude }}
                                                </td>
                                                <td>
                                                    {{ $row->longitude }}
                                                </td>

                                                <td>
                                                <div class="d-flex justify-content-center">
                                                        <a href="{{ route('absensiweb.edit', $row->id) }}"
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>Edit</a>
                                                   

                                                        {{-- <form action="{{ route('absensiweb.destroy', $row->id) }}" method="POST"
                                                            class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE" />
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}" />
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i>Delete</button>
                                                        </form> --}}

                                                        <button class="btn btn-sm btn-danger btn-icon confirm-delete"
                                                            onclick="deleteConfirmation('{{ route('absensiweb.destroy', $row->id) }}')">
                                                            <i class="fas fa-times"></i>
                                                            Delete
                                                        </button>

                                                        <form id="form-delete"
                                                            action="{{ route('absensiweb.destroy', $row->id) }}" method="POST"
                                                            style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>

                                                    </div>


                                                </td>
                                            </tr>
                                        @endforeach

                                        </tr>
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $absensi_matkuls->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
    <script src="{{ asset('js/page/modules-sweetalert.js') }}"></script>
@endpush
