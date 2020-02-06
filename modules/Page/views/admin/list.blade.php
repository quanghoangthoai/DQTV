@extends('Admin::layouts.default')
@section('page_header')
<div class="page-header-content header-elements-md-inline">
    <div class="page-title d-flex">
        <h4><i class="fa fa-file-alt mr-2"></i> <span class="font-weight-semibold">Trang</span> - Danh sách</h4>
        <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
    </div>
    <div class="header-elements d-none">
        <div class="d-flex justify-content-center">
            <a href="{{route('mod_page.admin.add_page')}}" class="btn btn-primary btn-sm">Thêm trang</a>
        </div>
    </div>
</div>
@endsection
@section('page_content')

<div class="card-body">
    <form method="GET">
        <div class="row">
            <div class="col-7">
                <div class="form-group mb-0">
                    <input type="text" placeholder="Tìm kiếm theo tên bài viết" class="form-control" name="title" id="" aria-describedby="helpId" placeholder="">
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <select class="form-control" name="status" id="">
                        <option value="" disabled selected>Chọn trạng thái</option>
                        <option value='0' {{old('status') == '0' ? 'selected' : ''}}>Không hiển thị</option>
                        <option value='1' {{old('status') == '1' ? 'selected' : ''}}>Hiển thị</option>
                    </select>
                </div>
            </div>
            <div class="col-3 d-flex justify-content-end align-items-baseline">
                <button type="submit" class="btn btn-info mr-3 d-flex align-items-center"><i class="fas fa-filter mr-2"></i>Lọc</button>
                <a href="{{route('mod_page.admin.list_page')}}"  class="btn btn-danger d-flex align-items-center" id="button-search-document" ><i class="icon-trash mr-2"></i>Xóa</a>
            </div>
        </div>
    </form>

</div>
@if (count($listPage) > 0)
<div class="table-responsive">
    <table class="table datatable-basic">
        <thead class="bg-light">
            <tr>
                <th class="text-center" style="width:100px">Thứ tự</th>
                <th class="text-center">Tên trang</th>
                <th class="text-center">Trạng thái</th>
                <th class="text-center">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listPage as $page)
            <tr>
                <td class="text-center">
                    <span style="display:none;">{{ $page['order'] }}</span>
                    <select data-min="{{ $minOrder }}" data-max="{{ $maxOrder }}" data-order="{{ $page['order'] }}" data-id="{{ $page['id'] }}" class="form-control changOrderPage"></select>
                </td>
                <td><a target="_blank" href="{{ route('mod_page.web.detail_page',$page['slug']) }}"><strong>{{ $page['title'] }}</strong></a></td>
                <td class="text-center">
                    <div class="form-check form-check-switchery form-check-switchery-sm">
                        <label class="form-check-label">
                            <input data-id="{{ $page['id'] }}" type="checkbox" class="form-input-switchery" {{ $page['status'] ? 'checked' : '' }}>
                        </label>
                    </div>
                </td>
                <td class="text-center">
                    <a href="{{ route('mod_page.admin.edit_page', $page['id']) }}" class="text-warning mr-2" data-popup="tooltip" title="Sửa"><i class="fa fa-edit"></i></a>
                    <a href="javascript:;" onclick="askToDelete(this);return false;" data-href="{{ route('mod_page.admin.delete_page', $page['id']) }}" class="text-danger" data-popup="tooltip" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<div class="card-body">
    <div class="alert alert-info">
        Chưa có dữ liệu
    </div>
</div>
@endif
@endsection

@section('custom_js')
<script src="{{ asset('assets/admin/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script>
    function setSwitchery(switchElement, checkedBool) {
        if((checkedBool && !switchElement.isChecked()) || (!checkedBool && switchElement.isChecked())) {
            switchElement.setPosition(true);
            switchElement.handleOnchange(true);
        }
    }
    $(document).ready(function(){
        $('.uniform-checker').click(function (e) {
            if ($(this).find('input[type="checkbox"]').hasClass('all')) {
                $('input[type="checkbox"].form-check-input-styled:not(.all)').prop('checked', !$(this).find('span').first().hasClass('checked'));
            } else {
                if ($(this).find('span').first().hasClass('checked'))
                    $('.selectAll .uniform-checker .form-check-input-styled').prop('checked', false);
                else {
                    if ($('.uniform-checker span:not(.checked)').length == $('.uniform-checker').length - 1)
                        $('.selectAll .uniform-checker .form-check-input-styled').prop('checked', true);
                }
            }
            $.uniform.update();
        });
        if (!$().DataTable) {
            console.warn('Warning - datatables.min.js is not loaded.');
            return;
        }
        var switches = Array.prototype.slice.call(document.querySelectorAll('.form-input-switchery'));
        switches.forEach(function (html) {
            var switchery = new Switchery(html, {
                secondaryColor: '#d8201c'
            });
        });
        var inProcess = false;
        $(document).find('.form-input-switchery').each(function (i, html) {
            $(html).on('click', function(e){
                if (!inProcess) {
                    if (typeof $(this).attr('checked') !== typeof undefined) {
                        // 1 => 0
                        inProcess = true;
                        $.ajax({
                            type: 'post',
                            url: "{{ route('mod_page.ajax.changeStatus') }}",
                            data: {
                                _token: _token,
                                id: $(this).data('id'),
                                status: 0
                            },
                            dataType: 'JSON',
                            success: function(res) {
                                inProcess = false;
                                if (res.status) {
                                    $(html).removeAttr('checked');
                                    app.showNotify(res.msg, 'success');
                                } else {
                                    app.showNotify(res.msg, 'error');
                                    setTimeout(function(){
                                        var newEl = new Switchery(html, {
                                            secondaryColor: '#d8201c'
                                        });
                                        setSwitchery(newEl, true);
                                    }, 200);
                                }
                            }
                        });
                    }
                    if (typeof $(this).attr('checked') === typeof undefined) {
                        // 0 => 1
                        inProcess = true;
                        $.ajax({
                            type: 'post',
                            url: "{{ route('mod_page.ajax.changeStatus') }}",
                            data: {
                                _token: _token,
                                id: $(this).data('id'),
                                status: 1
                            },
                            dataType: 'JSON',
                            success: function(res) {
                                inProcess = false;
                                if (res.status) {
                                    $(html).attr('checked', 'checked');
                                    app.showNotify(res.msg, 'success');
                                } else {
                                    app.showNotify(res.msg, 'error');
                                    setTimeout(function(){
                                        var newEl = new Switchery(html, {
                                            secondaryColor: '#d8201c'
                                        });
                                        setSwitchery(newEl, false);
                                    }, 200);
                                }
                            }
                        });
                    }
                } else {
                    e.preventDefault();
                }
            });
        });
    });

    $('.changOrderPage').each(function() {
        var min = $(this).data('min');
        var max = $(this).data('max');
        var selected = $(this).data('order');
        var id = $(this).data('id');
        var html = '';
        for (var i = min; i <= max; i++) {
            html += '<option value="' + i + '" ' + (i == selected ? 'selected' : '') + '>' + i + '</option>';
        }
        $(this).attr('onchange', 'change_order(this);return false;');
        $(this).html(html);
    });

    function change_order(el)
    {
        var id = $(el).data('id');
        var order = $(el).val();
        // call ajax to chang order
        $(document).find('.changOrderPage').attr('disabled', 'disabled');
        $.ajax({
            type: 'post',
            url: "{{ route('mod_page.admin.ajaxchangepage') }}",
            data: {
                _token: _token,
                id: id,
                order: order
            },
            dataType: 'JSON',
            success: function(data) {
                window.location.reload();
            }
        });
    }
</script>
@endsection