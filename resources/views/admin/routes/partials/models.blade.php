		            <!-- Add User modal -->
					<div id="modal_theme_primary" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header bg-primary">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h6 class="modal-title">Add New Route</h6>
								</div>

                                <form action="{{ route('admin.routes.store') }}" method="POST" class="form-horizontal">
                                    {{ csrf_field() }}
									<div class="modal-body">
										<div class="form-group">
											<label class="control-label col-sm-3">Code</label>
											<div class="col-sm-9">
												<input type="text" name="name" class="form-control" placeholder="example: LSK - NDL">
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-sm-3">Origin</label>
											<div class="col-sm-9">
												<input type="text" placeholder="Enter Origin" name="origin" class="form-control" value="{{ old('origin')}}">
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3">Destination</label>
											<div class="col-sm-9">
												<input type="text" placeholder="Enter Destination" name="destination" class="form-control" value="{{ old('destination')}}">
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3">Price</label>
											<div class="col-sm-9">
												<input type="number" placeholder="Enter Price" name="price" class="form-control" value="{{ old('price')}}">
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
                    
 <!-- Danger modal -->
 <div id="modal_theme_danger" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Warning </h6>
            </div>
        <form action="{{ route('admin.users.destroy') }}"  method="POST">
            {{ csrf_field() }}
            <div class="modal-body">
                <h6 class="text-semibold text-center">You are about to permenently delete a users </h6>
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" id="u_id" name="user_id">
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- /default modal -->

<!-- Edit User modal -->
<div id="modal_theme_edit" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Edit User</h6>
            </div>

            <form action="{{ route('admin.users.update') }}" method="POST" class="form-horizontal">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" id="u_id" name="user_id">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-3">User type</label>
                        <div class="col-sm-9">
                            <select name="role" class="form-control">
                                <option value="">Select usertype</option>
                                <option value="admin"  {{ old('role') == 'admin' ? 'selected' : '' }} >Admin</option>
                                <option value="business_owner"  {{ old('role') == 'business_owner' ? 'selected' : '' }}>Business Owner</option>
                                <option value="traveller"  {{ old('role') == 'traveller' ? 'selected' : '' }}>Traveller</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3">First name</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Enter First Name" name="first_name" id="first_name" class="form-control" value="{{ old('first_name')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Last name</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Enter Last Name" name="last_name" id="last_name" class="form-control" value="{{ old('last_name')}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Email</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="email Adrress" name="email" id="email" class="form-control" value="{{ old('email')}}">
                            <span class="help-block">optional</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3">Phone #</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Enter Phone number" name="phone" id="email" data-mask="+99-99-9999-9999" class="form-control" value="{{ old('phone')}}">
                            <span class="help-block">+260-969-999-999</span>
                        </div>
                    </div>

                    <div class="form-group  has-feedback">
                        <label class="control-label col-sm-3">Password</label>
                        <div class="col-sm-9">
                            <input type="text" placeholder="Enter Password" name="password" class="form-control">
                            <div class="form-control-feedback">
                                <i class="icon-eye" ></i>
                            </div>
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
<!-- /edit user modal -->