@extends('layouts.backend')

@section('content')

@section('assets_down')

    @parent

    <link rel="stylesheet" type="text/css" href="{{ asset('simeditor/styles/simditor.css') }}" />

    <script type="text/javascript" src="{{ asset('simeditor/scripts/module.js') }}"></script>
    <script type="text/javascript" src="{{ asset('simeditor/scripts/hotkeys.js') }}"></script>
    <script type="text/javascript" src="{{ asset('simeditor/scripts/uploader.js') }}"></script>
    <script type="text/javascript" src="{{ asset('simeditor/scripts/simditor.j') }}s"></script>

    <script>
        $(document).ready(function(){

            var editor = new Simditor({
                textarea: $('.summernote'),
                toolbar: [
                'title',
                'bold',
                'italic',
                'underline',
                'strikethrough',
                'fontScale',
                'color',
                'ol',    
                'ul',         
                'blockquote',
                'code',          
                'table',
                'link',
                'image',
                'hr',          
                'indent',
                'outdent',
                'alignment'
                ]
            });
            
        });
    </script>


@endsection

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Field rules</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/settings">Settings</a>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-lg-8">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Update Field rules</h5>
                <div class="ibox-tools">
    
                </div>
            </div>
            <div class="ibox-content">

                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{ $message }}</strong>
                </div>
                @endif
                
                <form action="/update-field-rules" method="POST"  id=''>
                
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                
                    <div class="row">

                        <div class="col-md-12">

                            <div class="form-group ">
                                <label >Content</label>
                                <textarea name="field_rules" class="form-control summernote" rows="30">{{$settings->field_rules}}</textarea>
                            </div>

                            <div class="hr-line-dashed"></div>

                            <input type="hidden" name="_method" value="PUT">
                
                            <button type="submit" class="btn btn-w-m btn-success">Save</button>

                        </div>
                
                
                    </div>
                
                </form>

            </div>
        </div>
    </div>
    </div>
</div>






@endsection


