@extends('layouts.main')
@section('container')
<div class="row">
    <div class="col-12 mb-4">
        <img src="{{ asset('img/a5f0e031592e11b0d022e8a963140a43.jpg') }}" class="d-block rounded-3" height="500" width="100%"
                  alt="...">
    </div>
    <div class="col-12">
            <Article>
                <h1 class="fw-bold mb-2">Layanan Pengaduan Sekolah</h1>
                <p>Selamat datang di Layanan Pengaduan Sekolah, di layanan ini kamu dapat melaporkan apapun yang berkaitan dengan masalah yang sedang terjadi di lingkungan sekitar sekolahmu, layanan ini dapat digunakan untuk memudahkan siswa dalam mengadukan aspirasi yang sedang terjadi.</p>
                <p></p>
            </Article>
      
    </div>
    <div class="col-12">
        <a href="/aspirasi" class="btn btn-warning fw-bold">Silahkan Ajukan Pengaduan</a>
    </div>
</div>
@endsection