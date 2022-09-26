@extends('Base.Skelton')
@section('tittle')
    Example page
@endsection
@section('head-content')
    <div class="col-md-12">
        <div class="page-header-title">
            <h5 class="m-b-10">Example</h5>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a>
            </li>
            <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#!">Example</a></li>
        </ul>
    </div>
@endsection
@section('main-content')
    <div class="col-xl-12">
        <div class="card">
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
                            <table class="table table-striped" id="table-example">
                                <thead>
                                    <tr>
                                        <th style="width: 30px;">#</th>
                                        <th>Sample</th>
                                        <th>Is Text</th>
                                        <th>Date Sample</th>
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
@section('js-content')
    <script>
      let url = `{{ config('app.url') }}/v1/example`

      $(document).ready(() => {
        $.get(url, (res) => {
          const table = $('#table-example').DataTable()
          $.each(res.data, (i, val) => {
            table.row.add([
              i+1, val.sample, val.is_text, val.date_sample, moment(val.created_at).format("DD MMMM YYYY"),
              `<button class="btn btn-sm btn-outline-primary rounded"><i class="fa-regular fa-pen-to-square"></i></button>
              <button class="btn btn-sm btn-outline-secondary rounded ml-1"><i class="fa-regular fa-trash-can"></i></button>`
            ])
            .draw()
          })
        })
      })
    </script>
@endsection
