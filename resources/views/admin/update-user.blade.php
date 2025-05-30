@include ('admin.header')
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>

                @endif


                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>

            @endif
                                  <!-- Form Start -->
                  <form  action="{{route('admin.updateUser',['id'=>$user->id])}}" method ="POST">
                    @csrf
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="{{$user->id }}" placeholder="" >

                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="f_name" class="form-control" value="{{$user->frstname}}" placeholder="" required>
                          @error('f_name')
                          <span  class=" text text-danger">{{$message}}</span>

                          @enderror
                          
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="l_name" class="form-control" value="{{$user->lstname	}}" placeholder="" required>
                          @error('l_name')
                          <span  class=" text text-danger">{{$message}}</span>

                          @enderror
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="{{$user->username	}}" placeholder="" required>
                          @error('username')
                          <span  class=" text text-danger">{{$message}}</span>

                          @enderror
                      </div>


                   

                      <div class="form-group">
                          <label>User Role</label>
                          {{-- <select class="form-control" name="role"> --}}
                            <select class="form-control" name="role">

                                <option value="normal User" {{ $user->role == 'normal User' ? 'selected' : '' }}>normal User</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>

                            </select>
                            @error('role')
                            <span  class=" text text-danger">{{$message}}</span>
  
                            @enderror

                      </div>


                      <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control"  placeholder="" >
                        @error('password')
                        <span  class=" text text-danger">{{$message}}</span>

                        @enderror
                    </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
              </div>
          </div>
      </div>
  </div>
 @include ('admin.footer')
