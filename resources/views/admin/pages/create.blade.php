@extends('admin.layouts.base')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Add New Page</h1>

    <form action="{{ route('pages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="page_name">Page Name</label>
                    <input type="text" class="form-control" id="page_name" name="page_name" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="banner_image">Banner Image</label>
                    <input type="file" class="form-control" id="banner_image" name="banner_image">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="page_title">Page Title</label>
                    <input type="text" class="form-control" id="page_title" name="page_title">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="page_type">Page Type</label>
                    <select class="form-control" id="page_type" name="page_type" required>
                        <option value="1">Main Page</option>
                        <option value="2">Sub Page</option>
                        <option value="3">Sub Sub Page</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="related_page">Related Page</label>
                    <select class="form-control" id="related_page" name="related_page">
                        @foreach($pages as $page)
                        @if($page->page_type == 1 || $page->page_type == 2)
                        <option value="{{ $page->id }}">{{ $page->page_name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="page_style">Page Style</label>
                    <select class="form-control" id="page_style" name="page_style" onchange="togglePageContent()">
                        <option value="link">Link</option>
                        <option value="content">Content</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group" id="page_link_group" style="display: none;">
            <label for="link">Page Link</label>
            <input type="text" class="form-control" id="link" name="link">
        </div>

        <div class="form-group" id="page_content_group" style="display: none;">
            <label for="description">Content/Description</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Create Page</button>
    </form>
</div>

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    function togglePageContent() {
        const pageStyle = document.getElementById('page_style').value;
        document.getElementById('page_link_group').style.display = pageStyle === 'link' ? 'block' : 'none';
        document.getElementById('page_content_group').style.display = pageStyle === 'content' ? 'block' : 'none';

        if (pageStyle === 'content') {
            CKEDITOR.replace('description');
        } else {
            if (CKEDITOR.instances.description) {
                CKEDITOR.instances.description.destroy(true);
            }
        }
    }

    // Initialize on page load
    togglePageContent();
</script>
@endsection