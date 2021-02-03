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

            <div class="row">
                {{print_r($content)}}
                <div class="col-md-6">
                    <div class="form-group ">
                        <label >Name</label>
                        <input type="text" name='name' class="form-control" @if(!empty($content->name)) value="{{$content->name}}" @endif autocomplete='off'>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group ">
                        <label >Email</label>
                        <input type="text" name='email' class="form-control" @if(!empty($content->email)) value="{{$content->email}}" @endif autocomplete='off' >
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
                        <input type="password" name='password' class="form-control" value="" autocomplete="false">
                    </div>
                </div>
                <div class="col-md-6">

                </div>

            </div>





        </div>

        <div class="col-md-6">
            
            <div class="row">

                <div class="col-md-4">

                    <div class="form-group ">
                        <label >ID</label>
                        <input type="text" name='ide' class="form-control" @if(!empty($content->ide)) value="{{$content->ide}}" @endif autocomplete='off'>
                    </div>

                </div>
                
                <div class="col-md-4">
                    
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

                <div class="col-md-4">

                    <div class="form-group ">
                        <label >Phone</label>
                        <input type="text" name='phone' class="form-control" @if(!empty($content->phone)) value="{{$content->phone}}" @endif autocomplete='off'>
                    </div>

                </div>

            </div>

            <div class="form-group ">
                <label>Address</label>
                <input type="text" name='address' class="form-control" @if(!empty($content->address)) value="{{$content->address}}" @endif autocomplete='off'>
            </div>

            <div class="hr-line-dashed"></div>

            <div class="row">
                <div class="col-md-4">

                    <div class="form-group ">
                        <label for='group'>Member</label>
                        <select class="form-control m-b" name="member">

                            @if ($form == 'update')

                                @if ($content->member == 1)
                                    <option value='0'>No Member</option>
                                    <option value='1' selected>Member</option>
                                @else
                                    <option value='0' selected>No Member</option>
                                    <option value='1'>Member</option>
                                @endif

                            @else
                                <option value='0' selected>Regular</option>
                                <option value='1'>Member</option>
                            @endif
                            
                        </select>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="form-group ">
                        <label>Member Start</label>
                        <div class="input-group date">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name='member_start' 
                            @if (!empty($content->member_start))
                                value="{{$content->member_start}}"
                            @else
                                value=""
                            @endif
                            >
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group ">
                        <label>Member Finish</label>
                        <div class="input-group date">
                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name='member_finish' 
                            @if (!empty($content->member_finish))
                                value="{{$content->member_finish}}"
                            @else
                                value=""
                            @endif
                            >
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
        </div>

    </div>

</form>