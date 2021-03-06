@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Add product</h3>
              </div>
                <!-- /.card-header -->
                <!-- form start -->
                {!!Form::open(['action' => 'App\Http\Controllers\Admin\Product\ProductController@store', 'method' => 'POST', 'class' =>'form-horizontal','id'=>'quickForm','enctype'=>'multipart/form-data'])!!}
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        {{Form::label('', 'Product Name')}}
                        {{Form::text('product_name', '', ['placeholder' => 'Product Name','class' => 'form-control'])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('', 'Product Price')}}
                        {{Form::number('product_price', '', ['placeholder' => 'Price', 'class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        <label>Product category</label>
                        <select name="product_category" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($categories as $data)
                                <option value="{{$data->category_name}}">{{$data->category_name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        {{Form::label('', 'Product Image')}}
                        <div class="input-group">
                            <div class="custom-file">
                                {{Form::file('image',['class'=>'custom-file-input','id'=>'exampleInputFile'])}}
                                {{-- {{Form::file('image',['class'=>'custom-file-input','id'=>'exampleInputFile'])}} --}}
                                {{Form::label('', 'Choose File',['class'=>'custom-file-label','for'=>'exampleInputFile'])}}
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    {{Form::submit('Add Product', ['class' => 'btn btn-primary'])}}
                </div>

                {!!Form::close()!!}
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection

@section('scripts')
<script>
    $(function () {

    $('#quickForm').validate({
        rules: {
        product_name: {
            required: true,
        },
        product_price: {
            required: true,
        },
        product_category: {
            required: true
        },
        product_image: {
            required: true
        },
        },
        messages: {
        product_name: {
            required: "Please enter a product name"
        },
        product_price: {
            required: "Please enter price"
        },
        product_category: {
            required: "Please select category of product"
        },
        product_image: {
            required: "Please image required"
        },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
        }
    });
    });
</script>
@endsection

