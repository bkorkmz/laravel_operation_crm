/**
* PHP Email Form Validation - v3.6
* URL: https://bootstrapmade.com/php-email-form/
* Author: BootstrapMade.com
*/
(function () {
  "use strict";

  let forms = document.querySelectorAll('.php-email-form');

  forms.forEach( function(e) {
    e.addEventListener('submit', function(event) {
      event.preventDefault();

      let thisForm = this;

      let action = thisForm.getAttribute('action');
      console.log(action);
      let recaptcha = thisForm.getAttribute('data-recaptcha-site-key');
      
      if( ! action ) {
        displayError(thisForm, 'The form action property is not set!');
        return;
      }
      thisForm.querySelector('.loading').classList.add('d-block');
      thisForm.querySelector('.error-message').classList.remove('d-block');
      thisForm.querySelector('.sent-message').classList.remove('d-block');

      let formData = new FormData( thisForm );

      if ( recaptcha ) {
        if(typeof grecaptcha !== "undefined" ) {
          grecaptcha.ready(function() {
            try {
              grecaptcha.execute(recaptcha, {action: 'php_email_form_submit'})
              .then(token => {
                formData.set('recaptcha-response', token);
                php_email_form_submit(thisForm, action, formData);
              })
            } catch(error) {
              displayError(thisForm, error);
            }
          });
        } else {
          displayError(thisForm, 'The reCaptcha javascript API url is not loaded!')
        }
      } else {
        php_email_form_submit(thisForm, action, formData);
      }
    });
  });

  // function php_email_form_submit(thisForm, action, formData) {
  //   fetch(action, {
  //     method: 'POST',
  //     body: formData,
  //     headers: {'X-Requested-With': 'XMLHttpRequest'}
  //   })
    // .then(response => {


    //   if( response.ok ) {
    //     return response.text();
    //   } else {
        
    //     throw new Error(`${response.status} ${response.statusText} ${response.url}`); 
    //   }
    // })
  //   .then(data => {
  //     thisForm.querySelector('.loading').classList.remove('d-block');
  //     if (data.trim() == 'OK') {
  //       thisForm.querySelector('.sent-message').classList.add('d-block');
  //       thisForm.reset(); 
  //     } else {
  //       // return response.text();
  //       throw new Error(data ? data : 'Form submission failed and no error message returned from: ' + action); 
  //     }
  //   })
  //   .catch((error) => {
  //     // return response.errors.text();
  //     displayError(thisForm, error);
  //   });
  // }


  function php_email_form_submit(thisForm, action, formData) {
    fetch(action, {
        method: 'POST',
        body: formData,
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
    })
        .then(response => response.json()) // JSON formatındaki yanıtı işle
        .then(data => {
            thisForm.querySelector('.loading').classList.remove('d-block');

            if (data.message === 'OK') {
              thisForm.querySelector('.sent-message').classList.add('d-block');
              thisForm.reset();
          } else if (data.errors) {
              const errorMessages = Object.values(data.errors).flat(); // Tüm hata mesajlarını bir dizide topla
              displayError(thisForm, errorMessages.join('<br>')); // Hata mesajlarını <br> ile birleştirip göster
          } else {
              throw new Error(data.message);
          }
        })
        .catch(error => {
            displayError(thisForm, error.message);
        });

        function displayError(thisForm, error) {
          const loadingElement = thisForm.querySelector('.loading');
          const errorMessageElement = thisForm.querySelector('.error-message');
      
          loadingElement.classList.remove('d-block');
          errorMessageElement.innerHTML = error;
          errorMessageElement.classList.add('d-block');
      }
}

  // function displayError(thisForm, error) {

  //   thisForm.querySelector('.loading').classList.remove('d-block');
  //   thisForm.querySelector('.error-message').innerHTML = error;
  //   thisForm.querySelector('.error-message').classList.add('d-block');
  // }

})();
