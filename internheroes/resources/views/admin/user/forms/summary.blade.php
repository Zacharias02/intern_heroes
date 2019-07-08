{!! APFrmErrHelp::showErrorsNotice($errors) !!}
@include('flash::message')
<form class="form" id="add_edit_profile_summary" method="POST" action="{{ route('update.profile.summary', [$user->id]) }}">{{ csrf_field() }}
    <div class="form-body">
        <div id="success_msg" class="has-error"></div>
        <div class="form-group" id="div_summary">
            <label for="summary" class="bold">Profile Summary</label>
            <textarea name="summary" class="form-control" id="summary" required placeholder="Profile Summary">{{ old('summary', (isset($user))? $user->getProfileSummary('summary'):'') }}</textarea>
              <div id="the-count" style="float: right;">
                <span id="current">0</span>
                <span id="maximum">/ 300</span>
              </div>
            <span class="help-block summary-error"></span> </div>
        <button type="button" class="btn btn-large btn-primary" onClick="submitProfileSummaryForm();">Update Summary <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
    </div>
</form>
@push('scripts') 
<script type="text/javascript">
    function submitProfileSummaryForm() {
        var form = $('#add_edit_profile_summary');
        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: form.serialize(),
            dataType: 'json',
            success: function (json) {
                $("#success_msg").html("<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> Summary updated successfully! </div>");
                $('#div_summary').removeClass('has-error');
            }
            ,
            error: function (json) {
                if (json.status === 422) {
                    var resJSON = json.responseJSON;
                    $('.help-block').html('');
                    $.each(resJSON.errors, function (key, value) {
                        $("#success_msg").html("<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button> Please enter Profile Summary with the maximum of 300 characters.</div>");
                        $('#div_' + key).addClass('has-error');
                    });
                } else {
                    // Error
                    // Incorrect credentials
                    // alert('Incorrect credentials. Please try again.')
                }
            }
        });
    }

/*     window.setTimeout(function() {
        $("#success_msg").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 4000); */


</script>
@endpush

