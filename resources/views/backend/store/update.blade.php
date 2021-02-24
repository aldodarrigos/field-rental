@extends('layouts.backend')

@section('content')

@section('assets_down')

    @parent

    <link href="{{asset('inspinia/css/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
    <link href="{{asset('inspinia/css/plugins/datapicker/datepicker3.css')}}" rel="stylesheet">

    <!-- SUMMERNOTE -->
    <script src="{{asset('inspinia/js/plugins/summernote/summernote-bs4.js')}}"></script>

    <!-- Data picker -->
    <script src="{{asset('inspinia/js/plugins/datapicker/bootstrap-datepicker.js')}}"></script>

    <script src="{{asset('inspinia/js/plugins/iCheck/icheck.min.js')}}"></script>

    <script>
        $(document).ready(function(){

            $('.summernote').summernote({
                height: 400
            });
            
            var mem = $('.input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true,
                format: 'yyyy-mm-dd'
            });

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });


            const token = $('#token').val();
            let id = $('#product_id').val();

            get_sizes_select(id);
            get_sizes(id);

            $('#add_size').click(function() {
                let size_id = $('#sizes').val();

                $.ajax({
                    url: "/product-sizes",
                    type:'POST',
                    data: {
                        '_token': token,
                        'product_id': id,
                        'size_id': size_id,
                    },
                    success:function(response){
                        get_sizes(id);
                        get_sizes_select(id);
                    }//Response
                })//Ajax

            });


            function get_sizes_select(product_id){
                $.ajax({
                    url: "/get-sizes-select/"+product_id,
                    type:'GET',
                    data: {
                        '_token': token,
                    },
                    success:function(response){
                        $('#sizes').html(response);
                    }//Response
                })//Ajax
            }


            function get_sizes(product_id){
                $.ajax({
                    url: "/get-sizes/"+product_id,
                    type:'GET',
                    data: {
                        '_token': token,
                    },
                    success:function(response){
                        $('#product_sizes').html(response);
                    }//Response
                })//Ajax
            }

            $(document).on('click', '.delete', function() { 
                let record = $(this).data('id');
                console.log(record);

                $.ajax({
                    url: "/product-sizes/"+record,
                    type:'delete',
                    data: {
                        '_token': token,
                    },
                    success:function(response){
                        get_sizes(id);
                        get_sizes_select(id);
                    }//Response
                })//Ajax
                
                
            });


        });
    </script>

@endsection

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Products</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/store">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Update Product</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Update Product</h5>
                    <div class="ibox-tools">
        
                    </div>
                </div>
                <div class="ibox-content">

                    @include('backend.store._form')

                </div>
            </div>
        </div>
    </div>

</div>

@endsection


