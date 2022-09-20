@extends('Layouts.Base')
@section('content')
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><b>Data Galery</b></h4>
                    <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#modaltambah">
                       + Tambah Data
                      </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Years</th>
                                    <th>Graduated</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Years</th>
                                    <th>Graduated</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$d['name']}}</td>
                                        <td>{{$d['years']}}</td>
                                        <td>{{$d['graduated']}}</td>
                                        <td>
                                            <a href="" class="btn-sm btn btn-outline-primary"><i class="fa fa-edit"></i></a>
                                            <a href="" class="btn-sm btn btn-outline-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data </h5>
        </div>
        <div class="modal-body">
            <form enctype="multipart/form-data" action="{{route('createData.generation')}}" method="POST">
                @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Years</label>
                <input type="year" name="years" id="graduated" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Graduated</label>
                <input type="date" name="graduated" id="graduated" class="form-control">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-outline-primary">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div>
@endsection
@section('js')

@endsection