@include('admin.header')

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Posts</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="{{ route('admin.addpost') }}">add post</a>
                @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($posts as $post)
                            <tr>
                                <td class='id'>{{ $i++ }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->catInfo->name}}</td>
                                <td><img src="/uploads/posts/{{ $post->image }}" width="80px"></</td>
                                <td>{{ $post->description }}</td>
                                <td class='edit'><a href='/admin/update-post/{{ $post->id }}'><i class='fa fa-edit'></i></a></td>
                                <td class='delete'><a href='/admin/delete-post/{{ $post->id }}'><i class='fa fa-trash-o'></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('admin.footer')
