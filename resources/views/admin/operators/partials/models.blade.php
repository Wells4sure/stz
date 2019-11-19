<!-- Add Operator modal -->
<div id="modal_theme_primary" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Add New Operator</h6>
            </div>

            <form action="{{ route('admin.users.store') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-sm-3">Operator name</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Enter First Name" name="first_name" class="form-control" value="{{ old('first_name')}}">
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
                            <textarea name="address"   class="form-control" placeholder="Enter address"></textarea>
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