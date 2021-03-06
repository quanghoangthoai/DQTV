@extends('Admin::layouts.default')
@section('page_header')
<div class="page-header-content header-elements-md-inline">
    <div class="page-title d-flex">
        <h4><i class="far fa-newspaper mr-2"></i> <span class="font-weight-semibold">Bài viết</span> - Thêm</h4>
        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
    </div>
    <div class="header-elements d-none">
        <div class="d-flex justify-content-center">
            <a href="{{route('mod_post.admin.list_post')}}" class="btn btn-primary btn-sm">Danh sách bài viết</a>
        </div>
    </div>
</div>
@endsection
@section('page_content')
<form action="{{ route('mod_post.admin.post_add_post') }}" method="post">
    {{ csrf_field() }}
    <div class="row ml-0 mr-0">
        <div class="col-md-8 p-0" style="border-right: 1px solid #ddd">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Tiêu đề</strong> <sup class="text-danger">(*)</sup></label>
                    <div class="col-lg-9">
                        <input placeholder="Nhập tiêu đề" id="txtTitle" name="title" value="{{ old('title') }}" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Liên kết tĩnh</strong> <sup class="text-danger">(*)</sup></label>
                    <div class="col-lg-9">
                        <div class="input-group">
                            <input placeholder="Nhập liên kết tĩnh" id="txtSlug" type="text" class="form-control" name="slug" value="{{ old('slug') }}">
                            <div class="input-group-prepend mr-0">
                                <a href="javascript:;" onclick="get_slug('#txtTitle', '#txtSlug');" class="btn btn-dark btn-sm"><em class="fa fa-sync"></em></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Hình ảnh</strong><sup class="text-danger"></sup></label>
                    <div class="col-lg-9">
                        <div class="input-group areaBrowserFile">
                            <input placeholder="Chưa chọn hình ảnh" readonly type="text" id="post-image" class="form-control" name="image" value="{{ old('image') }}">
                            <div class="input-group-prepend mr-0">
                                <button class="btn btn-light btn-sm btn-remove-file text-danger" type="button"><i class="fa fa-times"></i></button>
                                <button class="btn btn-dark btn-sm btn-choose-file" data-id="post-image" type="button"><i class="fa fa-image mr-1"></i> Chọn ảnh</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-3 col-form-label"><strong>Mô tả ngắn</strong></label>
                    <div class="col-lg-9">
                        <textarea placeholder="Nhập mô tả ngắn" name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-12 col-form-label">
                        <strong>Nội dung chi tiết</strong> <sup class="text-danger">(*)</sup>
                    </label>
                    <div class="col-lg-12">
                        <textarea placeholder="Nhập nội dung chi tiết" id="content" name="content">{{ old('content') }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 p-0">
            <div class="card-body">
                <div class="form-group row">
                    <label class="col-lg-12 col-form-label"><strong>Danh mục</strong> <sup class="text-danger">(*)</sup></label>
                    <div class="col-lg-12">
                        <select name="category_id" class="form-control">
                            <option value="">-- Chưa chọn --</option>
                            @if (isset($listCategory) && count($listCategory))
                            @foreach ($listCategory as $cat)
                            <option value="{{ $cat['id'] }}" {{ old('category_id') == $cat['id'] ? 'selected' : '' }}>{{ $cat['prefix'] }} {{ $cat['title'] }}
                            </option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label><strong>Tags</strong></label>
                    <input name="tags" type="text" class="form-control" placeholder="Nhập tags" value="{{ old('tags') }}">
                </div>
                <div class="form-group">
                    <label><strong>Tác giả</strong></label>
                    <input name="author" type="text" class="form-control" placeholder="Nhập tác giả" value="{{ old('author') }}">
                </div>
                <div class="form-group">
                    <label><strong>Nguồn tin</strong></label>
                    <input name="source" type="text" class="form-control" placeholder="Nhập nguồn tin" value="{{ old('source') }}">
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label"><strong>Nổi bật</strong> </label>
                    <div class="col-md-9">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input name="featured" type="checkbox" class="form-check-input-styled" value="1" {{ old('featured') ? 'checked' : '' }}>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label"><strong>Trạng thái</strong> </label>
                    <div class="col-md-9">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <div class="uniform-choice">
                                    <div class="uniform-choice">
                                        <input name="status" type="radio" class="form-check-input-styled" {{ old('status', 1) == 1 ? 'checked' : '' }} value="1">
                                    </div>
                                </div>
                                <span class="text-success">Hoạt động</span>
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <div class="uniform-choice">
                                    <div class="uniform-choice">
                                        <input name="status" type="radio" class="form-check-input-styled" {{ old('status', 1) == 0 ? 'checked' : '' }} value="0">
                                    </div>
                                </div>
                                <span class="text-danger">Tạm ngưng</span>
                            </label>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="float-right mb-5">
                    <a href="{{ route('mod_post.admin.list_post') }}" class="btn btn-dark">Hủy bỏ</a>
                    <button type="submit" class="btn btn-primary">Thêm bài viết</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('custom_js')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('content', {
        language: 'vi',
        height: 500,
        filebrowserBrowseUrl: '/file-manager/ckeditor'
    });
</script>
@endsection