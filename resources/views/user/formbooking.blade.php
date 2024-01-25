@extends('layouts.user')

@section('content')
    <main id="main">
        <section id="about" class="about">
            <div class="container">

                <div class="section-title">
                    <h2>Form Booking</h2>
                    <p> Welcome to our hiking tour booking service. Please complete the information below to book the tour
                        that best fits your needs. </p>
                </div>
                <div class="row">
                    <div class="col-lg-12 pt-4 pt-lg-0 content">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-success">Form Detail</h6>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <form method="POST" action="/mountainables">
                                        @csrf
                                        <div class="control-group after-add-more">
                                            <div class="row mb-3">
                                                <label for="name" class="col-sm-4 col-form-label">Name</label>
                                                <div class="col-sm-8">
                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        id="name" name="name">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="birth" class="col-sm-4 col-form-label">Date of birth</label>
                                                <div class="col-sm-8">
                                                    <input type="date"
                                                        class="form-control @error('birth') is-invalid @enderror"
                                                        id="birth" name="birth">
                                                    @error('birth')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="address" class="col-sm-4 col-form-label">Address</label>
                                                <div class="col-sm-8">
                                                    <input type="text"
                                                        class="form-control @error('address') is-invalid @enderror"
                                                        id="address" name="address">
                                                    @error('address')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="price" class="col-sm-4 col-form-label">Gender</label>
                                                <div class="col-sm-8">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="no_tlp" class="col-sm-4 col-form-label">Phone Number</label>
                                                <div class="col-sm-8">
                                                    <input type="number"
                                                        class="form-control @error('no_tlp') is-invalid @enderror"
                                                        id="no_tlp" name="no_tlp">
                                                    @error('no_tlp')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="price" class="col-sm-4 col-form-label">Nationality</label>
                                                <div class="col-sm-8">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                        <label class="form-check-label" for="inlineRadio1">Malaysia</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                        <label class="form-check-label"
                                                            for="inlineRadio2">Non-Malaysia</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="idn_numb" class="col-sm-4 col-form-label">Identity
                                                    Number</label>
                                                <div class="col-sm-8">
                                                    <input type="number"
                                                        class="form-control @error('idn_numb') is-invalid @enderror"
                                                        id="idn_numb" name="idn_numb">
                                                    @error('idn_numb')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="idn_img" class="col-sm-4 col-form-label">Identity
                                                    Image</label>
                                                <div class="col-sm-8">
                                                    <input type="file"
                                                        class="form-control @error('idn_img') is-invalid @enderror"
                                                        id="idn_img" name="idn_img" onchange="previewImage()">
                                                </div>
                                            </div>
                                            {{-- <div class="row mb-3">
                                                <label for="price" class="col-sm-4 col-form-label">Solo/Team</label>
                                                <div class="col-sm-8">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                        <label class="form-check-label" for="inlineRadio1">Solo</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                                        <label class="form-check-label" for="inlineRadio2">Team</label>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <button class="btn btn-success add-more" type="button">
                                                <i class="glyphicon glyphicon-plus"></i> Add Member
                                            </button>
                                            <hr>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit data</button>
                                    </form>
                                    <!-- class hide membuat form disembunyikan  -->
                                    <!-- hide adalah fungsi bootstrap 3, klo bootstrap 4 pake invisible  -->
                                    <div class="copy d-none">
                                        <div class="control-group">
                                            <label>Nama</label>
                                            <input type="text" name="nama[]" class="form-control">
                                            <label>Jenis Kelamin</label>
                                            <input type="text" name="jk[]" class="form-control">
                                            <label>Alamat</label>
                                            <input type="text" name="alamat[]" class="form-control">
                                            <label>Jurusan</label>
                                            <select class="form-control" name="jurusan">
                                                <option>Sistem Informasi</option>
                                                <option>Informatika</option>
                                                <option>Akuntansi</option>
                                                <option>DKV</option>
                                            </select>
                                            <br>
                                            <button class="btn btn-danger remove" type="button"><i
                                                    class="glyphicon glyphicon-remove"></i> Remove</button>
                                            <hr>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".add-more").click(function() {
                var html = $(".copy").html();
                $(".after-add-more").after(html);
            });

            // saat tombol remove dklik control group akan dihapus 
            $("body").on("click", ".remove", function() {
                $(this).parents(".control-group").remove();
            });
        });
    </script>
@endsection
