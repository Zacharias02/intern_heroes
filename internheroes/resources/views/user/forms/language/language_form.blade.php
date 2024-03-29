<div class="modal-body">
    <div class="form-body">
        <div class="formrow" id="div_language_id">
            <?php
            $language_id = (isset($profileLanguage) ? $profileLanguage->language_id : null);
            ?>
            {!! Form::select('language_id', [''=>__('Select Language')]+$languages, $language_id, array('class'=>'form-control', 'id'=>'language_id')) !!} 
            <label>{{__('Language')}}</label>  
            <span class="help-block language_id-error"></span> </div>
        <div class="formrow" id="div_language_level_id">
            <?php
            $language_level_id = (isset($profileLanguage) ? $profileLanguage->language_level_id : null);
            ?>
            {!! Form::select('language_level_id', [''=>__('Select Language Proficiency')]+$languageLevels, $language_level_id, array('class'=>'form-control', 'id'=>'language_level_id')) !!} 
            <label>{{__('Language Proficiency')}}</label>  
            <span class="help-block language_level_id-error"></span> </div>
    </div>
</div>
