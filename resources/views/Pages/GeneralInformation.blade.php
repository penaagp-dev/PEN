@extends('Base.Skelton')
@section('tittle')
    General Information page
@endsection
@section('head-content')
    <div class="col-md-12">
        <div class="page-header-title">
            <h5 class="m-b-10">General Information</h5>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#!">General Information</a></li>
        </ul>
    </div>
@endsection
@section('main-content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
              <form class="row" id="form-post">
                <div class="col-md-6">
                  <div class="form-group">
                      <label >Name</label>
                      <input type="hidden" name="id" id="id">
                      <input id="name" name="name" type="text" class="form-control" placeholder="input here..." autocomplete="off">
                      <small id="name-alert" class="form-text text-danger"></small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label >Since</label>
                      <input id="since" name="since" type="date" class="form-control">
                      <small id="since-alert" class="form-text text-danger"></small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group fill">
                      <label >Parent</label>
                      <input id="parent" name="parent" type="text" class="form-control">
                      <small id="parent-alert" class="form-text text-danger"></small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group fill">
                      <label >Phone</label>
                      <input id="phone" name="phone" type="text" class="form-control">
                      <small id="phone-alert" class="form-text text-danger"></small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group fill">
                      <label >Email</label>
                      <input id="email" name="email" type="text" class="form-control">
                      <small id="email-alert" class="form-text text-danger"></small>
                  </div>
                </div>
                <div class="col-md-12 mt-3">
                  <div class="form-group fill">
                      <label>Address</label>
                      <textarea id="address" name="address" class="form-control" rows="3"></textarea>
                      <small id="address-alert" class="form-text text-danger"></small>
                  </div>
                </div>
                <div class="card-header">
                  <button type="button" class="btn btn-primary rounded" id="btn-save">Save</button>
                </div>
              </form>
              </div>
            </div>
        </div>
    </div>
@endsection
@section('form')
<div class="row py-4">
  
</div>
@endsection
@section('js-content')
    <script>
      let url = `{{ config('app.url') }}/v1/general_information`

      const getGeneral = () => {
        $.get(url, (res) => {
          let item = res.data
          if (item) {
            $.each(item, (i, value) => {
              $(`#${i}`).val(value)
            })
          } else {
            $('#id').val('')
          }
        })
      }

      $(document).ready(() => {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        getGeneral()
      })

      const successAllert = () => {
        Swal.fire({
          icon: 'success',
          title: 'Good Job',
          text: 'Data has been saved!'
        }).then((res) => {
          if (res.isConfirmed) {
            getGeneral()
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

      const fieldList = ['id', 'name', 'since', 'parent', 'phone', 'email', 'address']

      const clear = () => {
        $.each(fieldList, (i, val) => {
          $(`#${val}`).val('')
          disableSpinner()
        })
      }

      $(document).on('click', '#btn-save', () => {
        let dataGeneral = $('#form-post').serialize()
        proccessBtn()
        $.ajax({
          type: "POST",
          url: url,
          data: dataGeneral,
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
