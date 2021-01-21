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
                <label>Name</label>
                <input type="text" name='name' class="form-control" @if(!empty($content->name)) value="{{$content->name}}" @endif>
            </div>

            <div class="form-group tooltip-wrap">
                <label >Sumary <i class="fas fa-question-circle text-muted" data-toggle="tooltip" data-placement="top" title="Sumary field must have 120 characters max."></i></label>
                <textarea name="sumary" class="form-control" rows="4">@if(!empty($content->sumary)){{$content->sumary}} @endif</textarea>
            </div>

            <div class="form-group ">
                <label >Content</label>
                <textarea name="content" class="form-control summernote" rows="15">@if(!empty($content->content)){{$content->content}} @endif</textarea>
            </div>

        </div>

        <div class="col-md-4">

            <div class="form-group tooltip-wrap">
                <label>Image <i class="fas fa-question-circle text-muted" data-toggle="tooltip" data-placement="top" title="Image URLs must have 120 characters max."></i></label> 
                <input type="text" name='img' class="form-control" @if(!empty($content->img)) value="{{$content->img}}" @endif>
            </div>

            <div class="row">
                
                <div class="col-md-4">
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

                <div class="col-md-4">
                    <div class="i-checks mt-4">
                        @if ($form == 'new')
                            <label> <input type="checkbox" name='flag' value="1"> In Cover</label>
                        @else
                            @php $flagchecked = ($content->flag == 1)?'checked':''; @endphp
                            <label> <input type="checkbox" name='flag' value="1" {{$flagchecked}}> In Cover</label>
                        @endif
                    </div>
                </div>

            </div>

            <div class="hr-line-dashed"></div>

            <button type="submit" class="btn btn-w-m btn-success">Save</button>
            @if(!empty($put))
            <input type="hidden" name="_method" value="PUT">
            @endif
            <a href="/backend-services" class="btn btn-w-m btn-default"><i class="fas fa-undo-alt"></i> Return</a>
        </div>

    </div>

</form>