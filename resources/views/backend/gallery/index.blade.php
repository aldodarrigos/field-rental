@extends('layouts.backend')

@section('content')

@section('assets_down')

    @parent
    
    <link href="{{asset('inspinia/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
    <script src="{{asset('inspinia/js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{asset('inspinia/js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>
    <link href="{{asset('inspinia/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">

    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                "order": [[ 2, "ASC" ]],
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

            
            $('input[type="file"]').change(function(e){
                var fileName = e.target.files[0].name;
                console.log('The file "' + fileName +  '" has been selected.');
            });



        });

        function CopyToClipboard(id){
            console.log(id);
            var r = document.createRange();
            r.selectNode(document.getElementById(id));
            window.getSelection().removeAllRanges();
            window.getSelection().addRange(r);
            document.execCommand('copy');
            window.getSelection().removeAllRanges();
            toast1.toast('show');
        }

        let toast1 = $('.toast1');
        toast1.toast({
            delay: 700,
            animation: true
        });

    </script>
    

@endsection

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Gallery</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/gallery">Dashboard</a>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-md-10">

            <form method="post" action="{{$action}}" class="form" accept-charset="UTF-8" enctype="multipart/form-data">
                        
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-md-4">
                        
                        <div class="form-group ">
                            <style>
                                .btn-file{
                                    clip: rect(0, 0, 0, 0);
                                    height: 1px;
                                    overflow: hidden;
                                    padding: 0;
                                    position: absolute !important;
                                    white-space: nowrap;
                                    width: 1px;
                                }
                                .label-file{
                                    margin-bottom: 0;
                                    padding-right: 2rem;
                                    padding-left: 2rem;
                                }
                            </style>
        
                            <input type="file" id="file" name="file" class="btn-md btn-file">
                            <label for="file" class="btn btn-large btn-primary label-file">Select file</label>
                            <button type="submit" class="btn btn-w-m btn-success"><i class="fas fa-cloud-upload-alt"></i> Upload</button>
                        </div>
                    </div>
                    <div class="col-md-8 text-right">
                        <small>Max file size: 500Kb | Image formats permited: .jpg, .jpeg, .png, .webp</small>
                    </div>
                </div>
            </form>
            
        </div>
        <div class="col-lg-10">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Upload Image </h5>
                    <div class="ibox-tools">
                        
                    </div>
                </div>
                <div class="ibox-content">

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                                <tr>
                                    <th class="" width='50'>Image</th>
                                    <th>Url</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($files as $file)

                                    <tr class="gradeX">
                                        <td><img class='rounded w-100' src="{{asset('storage/files/'.$file->url)}}" alt=""></td>
                                        <td id="{{$file->id}}" class=''>
                                            {{asset('storage/files/'.$file->url)}} <span style='cursor: pointer;' class="copy" onclick="CopyToClipboard({{$file->id}})"><i class="far fa-copy text-info"></i></span>
                                        </td>
                                        <td><a href="/delete-file/{{$file->id}}" class='btn btn-danger btn-xs'><i class="far fa-trash-alt"></i> Delete</a></td>
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

<!-- Toast notifications -->
<div style="position: absolute; bottom: 20px; right: 20px;">

    <div class="toast toast1 toast-bootstrap" role="alert" aria-live="assertive" aria-atomic="true">

        <div class="toast-body">
            <strong>Selected text was copied.</strong>
        </div>
    </div>

</div>

@endsection


