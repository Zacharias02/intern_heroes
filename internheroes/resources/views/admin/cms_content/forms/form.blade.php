<?php
$lang = config('default_lang');
if (isset($cmsContent))
    $lang = $cmsContent->lang;
$lang = MiscHelper::getLang($lang);
$direction = MiscHelper::getLangDirection($lang);
$queryString = MiscHelper::getLangQueryStr();
?>
{!! APFrmErrHelp::showErrorsNotice($errors) !!}
<div class="form-body">	
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'lang') !!}">
        {!! Form::label('lang', 'Language', ['class' => 'bold']) !!}                    
        {!! Form::select('lang', ['' => 'Select Language']+$languages, $lang, array('class'=>'form-control', 'id'=>'lang', 'onchange'=>'setLang(this.value)')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'lang') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'page_id') !!}">
        {!! Form::label('page_id', 'CMS Page', ['class' => 'bold']) !!}        
        <span id="pages_dd">            
            {!! Form::select('page_id', ['' => 'Select page']+ $cmsPages, null, array('class'=>'form-control', 'id'=>'page_id')) !!}
        </span>
        {!! APFrmErrHelp::showErrors($errors, 'page_id') !!}                                       
    </div>    
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'page_title') !!}">
        {!! Form::label('page_title', 'Page Title', ['class' => 'bold']) !!}                    
        {!! Form::text('page_title', null, array('class'=>'form-control', 'id'=>'page_title', 'placeholder'=>'Page Title', 'dir'=>$direction)) !!}
        {!! APFrmErrHelp::showErrors($errors, 'page_title') !!}                                       
    </div>    
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'page_content') !!}">
        {!! Form::label('page_content', 'Page Content', ['class' => 'bold']) !!}                    
        {!! Form::textarea('page_content', null, array('class'=>'form-control', 'id'=>'page_content', 'placeholder'=>'Page Content')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'page_content') !!}                                       
    </div>
    <input type="file" name="image" id="image" style="display:none;" accept="image/*"/>
</div>
@push('scripts')
<script type="text/javascript">
    function setLang(lang) {
        window.location.href = "<?php echo url(Request::url()) . $queryString; ?>" + lang;
    }
    var lang = $('#lang').children("option:selected").val();
    <?php
        if (!isset($cmsContent)){
    ?>
        setPages(lang)
        function setPages(lang){
            if (lang != '') {
                $.post("{{ route('filter.cms.pages.dropdown') }}", {lang: lang, _method: 'POST', _token: '{{ csrf_token() }}'})
                        .done(function (response) {
                            $('#pages_dd').html(response);
                        });
            }
        }
    <?php
        }
    ?>
</script>
@include('admin.shared.cms_form_tinyMCE', array($lang, $direction))
@endpush