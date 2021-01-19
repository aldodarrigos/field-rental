@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif

<form action="{{$action}}" method="POST"  id=''>

    @csrf

    <div class="row">

        <div class="col-md-8">

            <div class="form-group ">
                <label >Title</label>
                <input type="text" name='title' class="form-control" @if(!empty($content->title)) value="{{$content->title}}" @endif required>
            </div>

            @if ($form == 'update')
                <div class="form-group ">
                    <label>Slug</label>
                    <input type="text" name='slug' class="form-control" @if(!empty($content->slug)) value="{{$content->slug}}" @endif>
                </div>
            @endif

            <div class="form-group ">
                <label >Sumary <small>(120 characters max.)</small></label>
                <textarea name="sumary" class="form-control" rows="4">@if(!empty($content->sumary)){{$content->sumary}} @endif</textarea>
            </div>

            <div class="form-group ">
                <label >Content</label>
                <textarea name="content" class="form-control summernote" rows="15">@if(!empty($content->content)){{$content->content}} @endif</textarea>
            </div>

        </div>

        <div class="col-md-4">

            <div class="form-group">
                <label>Image Large <small>(120 characters max.)</small></label>
                <input type="text" name='img' class="form-control" @if(!empty($content->img)) value="{{$content->img}}" @endif>
            </div>

            <div class="form-group">
                <label>Image Medium <small>(120 characters max.)</small></label>
                <input type="text" name='img_md' class="form-control" @if(!empty($content->img_md)) value="{{$content->img_md}}" @endif>
            </div>

            <div class="form-group">
                <label>Image Small <small>(120 characters max.)</small></label>
                <input type="text" name='img_sm' class="form-control" @if(!empty($content->img_sm)) value="{{$content->img_sm}}" @endif>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group ">
                        <label for='group'>Tags</label>
                        <select class="form-control m-b" name="tag_id">

                            <option value='0'>--SELECT--</option>
                            @foreach ($tags as $tag)

                                @php
                                    if($form == 'update'){
                                        $selected = ($content->tag_id == $tag->id)?'selected':'';
                                    }else{
                                        $selected = '';
                                    }
                                @endphp

                                <option value='{{$tag->id}}' {{$selected}}>{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="form-group ">
                        <label >Pub Date</label>
                        <div class="input-group date">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name='pub_date' 
                            @if (!empty($content->pub_date))
                                value="{{$content->pub_date}}"
                            @else
                                value="{{date('Y-m-d')}}"
                            @endif
                            >
                        </div>
                    </div>

                </div>
            </div>

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

            <div class="hr-line-dashed"></div>

            <button type="submit" class="btn btn-w-m btn-success">Save</button>
            @if(!empty($put))
            <input type="hidden" name="_method" value="PUT">
            @endif
            <a href="/backend-news" class="btn btn-w-m btn-default"><i class="fas fa-undo-alt"></i> Return</a>
        </div>

    </div>

</form>