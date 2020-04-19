// Class definition
var KTUsersAdd = function () {
    // Base elements
    var wizardEl;
    var formEl;
    var validator;
    var wizard;
    var avatar;
    
    // Private functions
    var initWizard = function () {
        var avatar = new KTAvatar('kt_user_avatar');

        // Initialize form wizard
        wizard = new KTWizard('kt_wizard_v3', {
            startStep: 1,
        });

        // Validation before going to next page
        /* wizard.on('beforeNext', function(wizardObj) {
            if (validator.form() !== true) {
                wizardObj.stop();  // don't go to the next step
            }
        }); */

        /* wizard.on('beforePrev', function(wizardObj) {
			if (validator.form() !== true) {
				wizardObj.stop();  // don't go to the next step
			}
		}); */

        // Change event
        wizard.on('change', function(wizard) {
            window.scrollTo(0, 0);    
        });
    }

    var initValidation = function() {
        validator = formEl.validate({
            // Validate only visible fields
            ignore: ":hidden",

            // Validation rules
            rules: {
                //= Client Information(step 1)
                user_name: {
                    required: true 
                },
                email: {
                    required: true,
                    email: true 
                },       
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 40

                },     
                confirm_password: {
                    equalTo: '.password',

                },     

                //= Client Information(step 2)
                // Profile Details
                profile_avatar: {
                    required: true,
                },
                name: {
                    required: true,
                },
                address1: {
                    required: true,
                },
 
                //= Client Information(step 3)
                // Company Details
                /* company_name: {
                    required: true,
                }, 
                company_id: {
                    required: true,
                }, 
                company_email: {
                    required: true,
                }, 
                company_tel: {
                    required: true,
                },               
                'account_communication[]': {
                    required: true
                },

                //= Client Information(step 4)
                // Billing Information
                billing_card_name: {
                    required: true
                },
                 billing_card_number: {
                    required: true,
                    creditcard: true
                }, 
                billing_card_exp_month: {
                    required: true
                },
                billing_card_exp_year: {
                    required: true
                },
                billing_card_cvv: {
                    required: true,
                    minlength: 2,
                    maxlength: 3
                },
                
                //= Confirmation(step 5)
                accept: {
                    required: true
                }*/
                role: {
                    required: true
                }
            },

            // Validation messages
            messages: {
                user_name:{
                    required: 'please enter a user name'
                },
                email:{
                    required: 'please enter a email',
                    email: 'please enter a valid email'
                },
                password: {
                    required: 'please enter a password',
                    minlength: 'password must be minimum 8 character',
                    maxlength: 'password should not be more than 40 character'

                },     
                confirm_password: {
                    equalTo: 'password does not match',

                },
                profile_avatar: {
                    required: 'please give a pic of you',
                },
                name: {
                    required: 'please enter your name',
                },
                address1: {
                    required: 'please enter your present address',
                },
                role: {
                    required: 'please enter a role',
                },
                
            },
            
            // Display error  
            invalidHandler: function(event, validator) {     
                KTUtil.scrollTop(0);

                swal.fire({
                    "title": "Miss Input", 
                    "text": "There are some fields you did not fill in your submission. Please correct them.", 
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary m-btn m-btn--wide",
                    timer: 3500
                });
            },

            // Submit valid form
            /* submitHandler: function (form) {
                
            } */
        });   
    }

    /*var initSubmit = function() {
        var btn = formEl.find('[data-ktwizard-action="action-submit"]');

        btn.on('click', function(e) {
            e.preventDefault();

            if (validator.form()) {
                // See: src\js\framework\base\app.js
                KTApp.progress(btn);
                //KTApp.block(formEl);

        var url = $(this).attr('formaction');
        var method = $(this).attr('formmethod');
        var formdata = new FormData($('#kt_form')[0]);

        $.ajax({
            url: url,
            type: method,
            data: formdata,
            cache: false,
            dataType: 'JSON',
            contentType: false,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == 'success') {
                    swal({
                        title: "Success!",
                        text: "New Row Created!",
                        icon: "success",
                        button: "Done",
                        timer: 5000,
                    });
                    return offerall();
                }
                if (data == 'error') {
                    swal({
                        title: "error!",
                        text: "New Row Not Created!",
                        icon: "error",
                        button: "Done",
                        timer: 5000,
                    });
                }
            },
            complete: function() {
                $('.loading').css('display', 'none');
            },    
        })
            }
        });
    }*/

    return {
        // public functions
        init: function() {
            wizardEl = KTUtil.get('kt_wizard_v3');
            formEl = $('#kt_form');

            initWizard(); 
            initValidation();
            //initSubmit();
        }
    };
}();

jQuery(document).ready(function() {    
    KTUsersAdd.init();
});