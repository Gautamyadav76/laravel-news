 @include('admin.header')
 <div id="admin-content">
     <div class="container">
         <div class="row">
             <div class="col-md-10">
                 <h1 class="admin-heading">All Users</h1>
             </div>
             <div class="col-md-2">
                 <a class="add-new" href="{{ route('admin.adduser') }}">add user</a>
             </div>
             <div class="col-md-12">
                 <table class="content-table">
                     <thead>
                         <th>S.No.</th>
                         <th>Full Name</th>
                         <th>User Name</th>
                         <th>Role</th>
                         <th>Edit</th>
                         <th>Delete</th>
                     </thead>
                     <tbody>
                         @php
                             $i = 1;
                         @endphp
                         @foreach ($users as $User)
                             <tr>
                                 <td class='id'>{{ $i++ }}</td>
                                 <td>{{ $User->frstname }}</td>
                                 {{-- <td>{{ $User->password}}</td> --}}
                                 {{-- <td>{{ $User->	lstname }}</td> --}}
                                 <td>{{ $User->username }}</td>
                                 <td>{{ $User->role }}</td>
                                 <td class='edit'><a href='/admin/update-user/{{ $User->id }}'><i
                                             class='fa fa-edit'></i></a></td>
                                 <td class='delete'><a href='/admin/delete-user/{{ $User->id }}'><i
                                             class='fa fa-trash-o'></i></a></td>
                             </tr>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
     </div>
 </div>
 </div>
 @include('admin.footer')
