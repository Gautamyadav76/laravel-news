@include('admin.header')

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="/admin/add-category">add category</a>
            </div>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($categories as $category)
                            <tr>
                                <td class='id'>{{ $i++ }}</td>
                                <td>{{ $category->name }}</td>
                                <td>0</td>
                                <td class='edit'><a href='/admin/update-category/{{ $category->id }}'><i
                                            class='fa fa-edit'></i></a></td>
                                <td class='delete'><a href='/admin/delete-category/{{ $category->id }}'><i
                                            class='fa fa-trash-o'></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <ul class='pagination admin-pagination'>
                    <li class="active"><a>1</a></li>
                    <li><a>2</a></li>
                    <li><a>3</a></li>
                </ul> --}}
            </div>
        </div>
    </div>
</div>
@include('admin.footer')
