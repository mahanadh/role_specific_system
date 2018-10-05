

function validate()
{
    var flag = true;
    var email = document.getElementById('email').value;
    console.log(email);
    var reg_email = /^([A-Za-z0-9_\-.])+@?(deerwalk)+.?(edu)+.?(np)$/;

    if(email.match(reg_email))    {
    }else{
        alert("Enter Valid Email!!!");
        flag = false;
    }

    return flag;

}

