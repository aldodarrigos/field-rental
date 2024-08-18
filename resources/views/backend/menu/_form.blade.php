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
                <input type="text" name='name' class="form-control" @if(!empty($content->name)) value="{{$content->name}}" @endif>
            </div>

            <div class="form-group tooltip-wrap">
                <label>Url <i class="fas fa-question-circle text-muted" data-toggle="tooltip" data-placement="top" title="Internal URLs must start with /"></i></label>
                <input type="text" name='slug' class="form-control" @if(!empty($content->slug)) value="{{$content->slug}}" @endif>
            </div>

            <div class="form-group tooltip-wrap">
                <label >Parent Menu  <i class="fas fa-question-circle text-muted" data-toggle="tooltip" data-placement="top" title="Choose an option only if you want the option to belong to a parent list."></i></label>
                <select class="form-control m-b" name="parent_id">
                    @if($form == 'create')
                        <option value='0' selected>This is a Parent Menu</option>
                        @foreach($menus as $menu)
                            @if($menu->parent_id === 0 )
                            <option value='{{$menu->id}}' >{{$menu->name}}</option>
                            @endif
                        @endforeach
                    @else()
                        <option value='0' >This is a Parent Menu</option>
                        @foreach($menus as $menu)
                            @if(!empty($content) && $menu->id === $content->parent_id )
                                <option selected value='{{$menu->id}}' >{{$menu->name}}</option>
                            @else
                                <option  value='{{$menu->id}}' >{{$menu->name}}</option>
                            @endif
                        @endforeach
                    @endif

                </select>

            </div>

            <div class="form-group ">

                <label for='group'>Status</label>
                <select class="form-control m-b" name="status">
                    @if ($form == 'update')
                        @if ($content->status == 1)
                            <option value='1' selected>Published</option>
                            <option value='0'>Unpublished</option>
                        @else
                            <option value='1'>Published</option>
                            <option value='0' selected>Unpublished</option>
                        @endif
                    @else
                        <option value='1'>Published</option>
                        <option value='0'>Unpublished</option>
                    @endif

                </select>

                            
                <button type="submit" class="btn btn-w-m btn-success">Save</button>
                @if(!empty($put))
                <input type="hidden" name="_method" value="PUT">
                @endif
                <a href="/menu" class="btn btn-w-m btn-default"><i class="fas fa-undo-alt"></i> Return</a>

            </div>


        </div>


    </div>

</form>