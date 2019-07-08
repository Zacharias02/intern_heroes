<div class="modal-body">
    <div class="form-body">
        <div class="form-group mb-4" id="div_title">
            <input class="form-control" id="title" name="title" type="text" required value="{{(isset($profileCv)? $profileCv->title:'')}}">
            <label>CV Title</label>
            <span class="help-block title-error"></span> </div>
        @if(isset($profileCv))
        <div class="form-group">
            {{ImgUploader::print_doc("cvs/$profileCv->cv_file", $profileCv->title, $profileCv->title)}}
        </div>
        @endif

        <div class="form-group mb-4" id="div_cv_file">
            <label for="is_default" class="bold mb-2">{{__('Upload Your Resume ')}}<small><i>(pdf and doc file only)</i></small></label>
            <input name="cv_file" id="cv_file" type="file" accept="application/pdf, application/msword,.doc,.docx"/>
            <span class="help-block cv_file-error"></span> </div>

        <div class="form-group" id="div_is_default">
            <label for="is_default" class="bold mb-2">{{__('Is default?')}}</label>
            <div class="radio-list">
                <?php
                $val_1_checked = '';
                $val_2_checked = 'checked="checked"';

                if (isset($profileCv) && $profileCv->is_default == 1) {
                    $val_1_checked = 'checked="checked"';
                    $val_2_checked = '';
                }
                ?>

                <label class="radio-inline"><input id="default" name="is_default" type="radio" value="1" {{$val_1_checked}}> {{__('Yes')}} </label>
                <label class="radio-inline"><input id="not_default" name="is_default" type="radio" value="0" {{$val_2_checked}}> {{__('No')}} </label>
            </div>
            <span class="help-block is_default-error"></span>
        </div>
    </div>
</div>