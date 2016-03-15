(function($,window,undefined){"use strict";var toggleFormState=function($form,state){if(state=="disabled"){$form.find('*[type="submit"]').addClass("disabled").attr("disabled","disabled")}else{$form.find('*[type="submit"]').removeClass("disabled").removeAttr("disabled")}},isCheckingIfFormValid=false;$(window).bind("validatorsLoaded formValidationSetup",function(evt,$forms,conf){var $formsToDisable=conf.disabledFormFilter?$forms.filter(conf.disabledFormFilter):$forms,showErrorDialogs=conf.showErrorDialogs===undefined||conf.showErrorDialogs;$formsToDisable.addClass(showErrorDialogs?"disabled-with-errors":"disabled-without-errors").find("*[data-validation]").attr("data-validation-event","keyup").on("validation",function(evt,valid){if(!isCheckingIfFormValid){isCheckingIfFormValid=true;var $form=$(this).closest("form");if(valid&&$form.isValid(conf,conf.language,false)){toggleFormState($form,"enabled")}else{toggleFormState($form,"disabled")}isCheckingIfFormValid=false}});toggleFormState($formsToDisable,"disabled");$formsToDisable.validateOnEvent(conf.language,conf)}).on("validationErrorDisplay",function(evt,$input,$elem){if($input.closest("form").hasClass("disabled-without-errors"))$elem.hide()})})(jQuery,window);
