<!-- Add Operator modal -->
<div id="modal_theme_primary" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Add New Operator</h6>
            </div>

            <form action="{{ route('admin.operators.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-sm-3">Logo</label>
                        <div class="col-sm-9 text-center">
                            <img src="{{url('assets/images/cover.jpg')}}" class="img-responsive content-group" alt="" id="logo-preview" >
                        </div>
                        <div class="col-offset-3 col-sm-9">
                            <div class="uploader ">
                                <input type="file" class="file-styled-primary" name="logo">
                                    <span class="filename " style="user-select: none;">No file selected</span>
                                    <span class="action btn bg-blue legitRipple" style="user-select: none;">Choose File</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Operator name</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Enter Operator name" name="name" class="form-control" value="{{ old('name')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Business owner</label>
                        <div class="col-sm-9">
                           <select class="form-control" name="user_id">
                               <option value="">Select Business Owner</option>
                               @foreach ($businessOwners as $businessOwner)
                                
                                    <option value="{{$businessOwner->id}}">{{ ucfirst($businessOwner->first_name.' '.$businessOwner->last_name)}}</option>
                               
                                @endforeach
                           </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Phone #</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Enter Phone number" name="phone" data-mask="+99-99-9999-9999" class="form-control" value="{{ old('phone')}}">
                            <span class="help-block">+260-969-999-999</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Email</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="email Adrress" name="email" class="form-control" value="{{ old('email')}}">
                            <span class="help-block">optional</span>
                        </div>
                    </div>


                    <div class="form-group  has-feedback">
                        <label class="control-label col-sm-3">Address</label>
                        <div class="col-sm-9">
                            <textarea name="address" class="form-control" placeholder="Enter address">{{ old('address')}}</textarea>
                        </div>
                    </div>

                    
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /Add user modal -->