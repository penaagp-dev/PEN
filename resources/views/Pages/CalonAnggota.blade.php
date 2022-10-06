@extends('Base.Skelton')
@section('tittle')
    Pendaftar
@endsection
@section('head-content')
    <div class="col-md-12">
        <div class="page-header-title">
            <h5 class="m-b-10">Pendaftar</h5>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#!">Pendaftar</a></li>
        </ul>
    </div>
@endsection
@section('main-content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
              <button class="btn btn-primary rounded" id="btn-add">Tambah Data</button>
            </div>
            <div class="card-body">
              <div class="table-responsive mt-4">
                <table class="table table-striped" id="table-example">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th>Nama</th>
                            <th>Umur</th>
                            <th>Jenis Kelamin</th>
                            <th style="width: 12%">Created</th>
                            <th style="width: 12%">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tb-content">
                    </tbody>
                </table>
              </div>
            </div>
        </div>
    </div>
@endsection
@section('form')
<div class="row py-4">
  <div class="col-md-12">
    <div class="text-center">
      <img id="path" src="" alt="" style="height: auto; width: 30%; padding-bottom: 30px;">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group fill">
        <label >Nama</label>
        <input type="hidden" name="id" id="id">
        <input id="nama" name="nama" type="text" class="form-control" placeholder="input here..." autocomplete="off">
        <small id="nama-alert" class="form-text text-danger"></small>
    </div>
    <div class="form-group fill">
        <label >Panggilan</label>
        <input id="panggilan" name="panggilan" type="text" class="form-control" placeholder="input here..." autocomplete="off">
        <small id="panggilan-alert" class="form-text text-danger"></small>
    </div>
    <div class="form-group fill">
        <label >Umur</label>
        <input id="umur" name="umur" type="number" class="form-control" placeholder="input here..." autocomplete="off">
        <small id="umur-alert" class="form-text text-danger"></small>
    </div>
    <div class="form-group fill">
        <label >Telepon</label>
        <input id="no_telepon" name="no_telepon" type="number" class="form-control" placeholder="input here..." autocomplete="off">
        <small id="no_telepon-alert" class="form-text text-danger"></small>
    </div>
    <div class="form-group fill">
      <label >Email</label>
      <input id="email" name="email" type="email" class="form-control" placeholder="input here..." autocomplete="off">
      <small id="email-alert" class="form-text text-danger"></small>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group fill">
      <label>Agama</label>
      <select class="form-control" id="agama" name="agama">
          <option selected disabled>-Pilih-</option>
          <option value="islam">Islam</option>
          <option value="kristen">Kristen</option>
          <option value="hindu">Hindu</option>
          <option value="budha">Budha</option>
      </select>
      <small id="agama-alert" class="form-text text-danger"></small>
    </div>
    <div class="form-group fill">
      <label>Jenis Kelamin</label>
      <select class="form-control" id="sex" name="sex">
          <option selected disabled>-Pilih-</option>
          <option value="laki laki">Laki Laki</option>
          <option value="perempuan">Perempuan</option>
      </select>
      <small id="sex-alert" class="form-text text-danger"></small>
    </div>
    <div class="form-group fill">
      <label>Prodi</label>
      <select class="form-control" id="prodi" name="prodi">
          <option selected disabled>-Pilih-</option>
          <option value="teknik informatika">Teknik Informatika</option>
          <option value="sistem informasi">Sistem Informasi</option>
      </select>
      <small id="prodi-alert" class="form-text text-danger"></small>
    </div>
    <div class="form-group fill">
      <label>Semester</label>
      <select class="form-control" id="semester" name="semester">
          <option selected disabled>-Pilih-</option>
          <option value="1">Semester 1</option>
          <option value="2">Semester 2</option>
      </select>
      <small id="semester-alert" class="form-text text-danger"></small>
    </div>
    <div class="form-group mb-3">
      <label>Foto</label>
      <div class="custom-file">
        <input type="file" name="foto" class="custom-file-input" id="foto">
        <label class="custom-file-label" for="foto">Choose file</label>
      </div>
      <small id="foto-alert" class="form-text text-danger"></small>
    </div>
  </div>
  <div class="col-md-12 mt-3">
    <div class="form-group fill">
        <label>Alamat</label>
        <textarea id="alamat" name="alamat" class="form-control" rows="3"></textarea>
        <small id="alamat-alert" class="form-text text-danger"></small>
    </div>
  </div>
</div>
@endsection
@section('js-content')
    <script>
      let url = `{{ config('app.url') }}/v2/recruitment`

      const table = $('#table-example').DataTable({
            "bAutoWidth": false
      })

      const getSample = () => {
        table.clear().draw()
        $.get(url, (res) => {
          $.each(res.data, (i, val) => {
            table.row.add([
              i+1 + '.', val.nama, val.umur, val.sex, moment(val.created_at).format("DD MMMM YYYY"),
              `<button class="btn btn-sm btn-outline-primary rounded" id="btn-edit" data-id="${val.id}"><i class="fa-regular fa-pen-to-square"></i></button>
              <button class="btn btn-sm btn-outline-secondary rounded ml-1" id="btn-del" data-id="${val.id}"><i class="fa-regular fa-trash-can"></i></button>`
            ])
            .draw()
          })
        })
      }

      $(document).ready(() => {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        getSample()
      })

      const disableSpinner = () => {
        $('#btn-send').prop('disabled', false)
        $('#btn-send').html('Kirim')
      }

      const fieldList = ['id', 'nama', 'panggilan', 'umur', 'alamat',
        'no_telepon', 'agama', 'email', 'sex', 'semester',
        'prodi']

      const clear = () => {
        $.each(fieldList, (i, val) => {
          $(`#${val}`).val('')
          disableSpinner()
        })
        $('.form-text').html('')
      }

      const successAllert = () => {
        Swal.fire({
          icon: 'success',
          title: 'Good Job',
          text: 'Data has been saved!'
        }).then((res) => {
          if (res.isConfirmed) {
            getSample()
            clear()
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

      const proccessBtn = () => {
        $('#btn-send').prop('disabled', true)
        $('#btn-send').html(`Loading
          <div class="spinner-border spinner-border-sm ml-2" role="status">
            <span class="sr-only">Loading...</span>
          </div>
        `)
      }

      $(document).on('click', '#btn-add', function() {
        clear()
        $('#modalUpdate').modal('show')
      })

      $(document).on('click', '#btn-send', () => {
        let dataSample = new FormData($('#form-upsert')[0])
        proccessBtn()
        $.ajax({
          type: "POST",
          url: url + '/up',
          data: dataSample,
          cache: false,
          contentType: false,
          processData: false,
          success: (result) => {
            $('#modalUpdate').modal('hide')
            successAllert()
          },
          error: (err) => {
            let myErr = err.responseJSON
            if (myErr.errors.length > 0) {
              $('.form-text').html('')
              $.each(myErr.errors.data, (i, value) => {
                $(`#${i}-alert`).html(value)
              })
              disableSpinner()
            } else {
              dangerAlert()
            }
          }
        })
      })

      $(document).on('click', '#btn-edit', function() {
        let _id = $(this).data('id')

        $.get(url + '/' + _id, (result) => {
          $.each(fieldList, (i, value) => {
            $(`#${value}`).val(result.data[value])
          })
          $('#path').show();
          $('#path').attr('src', `{{asset('storage/recrutment/${result.data.foto}')}}`);
          $('#modalUpdate').modal('show')
        })
      })

      $(document).on('click', '#btn-del', function() {
        let _id = $(this).data('id')
        Swal.fire({
          title: 'Apakah anda yakin?',
          text: "Data akan di hapus permanen!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Hapus itu!',
          cancelButtonText: 'Batal',
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              type: "DELETE",
              url: url + '/' + _id,
              success: (result) => {
                Swal.fire(
                  'Deleted!',
                  'Data berhasil di hapus.',
                  'success'
                ).then((result) => {
                  if (result.isConfirmed) {
                    getSample()
                  }
                })
              },
              error: (err) => {
                dangerAlert()
              }
            })
          }
        })
      })
    </script>
@endsection
