define(["jquery/ui","jquery"], function(Component, $){
    return function(config, element){
        var minicart = $(element);
        minicart.on('contentLoading', function () {
            minicart.on('contentUpdated', function () {
                minicart.find('[data-role="dropdownDialog"]').dropdownDialog("open");
            });
        });

        (function theLoop(self, i) {
            setTimeout(function () {
                var wrapper = $( ".minicart-wrapper" );

                if (wrapper.hasClass('active')) {
                    setTimeout(function(){
                        console.log('Close');
                        minicart.find('[data-role="dropdownDialog"]').dropdownDialog("close");
                    }, 3000);
                } else {
                    if (--i) {
                        theLoop(self, i);
                    }
                }
            }, 1000);
        })(self, 100);

        setTimeout(function(){
        }, 3000);
    }
});