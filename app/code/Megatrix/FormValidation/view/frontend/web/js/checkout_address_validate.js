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
            'street[0]',
            'street[1]',
            'city',
            'region',
        ];

        var numberInputs = [
            'telephone',
            'postcode',
        ];

        $(document).ready(function() {
            (function theLoop(self, i) {
                setTimeout(function () {
                    var postcode = $("input[name='postcode']");

                    if (postcode.length > 0) {
                        /** VALIDATE TEXT FIELDS **/
                        $.each(textInputs, function( index, value ) {
                            var e = $("input[name='"+value+"']");

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
                            var e = $("input[name='"+value+"']");

                            e.keypress(function(e){
                                var maxLength = 30;
                                var val = value;

                                console.log('.');

                                if (val == 'street[0]' || val == 'street[1]'){
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
                            var e = $("input[name='"+value+"']");

                            var validateClass = 'validate-length  minimum-length-';

                            if (value == 'telephone'){
                                e.addClass(validateClass + '7');
                            }

                            if (value == 'postcode'){
                                e.addClass(validateClass + '5');
                            }

                            e.keypress(function(e){
                                var keyCode = e.which;
                                var maxLength = 13;

                                if (value == 'postcode'){
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
                    } else {
                        if (--i) {
                            theLoop(self, i);
                        }
                    }
                }, 500);
            })(self, 25);
        });
    });
//]]>
});
