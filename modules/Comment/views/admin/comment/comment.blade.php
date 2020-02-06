@if (module_check_active('Comment'))
@if ($check_comment == true && $module_id != null)
<div id="comment"></div>
<script>
    $(document).ready(function(){
            $('#comment').load('{{ route('mod_comment.web.loadcomment',['id'=>$id_detail_module,'module'=>$module,'link'=>$link]) }}');

});
</script>
@endif
@endif