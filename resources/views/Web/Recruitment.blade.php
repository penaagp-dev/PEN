<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PENA</title>
    <!-- ===== FONT GOOGLE ===== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- ===== BOOTSTAP ===== -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- ===== FONT AWESOME ===== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- ===== ICON ===== -->
    <link rel="icon" href="{{ asset('web/assets/image/PENA.png') }}">
    <!-- ===== MY CSS ==== -->
    <link rel="stylesheet" href="{{ asset('web/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/join.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.34/dist/sweetalert2.all.js" integrity="sha256-dM3nV3SuUwK04X1Jp1Pul6Uqob1z+3igyB10aYS48xM=" crossorigin="anonymous"></script>
</head>
<body>
    <!-- ===== LOADING START ===== -->
    <div class="spinner">
        <div class="dot1"></div>
        <div class="dot2"></div>
        <div class="dot3"></div>
    </div>
    <!-- ===== LOADING END ===== -->
    
    <div class="join-form">
        <div class="join-card">
            <h1>Register Form</h1>
            <form id="form-data">
                <div class="input-group-all">
                    <!-- ===== FORM 1 START ===== -->
                    <div id="form1">
                        <div class="w-100">
                            <div class="input-group line">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <input name="nama" type="text" placeholder="Nama Lengkap">
                                <small id="nama-alert" class="form-text text-danger"></small>
                            </div>
                            <div class="input-group line">
                                <input name="panggilan" type="text" placeholder="Nama Panggilan">
                                <small id="panggilan-alert" class="form-text text-danger"></small>
                            </div>
                            <div class="input-group line">
                                <input name="umur" type="number" placeholder="Umur">
                                <small id="umur-alert" class="form-text text-danger"></small>
                            </div>
                            <div class="input-group line">
                                <input name="no_telepon" type="number" placeholder="Nomor WhatsApp">
                                <small id="no_telepon-alert" class="form-text text-danger"></small>
                            </div>
                            <div class="input-group line">
                                <input name="email" type="email" placeholder="Email">
                                <small id="email-alert" class="form-text text-danger"></small>
                            </div>
                            <div class="input-group line">
                                <input name="alamat" type="text" placeholder="Alamat">
                                <small id="alamat-alert" class="form-text text-danger"></small>
                            </div>
                        </div>
                        <div class="w-100">
                            <div class="input-group">
                                <select class="select" name="agama">
                                    <option selected disabled>-Select-</option>
                                    <option value="islam">Islam</option>
                                    <option value="kriten">Kristen</option>
                                    <option value="hindu">Hindu</option>
                                    <option value="budha">budha</option>
                                </select>
                                <small id="agama-alert" class="form-text text-danger"></small>
                            </div>
                            <div class="input-group">
                                <span class="fw-500 mb-2">Semester</span>
                                <table>
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-row">
                                                <label class="cek">
                                                    <input value="1" type="radio" name="semester">
                                                    <div class="checkmark"></div>
                                                </label>
                                                <span>Semester 1</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-row">
                                                <label class="cek">
                                                    <input value="3" type="radio" name="semester">
                                                    <div class="checkmark"></div>
                                                </label>
                                                <span>Semester 3</span>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <small id="semester-alert" class="form-text text-danger"></small>
                            </div>
                            <div class="input-group">
                                <span class="fw-500 mb-2">Jurusan</span>
                                <table>
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-row">
                                                <label class="cek">
                                                    <input value="teknik informatika" type="radio" name="prodi">
                                                    <div class="checkmark"></div>
                                                </label>
                                                <span>Teknik Informatika</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-row">
                                                <label class="cek">
                                                    <input value="sistem informasi" type="radio" name="prodi">
                                                    <div class="checkmark"></div>
                                                </label>
                                                <span>Sistem Informasi</span>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <small id="prodi-alert" class="form-text text-danger"></small>
                            </div>
                            <div class="input-group">
                                <span class="fw-500 mb-2 w-100">Jenis Kelamin</span>
                                <table>
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-row">
                                                <label class="cek">
                                                    <input value="laki laki" type="radio" name="sex">
                                                    <div class="checkmark"></div>
                                                </label>
                                                <span>Laki-Laki</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-row">
                                                <label class="cek">
                                                    <input value="perempuan" type="radio" name="sex">
                                                    <div class="checkmark"></div>
                                                </label>
                                                <span>Perempuan</span>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <small id="sex-alert" class="form-text text-danger"></small>
                            </div>
                            <div class="input-group d-flex flex-column">
                                <span>Foto Selfie</span>
                                <div class="input-foto">
                                    <input type="file" name="foto" class="form-control w-100 text-dark" id="foto">
                                    <small id="foto-alert" class="form-text text-danger"></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-card">
                    <a href="{{route('index')}}" id="back1">
                        <button type="button" class="btn btn-secondary"><i class="fa-solid fa-angle-left"></i> Back</button>
                    </a>

                    <button type="button" class="btn btn-primary" id="btn-send">
                        Send
                        <i class="fa-solid fa-paper-plane"></i>
                    </butt>
                </div>
            </form>
        </div>
    </div>


    <script src="{{ asset('web/js/join.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.34/dist/sweetalert2.all.min.js" integrity="sha256-VY+q0sN0i/R2qdIEtHeJ62U1Q1x1H7qvd08vkIJLDbc=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        })
        const successAllert = () => {
        Swal.fire({
          icon: 'success',
          title: 'Kerja Bagus',
          text: 'Kamu berhasil terdaftar!'
            }).then((res) => {
                if (res.isConfirmed) {
                    window.location.href = "https://penaku.tech";
                }
            })
        }

        const dangerAlert = () => {
            Swal.fire({
            icon: 'warning',
            title: 'Error!',
            text: 'Server sedang bermasalah'
            })
        }
        $(document).on('click', '#btn-send', function() {
            $(this).html('Loading ... <i class="fa-solid fa-spinner"></i>')
            $(this).prop('disabled', true)
            let url = `{{config('app.url')}}/v2/recrutment`
            let data = new FormData($('#form-data')[0])

            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: (res) => {
                    successAllert()
                },
                error: (err) => {
                    let myErr = err.responseJSON
                    if (err.status == 422) {
                        $.each(myErr.errors.data, (i, value) => {
                            $(`#${i}-alert`).html(value)
                        })
                    } else {
                        console.log(err);
                        dangerAlert()
                    }
                    $('#btn-send').html('Send <i class="fa-solid fa-paper-plane"></i>')
                    $('#btn-send').prop('disabled', false)
                }
            })
        })
    </script>
</body>
</html>