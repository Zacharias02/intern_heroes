<div class="modal-dialog modal-md">
    <div class="modal-content">
        <form class="form" id="add_edit_profile_skill" method="POST" action="{{ route('store.front.profile.skill', [$user->id]) }}">{{ csrf_field() }}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{__('Add Skill')}}</h4>
            </div>
            @include('user.forms.skill.skill_form')
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary round" onClick="submitProfileSkillForm();">{{__('Add Skill')}} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
            </div>
        </form>
    </div>
    <!-- /.modal-content --> 
</div>
<!-- /.modal-dialog -->