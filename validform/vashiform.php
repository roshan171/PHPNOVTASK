<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title></title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 	<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" rel="stylesheet"/>

 </head>
 <body>
 
 <section class="space-ptb overflow-hidden">
    <div class="container mt-5">
        <h2 class="text-center">Form</h2>
    <div class="row">
    <div class="col-md-12">
  
    
    <div class="col-md-12">
    <div class="p-6 bg-light h-100">
        
                           
      <form class="mt-6 row"name="Contact Email" method="post">
      <div class="mb-3 col-lg-12">
      <input type="text" class="form-control" id="contact-name" name="name" placeholder="First Name.."  onkeyup='validateName()'>
      <span class='error-message' id='name-error'></span>
      </div>
    
      <div class="mb-3 col-lg-12">
      <input type="text" class="form-control" id="contact-lastname" name="lastname" placeholder="Last Name.."  onkeyup='validateLname()'>
      <span class='error-message' id='lastname-error'></span>
      </div> 
            
      <div class="mb-3 col-12">
      <input type="email" class="form-control" id="contact-email"  name="email" placeholder="Enter Email" onkeyup='validateEmail()'>
      <span class='error-message' id='email-error'></span>
      </div>  
         
      <div class="mb-3 col-12 d-grid">
      <input type="tel" class="form-control" id="phone_number" name="phone" placeholder="Phone Number" onkeyup='validatePhone()'>
      <span class='error-message' id='phone-error'></span>
      </div>   

      <div class="mb-4 col-12">
      <textarea class="form-control" rows="5" id='contact-message'  name='message'  placeholder="Enter a brief message" onkeyup='validateMessage()'></textarea>
      <span class='error-message' id='message-error'></span>
      </div>
    
    <div class="mb-4 col-12">
    <div class="form-check ms-2">
    <input type="checkbox" class="form-check-input" name="checkbox" required id="flexCheckDefault">   
    <label class="form-check-label" for="flexCheckDefault">
           I agree to talk about my project with Alive Inc.
    </label>
    </div>
    </div>
    
    <div class="mb-0 col-12 d-grid">
    <input type="submit" name="submit" class="btn btn-primary btn-block" onclick='return validateForm()' > 
      <span class='error-message' id='submit-error'></span>
    </div>
    
   
    
         
    </form>
    </div>
    </div></div></div>
     <br>


      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    

     <script>
         function validateName() {

      var name = document.getElementById('contact-name').value;

      if(name.length == 0) {

        producePrompt('Please enter your name', 'name-error' , 'red')
        return false;

    }

    if (!name.match(/^[A-Za-z]{1}[A-Za-z]*$/)) {

        producePrompt('Enter Your First name.','name-error', 'red');
        return false;

    }

    producePrompt('Valid', 'name-error', 'green');
    return true;

}


         function validateLname() {

      var lastname = document.getElementById('contact-lastname').value;

      if(lastname.length == 0) {

        producePrompt('Please enter your last name', 'lastname-error' , 'red')
        return false;

    }

    if (!lastname.match(/^[A-Za-z]{1}[A-Za-z]*$/)) {

        producePrompt('Please enter your Last name.','lastname-error', 'red');
        return false;

    }

    producePrompt('Valid', 'lastname-error', 'green');
    return true;

}



function validatePhone() {

  var phone = document.getElementById('phone_number').value;

  if(phone.length == 0) {
      producePrompt('Phone number is required.', 'phone-error', 'red');
      return false;
  }

  if(phone.length != 10) {
      producePrompt('Error.', 'phone-error', 'red');
      return false;
  }

  if(!phone.match(/^[0-9]{10}$/)) {
      producePrompt('Only digits, please.' ,'phone-error', 'red');
      return false;
  }

  producePrompt('Valid', 'phone-error', 'green');
  return true;

}

function validateEmail () {

  var email = document.getElementById('contact-email').value;

  if(email.length == 0) {

    producePrompt('Email Invalid','email-error', 'red');
    return false;

}

if(!email.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)) {

    producePrompt('Email Invalid', 'email-error', 'red');
    return false;

}

producePrompt('Valid', 'email-error', 'green');
return true;

}

function validateMessage() {
  var message = document.getElementById('contact-message').value;
  var required = 30;
  var left = required - message.length;

  if (left > 0) {
    producePrompt(left + ' more characters required','message-error','red');
    return false;
}

producePrompt('Valid', 'message-error', 'green');
return true;

}

function validateForm() {
  if (!validateName() || !validateLname() || !validatePhone() || !validateEmail() || !validateMessage()) {
    jsShow('submit-error');
    producePrompt('Please fix errors to submit.', 'submit-error', 'red');
    setTimeout(function(){jsHide('submit-error');}, 2000);
    return false;
}
else {

}
}

function jsShow(id) {
  document.getElementById(id).style.display = 'block';
}

function jsHide(id) {
  document.getElementById(id).style.display = 'none';
}


function producePrompt(message, promptLocation, color) {

  document.getElementById(promptLocation).innerHTML = message;
  document.getElementById(promptLocation).style.color = color;

}
    </script>

     </body>
 </html>