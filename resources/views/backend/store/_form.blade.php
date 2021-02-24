@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif

<form action="{{$action}}" method="POST"  id=''>

    @csrf

    <input type="hidden" id="token" value='{{csrf_token()}}'>
    <input type="hidden" id="product_id" @if(!empty($content->id)) value="{{$content->id}}" @endif>

    <div class="row">

        <div class="col-md-8">

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group ">
                        <label >Name</label>
                        <input type="text" name='name' class="form-control" @if(!empty($content->name)) value="{{$content->name}}" @endif required>
                    </div>
                </div>
                <div class="col-md-6">
                    @if ($form == 'update')
                    <div class="form-group ">
                        <label>Slug</label>
                        <input type="text" name='slug' class="form-control" @if(!empty($content->slug)) value="{{$content->slug}}" @endif>
                    </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group ">
                        <label >Sumary <small>(120 characters max.)</small></label>
                        <textarea name="sumary" class="form-control" rows="4">@if(!empty($content->sumary)){{$content->sumary}} @endif</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label >Price</label>
                                <input type="text" name='price' class="form-control" @if(!empty($content->price)) value="{{$content->price}}" @endif required>
                            </div>
                        </div>
        
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label >Offer</label>
                                <input type="text" name='offer' class="form-control" @if(!empty($content->offer)) value="{{$content->offer}}" @endif>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group ">
        
                                <label for='group'>Status</label>
                                <select class="form-control m-b" name="status">
                                    @if ($form == 'update')
                                        @if ($content->status == 1)
                                            <option value='1' selected>Active</option>
                                            <option value='0'>Inactive</option>
                                        @else
                                            <option value='1'>Active</option>
                                            <option value='0' selected>Inactive</option>
                                        @endif
                                    @else
                                        <option value='1'>Active</option>
                                        <option value='0'>Inactive</option>
                                    @endif
                
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group ">
                <label >Content</label>
                <textarea name="content" class="form-control summernote" rows="10">@if(!empty($content->content)){{$content->content}} @endif</textarea>
            </div>

        </div>

        <div class="col-md-4">

            <div class="form-group">
                <label>Image <small>(120 characters max.)</small></label>
                <input type="text" name='img' class="form-control" @if(!empty($content->img)) value="{{$content->img}}" @endif>
            </div>

            <div class="form-group">
                <label>Image 2 <small>(120 characters max.)</small></label>
                <input type="text" name='img_2' class="form-control" @if(!empty($content->img_2)) value="{{$content->img_2}}" @endif>
            </div>

            <div class="form-group">
                <label>Image 3 <small>(120 characters max.)</small></label>
                <input type="text" name='img_3' class="form-control" @if(!empty($content->img_3)) value="{{$content->img_3}}" @endif>
            </div>

            <div class="form-group">
                <label>Image 4 <small>(120 characters max.)</small></label>
                <input type="text" name='img_4' class="form-control" @if(!empty($content->img_4)) value="{{$content->img_4}}" @endif>
            </div>

            <div class="form-group">
                <label>Image 5 <small>(120 characters max.)</small></label>
                <input type="text" name='img_5' class="form-control" @if(!empty($content->img_5)) value="{{$content->img_5}}" @endif>
            </div>

            <div class="hr-line-dashed"></div>

            <div class="row">

                <div class="col-md-6">
                    <div class="i-checks">
                        @if ($form == 'new')
                            <label> <input type="checkbox" name='size_switch' value="1"> Include sizes</label>
                        @else
                            @php $flagchecked = ($content->size_switch == 1)?'checked':''; @endphp
                            <label> <input type="checkbox" name='size_switch' value="1" {{$flagchecked}}> Include sizes</label>
                        @endif
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group ">
                        <label for='group'>Sizes</label>
                        <select class="form-control m-b" id="sizes">
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <br>
                    <span class="btn btn-w-m btn-success" id='add_size'>Add</span>
                </div>

                <div class="col-md-6">

                    <table class="table table-striped margin bottom">
     
                        <tbody id='product_sizes'>
                       
                        </tbody>
                    </table>

                </div>
            </div>



            <div class="hr-line-dashed"></div>

            <button type="submit" class="btn btn-w-m btn-success">Save</button>
            @if(!empty($put))
            <input type="hidden" name="_method" value="PUT">
            @endif
            <a href="/store" class="btn btn-w-m btn-default"><i class="fas fa-undo-alt"></i> Return</a>
        </div>

    </div>

</form>