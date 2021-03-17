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

            <div class="row">
                <div class="col-md-7">
                    <div class="form-group ">
                        <label >Name</label>
                        <input type="text" name='name' class="form-control" @if(!empty($content->name)) value="{{$content->name}}" @endif>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group ">
                        <label >Short Name</label>
                        <input type="text" name='short_name' class="form-control" @if(!empty($content->short_name)) value="{{$content->short_name}}" @endif>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group ">
                        <label >Number</label>
                        <input type="text" name='number' class="form-control" @if(!empty($content->number)) value="{{$content->number}}" @endif>
                    </div>
                </div>
            </div>

            <div class="form-group ">
                <label >Sumary</label>
                <textarea name="sumary" class="form-control" rows="4">@if(!empty($content->sumary)){{$content->sumary}} @endif</textarea>
            </div>

            <div class="form-group ">
                <label >Content</label>
                <textarea name="content" class="form-control" rows="8">@if(!empty($content->content)){{$content->content}} @endif</textarea>
            </div>

        </div>

        <div class="col-md-6">
            
            <div class="row">
                
                <div class="col-md-4">
                    <div class="form-group ">
                        <label>Price regular</label>
                        <input type="text" name='price_regular' class="form-control" @if(!empty($content->price_regular)) value="{{$content->price_regular}}" @endif>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group ">
                        <label>Price Night</label>
                        <input type="text" name='price_night' class="form-control" @if(!empty($content->price_night)) value="{{$content->price_night}}" @endif>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group ">
                        <label>Price Weekend</label>
                        <input type="text" name='price_weekend' class="form-control" @if(!empty($content->price_weekend)) value="{{$content->price_weekend}}" @endif>
                    </div>
                </div>

            </div>

            <div class="row">
                
                <div class="col-md-4">
                    <div class="form-group ">
                        <label>Price regular (2nd hour)</label>
                        <input type="text" name='price_regular_alt' class="form-control" @if(!empty($content->price_regular_alt)) value="{{$content->price_regular_alt}}" @endif>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group ">
                        <label>Price Night (2nd hour)</label>
                        <input type="text" name='price_night_alt' class="form-control" @if(!empty($content->price_night_alt)) value="{{$content->price_night_alt}}" @endif>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group ">
                        <label>Price Weekend (2nd hour)</label>
                        <input type="text" name='price_weekend_alt' class="form-control" @if(!empty($content->price_weekend_alt)) value="{{$content->price_weekend_alt}}" @endif>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group ">
                        <label for='group'>Players Number</label>
                        <select class="form-control m-b" name="tag_id">

                            <option value='0'>--SELECT--</option>
                            @if ($form == 'update')
                                @if ($content->tag_id == 1)
                                    <option value='1' selected>5 vs 5 players (6 vs 6)</option>
                                    <option value='2'>7 vs 7 players (9 vs 9)</option>
                                @else
                                    <option value='1'>5 vs 5 players (6 vs 6)</option>
                                    <option value='2' selected>7 vs 7 players (9 vs 9)</option>
                                @endif
                            @else
                                <option value='1'>5 vs 5 players (6 vs 6)</option>
                                <option value='2'>7 vs 7 players (9 vs 9)</option>
                            @endif
                            
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

            <div class="hr-line-dashed"></div>

            <button type="submit" class="btn btn-w-m btn-success">Save</button>
            @if(!empty($put))
            <input type="hidden" name="_method" value="PUT">
            @endif
            <a href="/backend-fields" class="btn btn-w-m btn-default"><i class="fas fa-undo-alt"></i> Return</a>
        </div>

    </div>

</form>