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

            <div class="form-group ">
                <label >Name</label>
                <input type="text" name='name' class="form-control" required @if(!empty($content->name)) value="{{$content->name}}" @endif>
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
                            
                <button type="submit" class="btn btn-w-m btn-success">Save</button>
                @if(!empty($put))
                <input type="hidden" name="_method" value="PUT">
                @endif
                <a href="/categories" class="btn btn-w-m btn-default"><i class="fas fa-undo-alt"></i> Return</a>

            </div>


        </div>


    </div>

</form>