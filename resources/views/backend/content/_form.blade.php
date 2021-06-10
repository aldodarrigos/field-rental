@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif

<form action="{{$action}}" method="POST"  id=''>

    @csrf

    <div class="row">

        <div class="col-md-6">

            <div class="form-group ">
                <label >Shortcut</label>
                <input type="text" name='shortcut' class="form-control" required @if(!empty($content->shortcut)) value="{{$content->shortcut}}" @endif>
            </div>
            
            <div class="form-group ">
                <label >Title</label>
                <input type="text" name='title' class="form-control" @if(!empty($content->title)) value="{{$content->title}}" @endif>
            </div>

            <div class="form-group ">
                <label >Subtitle</label>
                <input type="text" name='subtitle' class="form-control" @if(!empty($content->subtitle)) value="{{$content->subtitle}}" @endif>
            </div>

            <div class="form-group ">
                <label >Content</label>
                <textarea name="content" class="form-control summernote" rows="8">@if(!empty($content->content)){{$content->content}} @endif</textarea>
            </div>

        </div>

        <div class="col-md-6">
            
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group ">
                        <label >Image</label>
                        <input type="text" name='img' class="form-control" @if(!empty($content->img)) value="{{$content->img}}" @endif>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="i-checks mt-4">
                        @if ($form == 'new')
                            <label> <input type="checkbox" name='flag' value="1"> Flag</label>
                        @else
                            @php $flagchecked = ($content->flag == 1)?'checked':''; @endphp
                            <label> <input type="checkbox" name='flag' value="1" {{$flagchecked}}> Flag</label>
                        @endif
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group ">
                        <label >Link</label>
                        <input type="text" name='link' class="form-control" @if(!empty($content->link)) value="{{$content->link}}" @endif>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group ">
                        <label for='video'>Video</label>
                        <input type="text" name='video' class="form-control" @if(!empty($content->video)) value="{{$content->video}}" @endif>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group ">
                        <label for='group'>Group</label>
                        <select class="form-control m-b" name="group_id">

                            <option value='0'>--SELECT--</option>
                            @foreach ($groups as $group)

                                @php
                                    if($form == 'update'){
                                        $group_selected = ($content->group_id == $group->id)?'selected':'';
                                    }else{
                                        $group_selected = '';
                                    }
                                @endphp
                
                                <option value='{{$group->id}}' {{$group_selected}}>{{$group->name}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                </div>

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

            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group ">
                        <label>Icon</label>
                        <input type="text" name='icon' class="form-control" @if(!empty($content->icon)) value="{{$content->icon}}" @endif>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group ">
                        <label for='video'>Order</label>
                        <input type="text" name='order' class="form-control" @if(!empty($content->order)) value="{{$content->order}}" @endif>
                    </div>
                </div>
            </div>

            <div class="hr-line-dashed"></div>

            <button type="submit" class="btn btn-w-m btn-success">Save</button>
            @if(!empty($put))
            <input type="hidden" name="_method" value="PUT">
            @endif
            <a href="/content" class="btn btn-w-m btn-default"><i class="fas fa-undo-alt"></i> Return</a>
        </div>

    </div>

</form>