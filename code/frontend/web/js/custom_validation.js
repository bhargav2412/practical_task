$('body').on('beforeSubmit', 'form#validate_form', function () {
    var form = $(this);
    if (form.find('.has-error').length) {
	return false;
    }
    $(document).on("click", ".btn_check_vali", function () {
	$('form[id="validate_form"]').validate({
	    errorClass: 'errors',
	    rules: {
		"UserMaster[name]": {
		    required: true
		},
		"UserMaster[email]": {
		    required: true,
		    email: true
		},
		"UserMaster[gender]": {
		    required: true
		},
		"UserMaster[password]": {
		    required: true,
		    minlength: 6
		},
		"UserMaster[c_pwd]": {
		    required: true,
		    equalTo: "#usermaster-password"
		},
		"UserMaster[user_hobby][]": {
		    required: true,
		    maxlength: 3
		},
	    },
	    messages: {
		"UserMaster[name]": 'Name cannot be blank',
		"UserMaster[email]": 'Email cannot be blank',
		"UserMaster[gender]": 'Gender cannot be blank',
		"UserMaster[password]": 'Password cannot be blank',
		"UserMaster[c_pwd]": 'Confirm password cannot be blank',
		"UserMaster[user_hobby][]": {
		    required: "You must check at least 1 box",
		    maxlength: "Check no more than {0} boxes"
		}
	    },
	    errorPlacement: function (error, element) {
		element.parent('div').find('.help-block').html(error);
	    },
	    submitHandler: function () {
		$.ajax({
		    url: 'create',
		    type: 'post',
		    data: $('#validate_form').serialize(),
		    success: function (response) {
			alert(response);
			return false;
		    },
		    error: function () {
			console.log('internal server error');
		    }
		});
	    }
	});
    });
});

