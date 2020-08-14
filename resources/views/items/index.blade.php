@extends('adminlte.master')

@section('content')
<div class="mt-3 ml-3 ">
	<div class="card">
              <div class="card-header">
                <h3 class="card-title">Question Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                	@if (session('success'))
                	<div class="alert alert-success">
                {{session('success')}}
            		</div></div>
                    </table>
        		@endif
    
@endsection