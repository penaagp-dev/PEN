@extends('Base.Skelton')
@section('tittle')
    Galery page
@endsection
@section('head-content')
    <div class="col-md-12">
        <div class="page-header-title">
            <h5 class="m-b-10">Galery</h5>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#!">Galery</a></li>
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
                <table class="table table-striped" id="table-galery">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th>Nama</th>
                            <th>Description</th>
                            <th style="width: 15%">Created</th>
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
    <div class="form-group fill">
        <label>Nama Gambar</label>
        <input type="hidden" name="id" id="id">
        <input id="name" name="name" type="text" class="form-control" placeholder="input here..." autocomplete="off">
        <small id="name-alert" class="form-text text-danger"></small>
    </div>
  </div>
  <div class="col-md-12 mt-2">
    <div class="form-group fill">
        <label>Gambar</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="path">
          <label class="custom-file-label">Pilih file</label>
        </div>
        <small id="path-alert" class="form-text text-danger"></small>
    </div>
  </div>
  <div class="col-md-12 mt-3">
    <div class="form-group fill">
        <label>Deskripsi</label>
        <textarea id="description" name="description" class="form-control" rows="3"></textarea>
        <small id="is_text-alert" class="form-text text-danger"></small>
    </div>
  </div>
</div>
@endsection
@section('js-content')
    <script>
      let url = `{{ config('app.url') }}/v1/galery`

      const table = $('#table-galery').DataTable({
            "bAutoWidth": false
      })

      const getSample = () => {
        table.clear().draw()
        $.get(url, (res) => {
          $.each(res.data, (i, val) => {
            table.row.add([
              i+1 + '.', val.name, val.description, moment(val.created_at).format("DD MMMM YYYY"),
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

      const disableSpinner = () => {
        $('#btn-send').prop('disabled', false)
        $('#btn-send').html('Kirim')
      }

      const fieldList = ['id', 'name', 'description']

      const clear = () => {
        $.each(fieldList, (i, val) => {
          $(`#${val}`).val('')
        })
        disableSpinner()
        $('#path').hide();
      }

      $(document).on('click', '#btn-add', function() {
        clear()
        $('#modalUpdate').modal('show')
      })

      $(document).on('click', '#btn-send', () => {
        let dataSample = new FormData($('#form-upsert')[0]);
        proccessBtn()
        $.ajax({
          type: "POST",
          url: url,
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
            console.log(myErr);
            if (myErr.errors.length > 0) {
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
          $('#path').attr('src', `{{asset('storage/profile/${result.data.path}')}}`);
        })
        $('#modalUpdate').modal('show')
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
