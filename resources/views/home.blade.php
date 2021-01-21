@extends('layouts.app')

@section('content')
<!-- MAIN -->
<div class="col p-4">
    <h1 class="display-4">Pendaftaran Sertifikat Elektronik</h1>
    <div class="card">
        <h5 class="card-header font-weight-light">Information</h5>
        <div class="card-body">
           <p>Pengguna Sertisign diwajibkan untuk melakukan pendaftaran melalui portal yang disediakan. Sertifikat Digisign akan digunakan pada saat melakukan tanda tangan elektronik. 
               Semua informasi tidak akan disimpan dan langsung akan dikirimkan ke PSrE Digisign </p>
        </div>
    </div>
    <h4 class="mt-4">Form Pendaftaran</h4>
    <form action="" method="post">
        <div class="row mt-4">
            <div class="col-md">
                <div class="mb-3">
                    <label for="nama-lengkap" class="form-label">Nama Lengkap</label>
                    <input class="form-control" type="text" value="{{Auth::user()->name}}" name="nama" placeholder="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input class="form-control" type="text" value="{{Auth::user()->email}}" name="email" placeholder="Disabled readonly input" aria-label="Disabled input example" disabled readonly>
                </div>
                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input class="form-control" type="text" name="tlp">
                </div>
                <label for="tempat-lahir" class="form-label">Tempat Lahir</label>
                <div class="mb-3">                    
                     <select class="form-select form-select-lg mb-3" id="birthplace" name="tmp_lahir" aria-label=".form-select-lg example">
                        <option selected>Open this select menu</option>
                       @foreach ($cities as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tanggal-lahir" class="form-label">Tanggal Lahir</label>
                    <input class="form-control" type="text" name="tgl_lahir">
                </div>
                <p>Jenis Kelamin</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Laki-laki
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Perempuan
                    </label>
                </div>                   
            </div>
            <div class="col-md">                           
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea class="form-control" id="address" rows="3"></textarea>
                </div>
                <p>Provinsi</p>
                <div class="mb-3">
                    <select class="form-select form-select-lg mb-3" name="provinci" id="provinci" aria-label=".form-select-lg example">
                        <option selected>Open this select menu</option>
                       @foreach ($provinces as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <p>Kota</p>
                <div class="mb-3">
                    <select class="form-select form-select-lg mb-3" id="kota" name="kota" aria-label=".form-select-lg example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <p>Kecamatan</p>
                <div class="mb-3">
                    <select class="form-select form-select-lg mb-3" id="kecamatan" name="kecamatan" aria-label=".form-select-lg example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <p>Kelurahan</p>
                <div class="mb-3">
                    <select class="form-select form-select-lg mb-3" id="kelurahan" name="kelurahan" aria-label=".form-select-lg example">
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>       
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Kode Pos</label>
                    <input class="form-control" type="text">
                </div>                 
            </div>
            <div class="col-md">     
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nomor KTP</label>
                    <input class="form-control" type="text">
                </div>          
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nomor NPWP</label>
                    <input class="form-control" type="text">
                </div>          
                <div class="mb-3">
                    <label class="form-label" for="fotoktp">Foto KTP</label>
                        <input class="form-control" type="file" id="formFile">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="fotodiri">Foto DIRI</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="fotottd">Foto TTD</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="fotonpwp">Foto NPWP</label>
                    <input class="form-control" type="file" id="formFile">
                </div>                         
            </div>
        </div>
        <div class="row">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>

</div><!-- Main Col END -->

@endsection

@push('scripts')
    <script>
        $(function () {
            $('#provinci').on('change', function () {
                axios.post('{{ route('cities') }}', {id: $(this).val()})
                    .then(function (response) {
                        $('#kota').empty();

                        $.each(response.data, function (id, name) {
                            $('#kota').append(new Option(name, id))
                        })
                    });
            });

            $('#kota').on('change', function () {
                axios.post('{{ route('districts') }}', {id: $(this).val()})
                    .then(function (response) {
                        $('#kecamatan').empty();

                        $.each(response.data, function (id, name) {
                            $('#kecamatan').append(new Option(name, id))
                        })
                    });
            });
            $('#kecamatan').on('change', function () {
                axios.post('{{ route('villages') }}', {id: $(this).val()})
                    .then(function (response) {
                        $('#kelurahan').empty();

                        $.each(response.data, function (id, name) {
                            $('#kelurahan').append(new Option(name, id))
                        })
                    });
            });
        });

        
    </script>
@endpush