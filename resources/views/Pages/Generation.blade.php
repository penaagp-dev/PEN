@extends('Base.Skelton')
@section('tittle')
    Generation page
@endsection
@section('head-content')
    <div class="col-md-12">
        <div class="page-header-title">
            <h5 class="m-b-10">Generation</h5>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#!">Generation</a></li>
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
                <table class="table table-striped" id="table-generation">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th>Name</th>
                            <th>Years</th>
                            <th >Graduated</th>
                            <th ">Created</th>
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
  <div class="col-md-6">
    <div class="form-group fill">
        <label >Name</label>
        <input type="hidden" name="id" id="id">
        <input id="name" name="name" type="text" class="form-control" placeholder="input here..." autocomplete="off">
        <small id="name-alert" class="form-text text-danger"></small>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group fill">
        <label >Years</label>
        <input id="years" name="years" type="text" class="form-control" placeholder="input here...">
        <small id="years-alert" class="form-text text-danger"></small>
    </div>
  </div>
  <div class="col-md-12 mt-3">
    <div class="form-group fill">
        <label>Graduated</label>
        <input id="graduated" type="date" name="graduated" class="form-control" >
        <small id="graduated-alert" class="form-text text-danger"></small>
    </div>
  </div>
</div>
@endsection
@section('js-content')
    <script>
      let url = `{{ config('app.url') }}/v1/generation`

      const table = $('#table-generation').DataTable({
            "bAutoWidth": false
      })

      const getGeneration = () => {
        table.clear().draw()
        $.get(url, (res) => {
          $.each(res.data, (i, val) => {
            table.row.add([
              i+1 + '.', val.name, val.years, val.graduated, moment(val.created_at).format("DD MMMM YYYY"),
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
        getGeneration()
      })

      const successAllert = () => {
        Swal.fire({
          icon: 'success',
          title: 'Good Job',
          text: 'Data has been saved!'
        }).then((res) => {
          if (res.isConfirmed) {
            getGeneration()
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

      const fieldList = ['id', 'name', 'years', 'graduated']

      const clear = () => {
        $.each(fieldList, (i, val) => {
          $(`#${val}`).val('')
          disableSpinner()
        })
      }

      $(document).on('click', '#btn-add', function() {
        clear()
        $('#modalUpdate').modal('show')
      })

      $(document).on('click', '#btn-send', () => {
        let dataGeneration = $('#form-upsert').serialize()
        proccessBtn()
        $.ajax({
          type: "POST",
          url: url,
          data: dataGeneration,
          success: (result) => {
            $('#modalUpdate').modal('hide')
            successAllert()
          },
          error: (err) => {
            let myErr = err.responseJSON
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
                    getGeneration()
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
