

//validate full name
 function validateName(){ 
     var numbers = /[0-9]+/g;
     var letters = /^[A-Za-z]+$/;
       if(document.querySelector("#my_form").full_name.value.match(numbers)){ 
         
         document.getElementById('errors').innerHTML="*Full name must have alphabet character only*";
         return false;
       } 
          
       else{
   
            return true;
           }
       
     
     }
   
   //validate email
      function validateEmail() {let email=document.querySelector("#my_form").email.value;
       let mail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
       let result1 = email.match(mail);
       if(!result1){  
            document.getElementById('errors1').innerHTML="*Please enter valid email*";
            return false;
       }
       return true;
     }
   //validate password
   function validatePassword(){
     if(document.querySelector("#my_form").password.value.length<3){  
            document.getElementById('errors2').innerHTML="*Please enter a strong pass word*";
            return false;
       }
       return true;
     }
       function validate(){
        {
   if(!validateName())
   return false;
   if(!validateEmail())
   return false;
   if(!validatePassword())
   return false ;
   }
   return true;
       } 
       // another try
let username=document.querySelector("#my_form").full_name.value;
let email= document.querySelector("my_form").email.value;
let password=document.querySelector("#my_form").password.value
let patt = /^[ a-z A-Z]+$/;
let result = username.match(patt);
//validate password
   function validatePassword(){
     if(document.querySelector("#my_form").password.value.length<3){  
            document.getElementById('errors2').innerHTML="*Please enter a strong pass word*";
            return false;
       }
       return true;
     }
       function validate(){
        {
   if(!validateName())
   return false;
   if(!validateEmail())
   return false;
   if(!validatePassword())
   return false ;
   }
   return true;
       } 