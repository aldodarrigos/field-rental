@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif

<form action="{{$action}}" method="POST"  id=''>

    @csrf

    <div class="row">

        <div class="col-md-12">

            <div class="row">
                <div class="col-md-9">
                    
                    <div class="form-group ">
                        <label>Subtitle</label>
                        <input type="text" name='subtitle' class="form-control" @if(!empty($content->subtitle)) value="{{$content->subtitle}}" @endif>
                    </div>

                    <div class="form-group ">
                        <label>Title</label>
                        <input type="text" name='title' class="form-control" required @if(!empty($content->title)) value="{{$content->title}}" @endif>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Image</label>
                                <input type="text" name='img' class="form-control" @if(!empty($content->img)) value="{{$content->img}}" @endif>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Image Mobile</label>
                                <input type="text" name='img_mob' class="form-control" @if(!empty($content->img_mob)) value="{{$content->img_mob}}" @endif>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Link Text</label>
                                <input type="text" name='link_text' class="form-control" @if(!empty($content->link_text)) value="{{$content->link_text}}" @endif>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Link Url</label>
                                <input type="text" name='link_url' class="form-control" @if(!empty($content->link_url)) value="{{$content->link_url}}" @endif>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for='group'>Status</label>
                                <select class="form-control m-b" name="status">
                                    @if ($form == 'update')
                                        @if ($content->status == 1)
                                            <option value='1' selected>Published</option>
                                            <option value='0'>Unpublish</option>
                                        @else
                                            <option value='1'>Published</option>
                                            <option value='0' selected>Unpublish</option>
                                        @endif
                                    @else
                                        <option value='1'>Published</option>
                                        <option value='0'>Unpublish</option>
                                    @endif
                
                                </select>
                            </div>
                        </div>
                    </div>
                    
        
                    <div class="hr-line-dashed"></div>
        
                    <button type="submit" class="btn btn-w-m btn-success">Save</button>
                    @if(!empty($put))
                    <input type="hidden" name="_method" value="PUT">
                    @endif
                    <a href="/slides" class="btn btn-w-m btn-default"><i class="fas fa-undo-alt"></i> Return</a>

                </div>

                <div class="col-md-3">

                    <div class="i-checks mt-4">
                        @if ($form == 'new')
                            <label> <input type="checkbox" name='no_title' value="1"> Show Title</label>
                        @else
                            @php $titlechecked = ($content->no_title == 1)?'checked':''; @endphp
                            <label> <input type="checkbox" name='no_title' value="1" {{$titlechecked}}> Show Title</label>
                        @endif
                    </div>

                    <div class="i-checks mt-4">
                        @if ($form == 'new')
                            <label> <input type="checkbox" name='no_button' value="1"> Show Button </label>
                        @else
                            @php $buttonchecked = ($content->no_button == 1)?'checked':''; @endphp
                            <label> <input type="checkbox" name='no_button' value="1" {{$buttonchecked}}> Show Button</label>
                        @endif
                    </div>

                    <div class="i-checks mt-4">
                        @if ($form == 'new')
                            <label> <input type="checkbox" name='shadow' value="1"> Shadow </label>
                        @else
                            @php $shadowchecked = ($content->shadow == 1)?'checked':''; @endphp
                            <label> <input type="checkbox" name='shadow' value="1" {{$shadowchecked}}> Shadow</label>
                        @endif
                    </div>

                    <!--
                    <div class="i-checks mt-4">
                        @if ($form == 'new')
                            <label> <input type="checkbox" name='bottom' value="1"> Button center</label>
                        @else
                            @php $buttonMobchecked = ($content->bottom == 1)?'checked':''; @endphp
                            <label> <input type="checkbox" name='bottom' value="1" {{$buttonMobchecked}}> Button center</label>
                        @endif
                    </div>
                    -->

                    

                </div>
            </div>





        </div>

    </div>

</form>