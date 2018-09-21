

function validate()
{
    var flag = true;
    var email = document.getElementById('email').value;
    var password = document.getElementById('pass').value;
    console.log(email);
    var reg_email = /^([A-Za-z0-9_\-.])+@?(deerwalk)+.?(edu)+.?(np)$/;
    var reg_pass = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/;
    if(email.match(reg_email))    {
    }else{
        alert("Enter Valid Email!!!");
        flag = false;
    }

    if(password.match(reg_pass)){

    }else{
        flag = false;
        alert("Enter Valid Password!!!");
    }

    return flag;

}

