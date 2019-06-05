require([
    "jquery"
], function($){
//<![CDATA[
    $(document).ready(function() {
        var email_address = $("input[id='email_address']");
        var validKeys = [8,32,209,241];
        var textInputs = [
            'firstname',
            'lastname'
        ];
        var alphaInputs = [
            'email_address'
        ];

        /** VALIDATE TEXT FIELDS **/
        $.each(textInputs, function( index, value ) {
            var e = $('#'+value);

            e.keypress(function(e){
                var keyCode = e.which;
                var maxLength = 30;

                if (!((keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122)) && $.inArray(keyCode, validKeys) === -1) {
                    e.preventDefault();
                }

                if (this.value.length === maxLength) {
                    e.preventDefault();
                } else if (this.value.length > maxLength) {
                    this.value = this.value.substring(0, max);
                }
            });
        });

        /** VALIDATE TEXT FIELDS **/
        $.each(alphaInputs, function( index, value ) {
            var e = $('#'+value);

            e.keypress(function(e){
                var keyCode = e.which;
                var maxLength = 30;

                if (this.value.length === maxLength) {
                    e.preventDefault();
                } else if (this.value.length > maxLength) {
                    this.value = this.value.substring(0, max);
                }
            });
        });

        /** VALIDATE EMAIL **/
        email_address.on('keydown keyup change', function () {
            $(this).val( $(this).val().toLowerCase() );
        });
    });
//]]>
});
