function openLogin() {
    Swal.fire({
        title: 'Students/Instructors Login',
        html: `<label for="abcda-login">Username</label><input style="background: white;" type="text" id="abcda-username" class="swal2-input" placeholder="Username" title="Username" required>
                <label for="abcda-password">Password</label><input  style="background: white;" type="password" id="abcda-password" class="swal2-input" placeholder="Password" title="Password" required>`,
        inputAttributes: {
            autocapitalize: 'off'
        },
        confirmButtonText: 'Login',
        showLoaderOnConfirm: true,
        focusOnConfirm: false,
        showCloseButton: true,
        allowOutsideClick: () => !Swal.isLoading(),
        preConfirm: () => {
            const username = Swal.getPopup().querySelector('#abcda-username').value
            const password = Swal.getPopup().querySelector('#abcda-password').value
            if (!username || !password) {
                Swal.showValidationMessage(`Please enter username and password`)
            }

            jQuery.ajax({
                type: 'POST',
                url: abcdaAjaxObj.ajaxURL,
                // dataType: 'json',
                data: {
                    action: 'login',
                    username,
                    password
                },
                success: function (data) {
                    if (data.success) {
                        console.log('success');
                        Swal.fire({
                            title: 'Success!!',
                            icon: 'success',
                            background: '#1a1a1a',
                            html: '<span style="color: #fff;">You are logged in.</span>'
                        });
                        // window.location.href = ;
                    } else {
                        console.log('fail');
                        Swal.fire({
                            icon: 'error',
                            title: 'error',
                            background: '#1a1a1a',
                            html: '<span style="color: #fff;">Please contact the Webmin: <a href="email:support@dsbaileyfreelancer.com.au">support@dsbaileyfreelancer.com.au</a></span>'
                        });

                        // window.location.href = url;
                    }
                }
            });
        }
    }).then((result) => {

    })
}


(function ($) {
    'use strict';

    /**
     * All of the code for your public-facing JavaScript source
     * should reside in this file.
     *
     * Note: It has been assumed you will write jQuery code here, so the
     * $ function reference has been prepared for usage within the scope
     * of this function.
     *
     * This enables you to define handlers, for when the DOM is ready:
     *
     * $(function() {
     *
     * });
     *
     * When the window is loaded:
     *
     * $( window ).load(function() {
     *
     * });
     *
     * ...and/or other possibilities.
     *
     * Ideally, it is not considered best practise to attach more than a
     * single DOM-ready or window-load handler for a particular page.
     * Although scripts in the WordPress core, Plugins and Themes may be
     * practising this, we should strive to set a better example in our own work.
     */


})(jQuery);
