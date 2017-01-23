
    function checkform(theform){
        var why = "";

        if(theform.txtInput.value == ""){
            why += "Bezpečnostní kód nesmí být prázdný!\n";
        }
        if(theform.txtInput.value != ""){
            if(ValidCaptcha(theform.txtInput.value) == false){
                why += "Bezpečnostní kód není správný!\n";
            }
        }
        if(why != ""){
            alert(why);
            return false;
        }
    }

//Generates the captcha function
var a = Math.ceil(Math.random() * 9)+ '';
var b = Math.ceil(Math.random() * 9)+ '';
var c = Math.ceil(Math.random() * 9)+ '';
var d = Math.ceil(Math.random() * 9)+ '';
var e = Math.ceil(Math.random() * 9)+ '';

var code = a + b + c + d + e;
document.getElementById("txtCaptcha").value = code;
document.getElementById("txtCaptchaDiv").innerHTML = code;

// Validate the Entered input aganist the generated security code function
function ValidCaptcha(){
    var str1 = removeSpaces(document.getElementById('txtCaptcha').value);
    var str2 = removeSpaces(document.getElementById('txtInput').value);
    if (str1 == str2){
        return true;
    }else{
        return false;
    }
}

// Remove the spaces from the entered and generated code
function removeSpaces(string){
    return string.split(' ').join('');
}
