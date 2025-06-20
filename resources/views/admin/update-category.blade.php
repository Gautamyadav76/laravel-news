@include('admin.header')

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="adin-heading"> Update Category</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <form action="{{ route('admin.updateCategory', ['id' => $category->id]) }}" method ="POST">
                    @csrf
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $category->name }}"
                            placeholder="" required>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="submit" name="sumbit" class="btn btn-primary" value="Update" required />
                </form>
            </div>
        </div>
    </div>
</div>
@include('admin.footer')
