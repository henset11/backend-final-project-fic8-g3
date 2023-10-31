@extends('layouts.app')

@section('title', 'New Absensi')
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
                <h1>New Absensi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Absensi</a></div>
                    <div class="breadcrumb-item">New Absensi</div>
                </div>
            </div>

            <div class="section-body">


                <div class="card">
                    <form action="{{ route('absensiweb.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>New Absensi</h4>
                        </div>
                        <div class="card-body">
                           
                          
                            <div class="form-group">
                                <label for="Jadwal">Jadwal</label>
                                <select class="form-control select2" name="schedule_id" style="width: 100%;" required>
                                <option value="">Pilih Jadwal</option>
                                    @foreach ($schedules as $schedule)
                                        <option value="{{ $schedule->id }}">{{ $schedule->hari }} | {{ $schedule->jam_mulai }} - {{ $schedule->jam_selesai }} </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="mahasiswa">Mahasiswa</label>
                                <select class="form-control select2" name="student_id" style="width: 100%;">
                                <option value="">Pilih Mahasiswa</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Kode Absensi</label>
                                <input type="text" class="form-control @error('kode_absensi') is-invalid @enderror" placeholder="Buat Kode Absensi "
                                    name="kode_absensi" required>
                                <div class="invalid-feedback">
                                    @error('kode_absensi')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Tahun Akademik</label>
                                <select name="tahun_akademik"  class="form-control  @error('tahun_akademik') is-invalid @enderror">
                                    <option value="2023/2024">2023/2024</option>
                                    <option value="2022/2023">2022/2023</option>
                                    <option value="2021/2022">2021/2022</option>
                                    <option value="2020/2021">2020/2021</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Semester</label>
                                <select name="semester" class="form-control @error('semester') is-invalid @enderror">
                                    <option value="Semester 1">Semester 1</option>
                                    <option value="Semester 2">Semester 2</option>
                                    <option value="Semester 3">Semester 3</option>
                                    <option value="Semester 4">Semester 4</option>
                                    <option value="Semester 5">Semester 5</option>
                                    <option value="Semester 6">Semester 6</option>
                                    <option value="Semester 7">Semester 7</option>
                                    <option value="Semester 8">Semester 8</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pertemuan</label>
                                <input type="number" class="form-control @error('pertemuan') is-invalid @enderror" placeholder="Pertemuan ke berapa ?"
                                    name="pertemuan" required>
                                <div class="invalid-feedback">
                                    @error('pertemuan')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="Hadir">Hadir</option>
                                    <option value="Tidak Hadir">Tidak Hadir</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <select name="keterangan" class="form-control @error('keterangan') is-invalid @enderror">
                                    <option value="Izin">Izin</option>
                                    <option value="Sakit">Sakit</option>
                                    <option value="Tanpa Keterangan">Tanpa Keterangan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Latitude</label>
                                <input type="number" class="form-control @error('latitude') is-invalid @enderror"
                                    name="latitude">
                                <div class="invalid-feedback">
                                    @error('latitude')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Longitude</label>
                                <input type="number" class="form-control @error('longitude') is-invalid @enderror"
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
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                </select>
                            </div>
                            <input type="hidden" name="created_by" value="{{ $loginUser->id }}">
                            <input type="hidden" name="updated_by" value="{{ $loginUser->id }}">


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
