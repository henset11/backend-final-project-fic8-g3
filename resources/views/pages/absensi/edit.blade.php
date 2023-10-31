@extends('layouts.app')

@section('title', 'Update Absensi')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Update Absensi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Absensi</a></div>
                    <div class="breadcrumb-item">Update Absensi</div>
                </div>
            </div>

            <div class="section-body">


                <div class="card">
                        <form action="{{ route('absensiweb.update', $absensimatkul) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="card-header">
                            <h4>Update Absen</h4>
                        </div>
                        <div class="card-body">
                           
                     
                        <div class="form-group">
                            <label>Jadwal</label>
                            <input type="text" class="form-control" value="{{ $absensimatkul->hari }} | Jam {{ $absensimatkul->jam_mulai }} - {{ $absensimatkul->jam_selesai }}" readonly>

                        </div>

                        <div class="form-group">
                            <label>Mahasiswa</label>
                            <input type="text" class="form-control "value="{{ $absensimatkul->name }}" readonly>

                        </div>

                            <div class="form-group">
                                <label>Kode Absensi</label>
                                <input type="text" class="form-control @error('kode_absensi') is-invalid @enderror" value="{{ $absensimatkul->kode_absensi }}" placeholder="Buat Kode Absensi "
                                    name="kode_absensi" required>
                                <div class="invalid-feedback">
                                    @error('kode_absensi')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                            <label>Tahun Akademik</label>
                            <select name="tahun_akademik"
                                class="form-control select2 @error('tahun-akademik') is-invalid @enderror">
                                <option value="2023/2024" @if ($absensimatkul->tahun_akademik == '2023/2024') selected @endif>2023/2024
                                </option>
                                <option value="2022/2023" @if ($absensimatkul->tahun_akademik == '2022/2023') selected @endif>2022/2023
                                </option>
                                <option value="2021/2022" @if ($absensimatkul->tahun_akademik == '2021/2022') selected @endif>2021/2022
                                </option>
                                <option value="2020/2021" @if ($absensimatkul->tahun_akademik == '2020/2021') selected @endif>2020/2021
                                </option>
                            </select>
                        </div>
                            <div class="form-group">
                                <label>Semester</label>
                                <select name="semester" class="form-control @error('semester') is-invalid @enderror">
                                    <option value="Semester 1" @if ($absensimatkul->semester == 'Semester 1') selected @endif>Semester 1</option>
                                    <option value="Semester 2" @if ($absensimatkul->semester == 'Semester 2') selected @endif>Semester 2</option>
                                    <option value="Semester 3" @if ($absensimatkul->semester == 'Semester 3') selected @endif>Semester 3</option>
                                    <option value="Semester 4" @if ($absensimatkul->semester == 'Semester 4') selected @endif>Semester 4</option>
                                    <option value="Semester 5" @if ($absensimatkul->semester == 'Semester 5') selected @endif>Semester 5</option>
                                    <option value="Semester 6" @if ($absensimatkul->semester == 'Semester 6') selected @endif>Semester 6</option>
                                    <option value="Semester 7" @if ($absensimatkul->semester == 'Semester 7') selected @endif>Semester 7</option>
                                    <option value="Semester 8" @if ($absensimatkul->semester == 'Semester 8') selected @endif>Semester 8</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pertemuan</label>
                                <input type="number" class="form-control @error('pertemuan') is-invalid @enderror" value="{{ $absensimatkul->pertemuan }}" placeholder="Pertemuan ke berapa"
                                    name="pertemuan" required>
                                <div class="invalid-feedback">
                                    @error('pertemuan')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status"  class="form-control @error('status') is-invalid @enderror">
                                <option value="Hadir" @if ($absensimatkul->status == 'Hadir') selected @endif>Hadir</option>
                                <option value="Tidak Hadir" @if ($absensimatkul->status == 'Tidak Hadir') selected @endif>Tidak Hadir</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <select name="keterangan" class="form-control @error('keterangan') is-invalid @enderror">
                                <option value="Izin" @if ($absensimatkul->keterangan == 'Izin') selected @endif>Izin</option>
                                <option value="Sakit" @if ($absensimatkul->keterangan == 'Sakit') selected @endif>Sakit</option>
                                <option value="Tanpa Keterangan" @if ($absensimatkul->keterangan == 'Tanpa Keterangan') selected @endif>Tanpa Keterangan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Latitude</label>
                                <input type="number" value="{{ $absensimatkul->latitude }}" class="form-control @error('latitude') is-invalid @enderror"
                                    name="latitude">
                                <div class="invalid-feedback">
                                    @error('latitude')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Longitude</label>
                                <input type="number" value="{{ $absensimatkul->longitude }}" class="form-control @error('longitude') is-invalid @enderror"
                                    name="longitude">
                                <div class="invalid-feedback">
                                    @error('longitude')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nilai</label>
                                <select name="nilai" class="form-control @error('nilai') is-invalid @enderror">
                                <option value="A" @if ($absensimatkul->nilai == 'A') selected @endif>A</option>
                                <option value="B" @if ($absensimatkul->nilai == 'B') selected @endif>B</option>
                                <option value="C" @if ($absensimatkul->nilai == 'C') selected @endif>C</option>
                                <option value="D" @if ($absensimatkul->nilai == 'D') selected @endif>D</option>
                                <option value="E" @if ($absensimatkul->nilai == 'E') selected @endif>E</option>
                                </select>
                            </div>
                          
                            <input type="hidden" name="created_by" value="{{ $absensimatkul->created_by }}">
                            <input type="hidden" name="updated_by" value="{{ $absensimatkul->id }}">

                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                    </form>


                </div>
            </div>
          
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
