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
                <ul class="nav nav-tabs mb-3 row" id="myTab" role="tablist">
                    <li class="nav-item col-sm-2">
                        <a class="nav-link active text-uppercase" id="table-tab" data-toggle="tab" href="#table"
                            role="tab" aria-controls="table" aria-selected="true">Tabel</a>
                    </li>
                    <li class="nav-item col-sm-2">
                        <a class="nav-link text-uppercase" id="form-tab" data-toggle="tab" href="#form" role="tab"
                            aria-controls="form" aria-selected="false">Form</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="table" role="tabpanel" aria-labelledby="table-tab">
                        <div class="table-responsive mt-4">
                            <table class="table table-striped" id="table-generation">
                                <thead>
                                    <tr>
                                        <th style="width: 30px;">#</th>
                                        <th>Name</th>
                                        <th>Years</th>
                                        <th>Graduated</th>
                                        <th>Created</th>
                                        <th style="width: 100px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tb-content">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="form" role="tabpanel" aria-labelledby="form-tab">
                        <p class="mb-0">Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee
                            squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan
                            four
                            loko
                            farm-to-table
                            craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts
                            ullamco ad vinyl cillum PBR. accusamus tattooed echo park.</p>
                    </div>
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
        <input id="years" name="years" type="text" class="form-control">
        <small id="years-alert" class="form-text text-danger"></small>
    </div>
  </div>
  <div class="col-md-12 mt-3">
    <div class="form-group fill">
        <label>Graduated</label>
        <input id="graduated" name="graduated" type="date" class="form-control">
        <small id="graduated-alert" class="form-text text-danger"></small>
    </div>
  </div>
</div>
@endsection
@section('js-content')
    <script>
    let url = `{{ config('app.url') }}/v1/generation`
      const successAllert = () => {
        Swal.fire({
          icon: 'success',
          title: 'Good Job',
          text: 'Data has been saved!'
        }).then((res) => {
          if (res.isConfirmed) {
            window.location.reload()
          }
        })
      }

      const dangerAlert = () => {
        Swal.fire({
          icon: 'warning',
          title: 'Error!',
          text: 'Server sedang bermasalah'
        }).then((res) => {
          if (res.isConfirmed) {
            window.location.reload()
          }
        })
      }
     

      $(document).ready(() => {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.get(url, (res) => {
          const table = $('#table-generation').DataTable({
            "bAutoWidth": false
          })
          $.each(res.data, (i, val) => {
            table.row.add([
              i+1 + '.', val.name, val.years, val.graduated, moment(val.created_at).format("DD MMMM YYYY"),
              `<button class="btn btn-sm btn-outline-primary rounded" id="btn-edit" data-id="${val.id}"><i class="fa-regular fa-pen-to-square"></i></button>
              <button class="btn btn-sm btn-outline-secondary rounded ml-1" id="btn-del" data-id="${val.id}"><i class="fa-regular fa-trash-can"></i></button>`
            ])
            .draw()
          })
        })
      })
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

    </script>
@endsection
