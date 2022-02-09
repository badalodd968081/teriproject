@extends('layout')
@section('content')
<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Overview</li>
  </ol>


  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i> Mideas
      <a href="{{url('admin/midea/create')}}" class="float-right btn btn-sm btn-dark">Add Data</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Full</th>
              <th>Detail</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Full</th>
              <th>Detail</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
              @foreach($data as $midea)
              <tr>
                <td>{{$midea->id}}</td>
                <td>{{$midea->title}}</td>
                <td><img src="{{ asset('imgs/full').'/'.$midea->full_img }}" width="100" /></td> 
                <td>{{$midea->detail}}</td>
                <td>
                  <a class="btn btn-info btn-sm" href="{{url('admin/midea/'.$midea->id.'/edit')}}">Update</a>
                  <a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger btn-sm" href="{{url('admin/midea/'.$midea->id.'/delete')}}">Delete</a>
                </td>
              </tr>
              @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection
