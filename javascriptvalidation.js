function validationForm(event) {
    event.preventDefault();
    let name = document.getElementById("name").value;
    let mobile = document.getElementById("mobile").value;
    let email = document.getElementById("email").value;
   
    let namePattern = /^[a-zA-Z\s]{3,}$/; // Name must be at least 3 letters, only alphabets & spaces
    let emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    let mobilePattern = /^[0-9]{10}$/; // Accepts only 10-digit numbers
    let passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
     
    if(!name.match(namePattern)) {
        alert("❌ Name must contain only letters and be at least 3 characters long!");
        return false;
     }  
     if(!mobile.match(mobilePattern)) {
        alert("❌ Enter a valid 10-digit mobile number!");
        return false;
     } 
     if(!email.match(emailPattern)) {
        alert("❌ Enter a valid email address!");
        return false;
     }
     alert("✅ Form submitted successfully!");
     document.getElementById("userForm").submit;

}