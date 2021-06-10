@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>

<script type="text/javascript">
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })
        </script>
@stop

@extends('layouts.default')

@section('content')

<form action="{{ route('buku.update', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Buku <b>{{$data->judul}}</b> </h4>
                      <form class="forms-sample">
                        <div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
                            <label for="judul" class="col-md-4 control-label">Judul</label>
                            <div class="col-md-6">
                                <input id="judul" type="text" class="form-control" name="judul" value="{{ $data->judul }}" required>
                                @if ($errors->has('judul'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('judul') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('kategori') ? ' has-error' : '' }}">
                            <label for="kategori" class="col-md-4 control-label">Kategori</label>
                            <div class="col-md-6">
                                <select class="form-control" name="kategori" required="">
                                    <option value=""></option>
                                    <option value="Fiksi"{{$data->kategori === "Fiksi" ? "selected" : ""}}>Fiksi</option>
                                    <option value="Non Fiksi"{{$data->kategori === "Non Fiksi" ? "selected" : ""}}>Non Fiksi</option>
                                    <option value="Teks Pelajaran"{{$data->kategori === "Teks Pelajaran" ? "selected" : ""}}>Teks Pelajaran</option>
                                    <option value="Buku Referensi"{{$data->kategori === "Buku Referensi" ? "selected" : ""}}>Buku Referensi</option>
                                    <option value="Buku Umum"{{$data->kategori === "Buku Umum" ? "selected" : ""}}>Buku Umum</option>
                                    <option value="Buku Teknologi Komputer"{{$data->kategori === "Buku Teknologi Komputer" ? "selected" : ""}}>Buku Teknologi Komputer</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sumber_buku') ? ' has-error' : '' }}">
                            <label for="sumber_buku" class="col-md-4 control-label">Sumber Buku</label>
                            <div class="col-md-6">
                                <select class="form-control" name="sumber_buku" required="">
                                    <option value=""></option>
                                    <option value="Dana Boss"{{$data->sumber_buku === "Dana Boss" ? "selected" : ""}}>Dana Boss</option>
                                    <option value="Sumbangan"{{$data->sumber_buku === "Sumbangan" ? "selected" : ""}}>Sumbangan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('npm') ? ' has-error' : '' }}">
                            <label for="isbn" class="col-md-4 control-label">ISBN</label>
                            <div class="col-md-6">
                                <input id="isbn" type="text" class="form-control" name="isbn" value="{{ $data->isbn }}" required>
                                @if ($errors->has('isbn'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('isbn') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('kode_buku') ? ' has-error' : '' }}">
                            <label for="kode_buku" class="col-md-4 control-label">Kode Buku</label>
                            <div class="col-md-6">
                                <input id="kode_buku" type="text" class="form-control" name="kode_buku" value="{{ $data->kode_buku }}" required>
                                @if ($errors->has('kode_buku'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_buku') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('no_panggil') ? ' has-error' : '' }}">
                            <label for="no_panggil" class="col-md-4 control-label">No Panggil</label>
                            <div class="col-md-6">
                                <input id="no_panggil" type="text" class="form-control" name="no_panggil" value="{{ $data->no_panggil }}" required>
                                @if ($errors->has('no_panggil'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('no_panggil') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('pengarang') ? ' has-error' : '' }}">
                            <label for="pengarang" class="col-md-4 control-label">Pengarang</label>
                            <div class="col-md-6">
                                <input id="pengarang" type="text" class="form-control" name="pengarang" value="{{ $data->pengarang }}" required>
                                @if ($errors->has('pengarang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pengarang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('edisi') ? ' has-error' : '' }}">
                            <label for="edisi" class="col-md-4 control-label">Edisi</label>
                            <div class="col-md-6">
                                <input id="edisi" type="text" class="form-control" name="edisi" value="{{ $data->edisi }}" required>
                                @if ($errors->has('edisi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('edisi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('penerbit') ? ' has-error' : '' }}">
                            <label for="penerbit" class="col-md-4 control-label">Penerbit</label>
                            <div class="col-md-6">
                                <input id="penerbit" type="text" class="form-control" name="penerbit" value="{{ $data->penerbit }}" required>
                                @if ($errors->has('penerbit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('penerbit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('kota_terbit') ? ' has-error' : '' }}">
                            <label for="kota_terbit" class="col-md-4 control-label">Kota Terbit</label>
                            <div class="col-md-6">
                                <input id="kota_terbit" type="text" class="form-control" name="kota_terbit" value="{{ $data->kota_terbit }}" required>
                                @if ($errors->has('kota_terbit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kota_terbit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tahun_terbit') ? ' has-error' : '' }}">
                            <label for="tahun_terbit" class="col-md-4 control-label">Tahun Terbit</label>
                            <div class="col-md-6">
                                <input id="tahun_terbit" type="number" maxlength="4" class="form-control" name="tahun_terbit" value="{{ $data->tahun_terbit }}" required>
                                @if ($errors->has('tahun_terbit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tahun_terbit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('kolasi') ? ' has-error' : '' }}">
                            <label for="kolasi" class="col-md-4 control-label">Kolasi</label>
                            <div class="col-md-6">
                                <input id="kolasi" type="text" class="form-control" name="kolasi" value="{{ $data->kolasi }}" required>
                                @if ($errors->has('kolasi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kolasi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('jumlah_buku') ? ' has-error' : '' }}">
                            <label for="jumlah_buku" class="col-md-4 control-label">Jumlah Buku</label>
                            <div class="col-md-6">
                                <input id="jumlah_buku" type="number" maxlength="4" class="form-control" name="jumlah_buku" value="{{ $data->jumlah_buku }}" required>
                                @if ($errors->has('jumlah_buku'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jumlah_buku') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lokasi') ? ' has-error' : '' }}">
                            <label for="lokasi" class="col-md-4 control-label">lokasi</label>
                            <div class="col-md-6">
                            <select class="form-control" name="lokasi" required="">
                                <option value=""></option>
                                <option value="SMK Wikrama Bogor"{{$data->lokasi === "SMK Wikrama Bogor" ? "selected" : ""}}>SMK Wikrama Bogor</option>
                                <option value="SMK Wikrama Garut"{{$data->lokasi === "SMK Wikrama Garut" ? "selected" : ""}}>SMK Wikrama Garut</option>
                                <option value="SMK Wikrama Palembang"{{$data->lokasi === "SMK Wikrama Palembang" ? "selected" : ""}}>SMK Wikrama Palembang</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('kata_kunci') ? ' has-error' : '' }}">
                            <label for="kata_kunci" class="col-md-4 control-label">Kata Kunci</label>
                            <div class="col-md-6">
                                <input id="kata_kunci" type="text" class="form-control" name="kata_kunci" value="{{ $data->kata_kunci }}" required>
                                @if ($errors->has('kata_kunci'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kata_kunci') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('ringkasan') ? ' has-error' : '' }}">
                            <label for="ringkasan" class="col-md-4 control-label">Ringkasan</label>
                            <div class="col-md-12">
                                <textarea id="ringkasan" class="form-control" name="ringkasan" value="{{ $data->ringkasan }}">{{ $data->ringkasan }}</textarea>
                                @if ($errors->has('ringkasan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ringkasan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('daftar_isi') ? ' has-error' : '' }}">
                            <label for="daftar_isi" class="col-md-4 control-label">Daftar Isi</label>
                            <div class="col-md-12">
                                <textarea id="daftar_isi" class="form-control" name="daftar_isi" value="{{ $data->daftar_isi }}">{{ $data->daftar_isi }}</textarea>
                                @if ($errors->has('daftar_isi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('daftar_isi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('lokasi') ? ' has-error' : '' }}">
                            <label for="lokasi" class="col-md-4 control-label">Lokasi</label>
                            <div class="col-md-6">
                            <select class="form-control" name="lokasi" required="">
                                <option value="SMK Wikrama Bogor" {{$data->lokasi === "SMK Wikrama Bogor" ? "selected" : ""}}>SMK Wikrama Bogor</option>
                                <option value="SMK Wikrama Garut" {{$data->lokasi === "SMK Wikrama Garut" ? "selected" : ""}}>SMK Wikrama Garut</option>
                                <option value="SMK Wikrama Palembang" {{$data->lokasi === "SMK Wikrama Palembang" ? "selected" : ""}}>SMK Wikrama Palembang</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('status_pinjam') ? ' has-error' : '' }}">
                            <label for="status_pinjam" class="col-md-4 control-label">Status Pinjam</label>
                            <div class="col-md-6">
                            <select class="form-control" name="status_pinjam" required="">
                                <option value=""></option>
                                <option value="boleh" {{$data->status_pinjam === "boleh" ? "selected" : ""}}>Boleh</option>
                                <option value="tidak" {{$data->status_pinjam === "tidak" ? "selected" : ""}}>Tidak</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Cover</label>
                            <div class="col-md-6">
                                <img width="200" height="200" @if($data->cover) src="{{ asset('images/buku/'.$data->cover) }}" @endif />
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="cover">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('kondisi') ? ' has-error' : '' }}">
                            <label for="kondisi" class="col-md-4 control-label">Kondisi</label>
                            <div class="col-md-6">
                            <select class="form-control" name="kondisi" required="">
                                <option value=""></option>
                                <option value="Baik" {{$data->kondisi === "Baik" ? "selected" : ""}}>Baik</option>
                                <option value="Rusak" {{$data->kondisi === "Rusak" ? "selected" : ""}}>Rusak</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tingkat_kelas') ? ' has-error' : '' }}">
                            <label for="tingkat_kelas" class="col-md-4 control-label">Tingkat Kelas</label>
                            <div class="col-md-6">
                            <select class="form-control" name="tingkat_kelas" required="">
                                <option value=""></option>
                                <option value="XII" {{$data->tingkat_kelas === "XII" ? "selected" : ""}}>XII</option>
                                <option value="XI" {{$data->tingkat_kelas === "XI" ? "selected" : ""}}>XI</option>
                                <option value="X" {{$data->tingkat_kelas === "X" ? "selected" : ""}}>X</option>
                                <option value="Umum" {{$data->tingkat_kelas === "Umum" ? "selected" : ""}}>Umum</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('harga_buku') ? ' has-error' : '' }}">
                            <label for="harga_buku" class="col-md-4 control-label">Harga Buku</label>
                            <div class="col-md-6">
                                <input id="harga_buku" type="text" class="form-control" name="harga_buku" value="{{ $data->harga_buku }}" required>
                                @if ($errors->has('harga_buku'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('harga_buku') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="file_buku" class="col-md-4 control-label">File Buku</label>
                            <div class="col-md-6">
                                <p>  {{$data->file_buku}} </p>
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="file_buku">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Update
                        </button>
                        <a href="{{route('buku.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection