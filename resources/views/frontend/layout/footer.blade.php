   @include('frontend.partials.rightSidebar')
   
   <!-- footer -->
   <div class="footer">

    <div class="container w-75">
       <div class="row">
          <div class="col-md-4">
             <ul class="fa-ul text-left">
                <h6 class="font-weight-bold">Home</h6>
                <li><a href="#" target="_blank" class="card-link" >About Us</a></li>
                <li><a href="#" target="_blank" class="card-link">Contact</a></li>
             </ul>
          </div>

          <div class="col-md-4">
             <ul class="fa-ul text-left">
                <h6 class="font-weight-bold">User Manual</h6>
                <li><a href="#" class="card-link">User Guide</a></li>
                <li><a href="#" class="card-link">Your Question</a></li>
             </ul>
          </div>

          <div class="col-md-4">
             <ul class="fa-ul text-left">
                <h6 class="font-weight-bold">Other Links</h6>
                <li><a href="#" class="card-link" >Our Organization</a></li>
                <li><a href="#" class="card-link">Useful Application</a></li>
             </ul>
          </div>

       </div>
    </div>
    <!-- end of row -->
 </div>
 <!-- end of container -->
</div>
<!-- end of footer -->

<!-- end of footer -->
<div class="footer-bottom">
 <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><span class="fa fa-chevron-circle-up"></span></a>
</div>

</div> <!-- end of sc_main_container -->

</body>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="{{asset('frontend/assets/js/tether.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/jquery.validate.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script> 
   // Select2
   $('.select2').select2();
   $('.select3').select2();
   $('.select4').select2();
   $('.select22').select2();
</script>

<script> 
   $('form')
       .each(function(){
           $(this).data('serialized', $(this).serialize())
       })
       .on('change input', function(){
           $(this)             
               .find('input:submit, button:submit')
                   .prop('disabled', $(this).serialize() == $(this).data('serialized'))
           ;
       })
       .find('input:submit, button:submit')
           .prop('disabled', true)
   ;
</script>
<script>
"use strict";

// Component Definition 
var KTImageInput = function(elementId, options) {
    // Main object
    var the = this;
    var init = false;

    // Get element object
    var element = KTUtil.getById(elementId);
    var body = KTUtil.getBody();

    if (!element) {
        return;
    }

    // Default options
    var defaultOptions = {
        editMode: false
    };

    ////////////////////////////
    // ** Private Methods  ** //
    ////////////////////////////

    var Plugin = {
        /**
         * Construct
         */

        construct: function(options) {
            if (KTUtil.data(element).has('imageinput')) {
                the = KTUtil.data(element).get('imageinput');
            } else {
                // reset menu
                Plugin.init(options);

                // build menu
                Plugin.build();

                KTUtil.data(element).set('imageinput', the);
            }

            return the;
        },

        /**
         * Init avatar
         */
        init: function(options) {
            the.element = element;
            the.events = [];

            the.input = KTUtil.find(element, 'input[type="file"]');
            the.wrapper = KTUtil.find(element, '.image-input-wrapper');
            the.cancel = KTUtil.find(element, '[data-action="cancel"]');
            the.remove = KTUtil.find(element, '[data-action="remove"]');
            the.src = KTUtil.css(the.wrapper, 'backgroundImage');
            the.hidden = KTUtil.find(element, 'input[type="hidden"]');

            // merge default and user defined options
            the.options = KTUtil.deepExtend({}, defaultOptions, options);
        },

        /**
         * Build
         */
        build: function() {
            // Handle change
            KTUtil.addEvent(the.input, 'change', function(e) {
                e.preventDefault();

               if (the.input && the.input.files && the.input.files[0]) {
                   var reader = new FileReader();
                   reader.onload = function(e) {
                       KTUtil.css(the.wrapper, 'background-image', 'url('+e.target.result +')');
                   }
                   reader.readAsDataURL(the.input.files[0]);

                   KTUtil.addClass(the.element, 'image-input-changed');
                    KTUtil.removeClass(the.element, 'image-input-empty');

                    // Fire change event
                    Plugin.eventTrigger('change');
               }
            });

            // Handle cancel
            KTUtil.addEvent(the.cancel, 'click', function(e) {
                e.preventDefault();

                // Fire cancel event
                Plugin.eventTrigger('cancel');

               KTUtil.removeClass(the.element, 'image-input-changed');
                KTUtil.removeClass(the.element, 'image-input-empty');
               KTUtil.css(the.wrapper, 'background-image', the.src);
               the.input.value = "";

                if (the.hidden) {
                    the.hidden.value = "0";
                }
            });

            // Handle remove
            KTUtil.addEvent(the.remove, 'click', function(e) {
                e.preventDefault();

                // Fire cancel event
                Plugin.eventTrigger('remove');

               KTUtil.removeClass(the.element, 'image-input-changed');
                KTUtil.addClass(the.element, 'image-input-empty');
               KTUtil.css(the.wrapper, 'background-image', "none");
               the.input.value = "";

                if (the.hidden) {
                    the.hidden.value = "1";
                }
            });
        },

        /**
         * Trigger events
         */
        eventTrigger: function(name) {
            //KTUtil.triggerCustomEvent(name);
            for (var i = 0; i < the.events.length; i++) {
                var event = the.events[i];
                if (event.name == name) {
                    if (event.one == true) {
                        if (event.fired == false) {
                            the.events[i].fired = true;
                            return event.handler.call(this, the);
                        }
                    } else {
                        return event.handler.call(this, the);
                    }
                }
            }
        },

        addEvent: function(name, handler, one) {
            the.events.push({
                name: name,
                handler: handler,
                one: one,
                fired: false
            });

            return the;
        }
    };

    //////////////////////////
    // ** Public Methods ** //
    //////////////////////////

    /**
     * Set default options
     */

    the.setDefaults = function(options) {
        defaultOptions = options;
    };

    /**
     * Attach event
     */
    the.on = function(name, handler) {
        return Plugin.addEvent(name, handler);
    };

    /**
     * Attach event that will be fired once
     */
    the.one = function(name, handler) {
        return Plugin.addEvent(name, handler, true);
    };

    // Construct plugin
    Plugin.construct.apply(the, [options]);

    return the;
};


</script>

@include('backend.ajax.addressDynamic')
@include('backend.ajax.serviceItemDynamic')

<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>

<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
@stack('frontScript')


</html>