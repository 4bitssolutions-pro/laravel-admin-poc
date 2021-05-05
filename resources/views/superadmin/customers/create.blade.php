@extends('layouts.layout')
@section('title','Create Customer')
@section('stylesheet')
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="/plugins/toastr/toastr.min.css">
@endsection
@section('content')
 <!-- Content Header (Page header) -->
 <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            @if ($post==null)
            <h1>Create Customer</h1>
            @else
            <h1>Edit Customer</h1>

            @endif
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            @if ($post==null)
            <li class="breadcrumb-item active">Create Customer</li>
            @else
            <li class="breadcrumb-item active">Edit Customer</li>
            @endif
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
@livewire('customer.create',['event' => $post])    <!-- /.card -->

  </section>
  <!-- /.content -->
@endsection
@section('javascript')
@stack('scripts')
<!-- SweetAlert2 -->
<script src="/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="/plugins/toastr/toastr.min.js"></script>

@endsection
