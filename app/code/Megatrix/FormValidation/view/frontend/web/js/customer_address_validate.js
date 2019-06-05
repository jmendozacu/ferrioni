require([
    "jquery"
], function($){
//<![CDATA[
    $(document).ready(function() {
        var validKeys = [8,32,209,241];
        var textInputs = [
            'firstname',
            'lastname',
        ];

        var freeInputs = [
            'company',
            'street_1',
            'street_2',
            'city',
            'region',
        ];

        var numberInputs = [
            'telephone',
            'zip',
        ];

        /** VALIDATE TEXT FIELDS **/
        $.each(textInputs, function( index, value ) {
            var e = $('#'+value);

            e.keypress(function(e){
                var keyCode = e.which;
                var maxLength = 30;

                if ( !( (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) ) && $.inArray(keyCode, validKeys) === -1 ) {
                    e.preventDefault();
                }

                if (this.value.length === maxLength) {
                    e.preventDefault();
                } else if (this.value.length > maxLength) {
                    this.value = this.value.substring(0, max);
                }
            });
        });

        /** VALIDATE FREE FIELDS **/
        $.each(freeInputs, function( index, value ) {
            var e = $('#'+value);

            e.keypress(function(e){
                var maxLength = 30;

                if (value == 'street_1' || value == 'street_2'){
                    maxLength = 50;
                }

                if (this.value.length === maxLength) {
                    e.preventDefault();
                } else if (this.value.length > maxLength) {
                    this.value = this.value.substring(0, max);
                }
            });
        });

        /** VALIDATE NUMBER FIELDS **/
        $.each(numberInputs, function( index, value ) {
            var e = $('#'+value);

            var validateClass = 'validate-length  minimum-length-';

            if (value == 'telephone'){
                e.addClass(validateClass + '7');
            }

            if (value == 'zip'){
                e.addClass(validateClass + '5');
            }

            e.keypress(function(e){
                var keyCode = e.which;
                var maxLength = 13;

                if (value == 'zip'){
                    maxLength = 5;
                }

                if (keyCode < 48 || keyCode > 57) {
                    e.preventDefault();
                }

                if (this.value.length === maxLength) {
                    e.preventDefault();
                } else if (this.value.length > maxLength) {
                    this.value = this.value.substring(0, max);
                }
            });
        });
    });
//]]>
});
