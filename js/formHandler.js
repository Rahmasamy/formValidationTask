
console.log("dmak;mnck,")
function validateMobile(mobile) {
    const mobileRegex = /^[0-9]{5,20}$/;
    if (!mobileRegex.test(mobile)) {
        alert('Invalid Mobile Number. It should be 5 to 20 digits long and contain only numbers.');
        return false;
    }
    return true;
}

function validateEmail(email) {
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailRegex.test(email)) {
        alert('Invalid Email Address');
        return false;
    }
    return true;
}

function openXMLHTTPRequest(formData) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'http://127.0.0.1:5500/ShowValidationdata.php', true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            console.log(xhr.responseText); 
        } else {
            console.error('An error occurred!');
        }
    };
    xhr.send(formData);
}

function prepareDataToPost(mobile, email) {
    const formData = new FormData();
    formData.append('mobile', mobile);
    formData.append('email', email);
    openXMLHTTPRequest(formData);
}

document.getElementById('formvaidation').addEventListener('submit', (e) => {
    e.preventDefault();
    const email = document.getElementById('email').value;
    const mobile = document.getElementById('mobile').value;
   
   
      
    const isEmailValid = validateEmail(email);
    const isMobileValid = validateMobile(mobile);

    
    if (isEmailValid && isMobileValid) {
        prepareDataToPost(mobile, email);
    }
});
