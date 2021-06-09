@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
    <strong>{{ $message }}</strong>
</div>
@endif

<form action="{{$action}}" method="POST"  id=''>

    @csrf

    <input type="hidden" id="token" value='{{csrf_token()}}'>
    <input type="hidden" id="competition_id" @if(!empty($content->id)) value="{{$content->id}}" @endif>
    

    <div class="row">

        <div class="col-md-8">

            <div class="form-group ">
                <label>Name</label>
                <input type="text" name='name' class="form-control" @if(!empty($content->name)) value="{{$content->name}}" @endif>
            </div>
            
            @if ($form == 'update')
                <div class="form-group ">
                    <label>Slug</label>
                    <input type="text" name='slug' class="form-control" @if(!empty($content->slug)) value="{{$content->slug}}" @endif>
                </div>
            @endif

            <div class="form-group tooltip-wrap">
                <label >Sumary <i class="fas fa-question-circle text-muted" data-toggle="tooltip" data-placement="top" title="Sumary field must have 120 characters max."></i></label>
                <textarea name="sumary" class="form-control" rows="4">@if(!empty($content->sumary)){{$content->sumary}} @endif</textarea>
            </div>

            <div class="form-group ">
                <label >Content</label>
                <textarea name="content" class="form-control summernote" rows="15">@if(!empty($content->content))<?=$content->content;?> @endif</textarea>
            </div>

        </div>

        <div class="col-md-4">

            <div class="form-group tooltip-wrap">
                <label>Image <i class="fas fa-question-circle text-muted" data-toggle="tooltip" data-placement="top" title="Image URLs must have 120 characters max."></i></label> 
                <input type="text" name='img' class="form-control" @if(!empty($content->img)) value="{{$content->img}}" @endif>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group tooltip-wrap">
                        <label>Price</label> 
                        <input type="text" name='price' class="form-control" @if(!empty($content->price)) value="{{$content->price}}" @endif>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group tooltip-wrap">
                        <label>Second child price</label> 
                        <input type="text" name='second_child_price' class="form-control" @if(!empty($content->second_child_price)) value="{{$content->second_child_price}}" @endif>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group ">
                        <label for='group'>Type</label>
                        <select class="form-control m-b" name="is_league">
                            @if ($form == 'update')
                                @if ($content->is_league == 1)
                                    <option value='0'>Tournament</option>
                                    <option value='1' selected>League</option>
                                @else
                                    <option value='0' selected>Tournament</option>
                                    <option value='1' >League</option>
                                @endif
                            @else
                                <option value='0' selected>Tournament</option>
                                <option value='1'>League</option>
                            @endif

                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group ">
                        <label for='group'>Modality</label>
                        <select class="form-control m-b" name="trials">
                            @if ($form == 'update')
                                @if ($content->trials == 1)
                                    <option value='0'>Teams</option>
                                    <option value='1' selected>Tryouts</option>
                                @else
                                    <option value='0' selected>Teams</option>
                                    <option value='1' >Tryouts</option>
                                @endif
                            @else
                                <option value='0' selected>Teams</option>
                                <option value='1'>Tryouts</option>
                            @endif

                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group ">
                        <label for='group'>Status</label>
                        <select class="form-control m-b" name="status">
                            @if ($form == 'update')

                                @foreach ($status as $item)
                                    @php $selected = ($item->id == $content->status)?'selected':'';  @endphp
                                    <option value='{{$item->id}}' {{$selected}}>{{$item->name}}</option>
                                @endforeach

                            @else

                                @foreach ($status as $item)
                                    <option value='{{$item->id}}'>{{$item->name}}</option>
                                @endforeach

                            @endif

                        </select>
                    </div>
                </div>

            </div>

            <div class="hr-line-dashed"></div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group ">
                        <label for='group'>Categories</label>
                        <select class="form-control m-b" id="categories">
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <br>
                    <span class="btn btn-w-m btn-success" id='add_category'>Add</span>
                </div>

                <div class="col-md-6">

                    <table class="table table-striped margin bottom">
     
                        <tbody id='category_records'>
                       
                        </tbody>
                    </table>

                </div>
            </div>

            

            <div class="hr-line-dashed"></div>

            <button type="submit" class="btn btn-w-m btn-success">Save</button>
            @if(!empty($put))
            <input type="hidden" name="_method" value="PUT">
            @endif
            <a href="/competitions" class="btn btn-w-m btn-default"><i class="fas fa-undo-alt"></i> Return</a>
        </div>

    </div>

</form>

