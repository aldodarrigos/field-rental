@extends('layouts.backend')

@section('content')

@section('assets_down')

    @parent

    <link href="{{asset('inspinia/css/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet">
    <script src="{{asset('inspinia/js/plugins/summernote/summernote-bs4.js')}}"></script>

    <script>
        $(document).ready(function () {

            $('.summernote').summernote({
                height: 300
            });

            const token = $('#token').val();
            let id = $('#competition_id').val();

            get_categories_select(id);
            get_categories(id);

            $('#add_category').click(function() {
                let category_id = $('#categories').val();

                $.ajax({
                    url: "/competition-categories",
                    type:'POST',
                    data: {
                        '_token': token,
                        'competition_id': id,
                        'category_id': category_id,
                    },
                    success:function(response){
                        get_categories(id);
                        get_categories_select(id);
                    }//Response
                })//Ajax

            });


            function get_categories_select(competition_id){
                $.ajax({
                    url: "/get-categories-select/"+competition_id,
                    type:'GET',
                    data: {
                        '_token': token,
                    },
                    success:function(response){
                        $('#categories').html(response);
                    }//Response
                })//Ajax
            }


            function get_categories(competition_id){
                $.ajax({
                    url: "/get-categories/"+competition_id,
                    type:'GET',
                    data: {
                        '_token': token,
                    },
                    success:function(response){
                        $('#category_records').html(response);
                    }//Response
                })//Ajax
            }

            $(document).on('click', '.delete', function() { 
                let record = $(this).data('id');
                console.log(record);

                $.ajax({
                    url: "/competition-categories/"+record,
                    type:'delete',
                    data: {
                        '_token': token,
                    },
                    success:function(response){
                        get_categories(id);
                        get_categories_select(id);
                    }//Response
                })//Ajax
                
                
            });




        });

        

    </script>

@endsection

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Competitions</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/competitions">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Update Service</strong>
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
                    <h5>Update Competition</h5>
                    <div class="ibox-tools">
        
                    </div>
                </div>
                <div class="ibox-content">

                    @include('backend.competitions._form')

                </div>
            </div>
        </div>
    </div>

</div>






@endsection


