@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>
@endif

<form action="{{$action}}" method="POST"  id='' autocomplete="false">

    @csrf

    
    <div class="row">

        <div class="col-md-6">
            <div class="form-group ">
                <label >Name</label>
                <input type="text" name='name' class="form-control" required @if(!empty($content->name)) value="{{$content->name}}" @endif autocomplete='off'>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group ">
                <label >Email</label>
                <input type="text" name='mailtext' class="form-control" @if(!empty($content->email)) value="{{$content->email}}" @endif autocomplete='off' >
            </div>
        </div>
        
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group ">
                <label for='group'>Role</label>
                <select class="form-control m-b" name="role">
                    @if ($form == 'update')

                        @if ($content->role == 1)
                            <option value='1' selected>Regular user</option>
                            <option value='2'>Admin</option>
                        @else
                            <option value='1'>Regular user</option>
                            <option value='2' selected>Admin</option>
                        @endif

                    @else
                        <option value='1'>Regular</option>
                        <option value='2'>Admin</option>
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

    <div class="row">


        <div class="col-md-6">

            <div class="form-group ">
                <label>Password</label>
                <input type="password" name='passfrase' class="form-control" value="" autocomplete="off">
            </div>

        </div>

        <div class="col-md-6">
            
            <div class="row">
                
                <div class="col-md-6">
                    
                    <div class="form-group ">
                        <label>Date of birth</label>
                        <div class="input-group date">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name='pub_date' 
                            @if (!empty($content->born))
                                value="{{$content->born}}"
                            @else
                                value="{{date('Y-m-d')}}"
                            @endif
                            >
                        </div>
                    </div>

                </div>

                <div class="col-md-6">

                    <div class="form-group ">
                        <label >Phone</label>
                        <input type="text" name='phone' class="form-control" @if(!empty($content->phone)) value="{{$content->phone}}" @endif autocomplete='off'>
                    </div>

                </div>

            </div>


        </div>

    </div>

    <div class="hr-line-dashed"></div>

    <button type="submit" class="btn btn-w-m btn-success">Save</button>
    @if(!empty($put))
    <input type="hidden" name="_method" value="PUT">
    @endif
    <a href="/users" class="btn btn-w-m btn-default"><i class="fas fa-undo-alt"></i> Return</a>


</form>