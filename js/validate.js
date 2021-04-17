  //check passwords

function isBlank(inputField)
{
    if (inputField.value=="")
    {
	     return true;
    }
    return false;
}

function makeRed(inputDiv){
	inputDiv.style.borderColor="#AA0000";
}

function makeClean(inputDiv){
	inputDiv.style.borderColor="#FFFFFF";
}

window.onload = function() {
    var mainForm = document.getElementById("mainForm");
    var requiredInputs = document.querySelectorAll(".required");


    var goToLogin = document.getElementById("goToLogin");
      if(goToLogin != null) {
        goToLogin.onclick = function() {
          document.getElementById("signup").style.display = "none";
          document.getElementById("login").style.display = "block"; 
      }
    }
    
    var goToSignup = document.getElementById("goToSignup");
    
    if(goToSignup != null) {
      goToSignup.onclick = function() {
          document.getElementById("login").style.display = "none";
          document.getElementById("signup").style.display = "block"; 
    }
  }
  if(mainForm != null) {
    mainForm.onsubmit = function(e)
    {
	     var requiredInputs = document.querySelectorAll(".required");
       var err = false;

	     for (var i=0; i < requiredInputs.length; i++)
       {
	        if( isBlank(requiredInputs[i]))
          {
		          err |= true;
		          makeRed(requiredInputs[i]);
	        }
	        else
          {
		          makeClean(requiredInputs[i]);
	        }
	    }
      if (err == true)
      {
        e.preventDefault();
      }
      else
      {
        console.log('checking match');
        checkPasswordMatch(e);
      }
    }
  }
}