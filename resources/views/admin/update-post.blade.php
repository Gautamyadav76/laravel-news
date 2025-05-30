@include('admin.header')
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Update Post</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form for show edit-->

                <form action="{{ route('admin.updatepost', ['id' => $singlePost->id]) }}" method="POST"
                    enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-group">
                        {{-- <input type="hidden" name="post_id" class="form-control" value=" {{ $post->post_id }} " --}}
                        {{-- placeholder=""> --}}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTile">Title</label>
                        <input type="text" name="post_name" class="form-control" id="exampleInputUsername"
                            value="{{ $singlePost->title }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Description</label>
                        <textarea name="postdesc" class="form-control" required rows="5">{{ $singlePost->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCategory">Category</label>
                        <select class="form-control" name="category">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $category->id == $singlePost->category ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                            @endforeach


                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Post image</label>
                        <input type="file" name="image">
                        <img src="/uploads/posts/{{$singlePost->image}}" height="150px">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Update" />
                </form>
                <!-- Form End -->
            </div>
        </div>
    </div>
</div>
@include('admin.footer');
