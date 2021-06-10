@section('js')
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
        $("#f").submit(function () {
            // do ajax submit or just classic form submit
            //  alert("fake subminting")
            return false
        })
    })


    var check = function () {
        if (document.getElementById('password').value ==
            document.getElementById('confirm_password').value) {
            document.getElementById('submit').disabled = false;
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'matching';
        } else {
            document.getElementById('submit').disabled = true;
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'not matching';
        }
    }

</script>
@stop

@extends('layouts.default')

@section('content')

<form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah user baru</h4>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Nama</label>
                                <div class="col-md-6">
                                    <input id="nama" type="text" class="form-control" name="nama"
                                        value="{{ old('nama') }}" required>
                                    @if ($errors->has('nama'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('nis') ? ' has-error' : '' }}">
                                <label for="nis" class="col-md-4 control-label">Nis</label>
                                <div class="col-md-6">
                                    <input id="nis" type="text" class="form-control" name="nis" value="{{ old('nis') }}"
                                        required>
                                    @if ($errors->has('nis'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nis') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('jurusan') ? ' has-error' : '' }}">
                                <label for="jurusan" class="col-md-4 control-label">Jurusan</label>
                                <div class="col-md-6">
                                    <input id="jurusan" type="text" class="form-control" name="jurusan"
                                        value="{{ old('jurusan') }}" required>
                                    @if ($errors->has('jurusan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('jurusan') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="gambar" class="col-md-4 control-label">Gambar</label>
                                <div class="col-md-6">
                                    <img class="product" width="200" height="200" />
                                    <input type="file" class="uploads form-control" style="margin-top: 20px;"
                                        name="gambar">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="jk" class="col-md-4 control-label">Jenis Kelamin</label>
                                <select class="form-control custom-select @error('gender') has-error @enderror"
                                    name="jk">
                                    <option>--  Pilih Jenis Kelamin --</option>
                                    <option value="L" {{ old('jk') == 'L' ? 'selected' : ''}}>Laki-laki</option>
                                    <option value="P" {{ old('jk') == 'P' ? 'selected' : ''}}>Perempuan</option>
                                </select>

                                @error('jk')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                                <label for="level" class="col-md-4 control-label">Level</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="level" required="">
                                        <option value=""></option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" onkeyup='check();'
                                        name="password" required>
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                                <div class="col-md-6">
                                    <input id="confirm_password" type="password" onkeyup="check()" class="form-control"
                                        name="password_confirmation" required>
                                    <span id='message'></span>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="submit">
                                Register
                            </button>
                            <button type="reset" class="btn btn-danger">
                                Reset
                            </button>
                            <a href="{{route('user.index')}}" class="btn btn-light pull-right">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>
@endsection
