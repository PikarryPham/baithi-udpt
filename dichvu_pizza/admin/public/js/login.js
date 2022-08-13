const formLogin = document.getElementById("form-login");
const phoneNumber = formLogin.querySelector("input[name=TenTK]");
const password =  formLogin.querySelector("input[name=MatKhau]");
const rePassword = formLogin.querySelector("input[name=re-password]");

console.log(rePassword)

formLogin.addEventListener('submit', e => {
	e.preventDefault();
	
	checkInputs();
    if (checkInputs()){
        formLogin.submit();
    };
    
});

function checkInputs(){
    const phoneNumberValue = phoneNumber.value.trim();
    const passwordValue = password.value.trim();
    const rePasswordValue = rePassword && rePassword.value.trim();
    
    if (phoneNumberValue === ''){
        setErrorFor(phoneNumber, 'Vui lòng nhập tên tài khoản');
    } else {
        setSuccessFor(phoneNumber);
    }

    if (passwordValue === ""){
        setErrorFor(password, "Vui lòng nhập mật khẩu")
    } else {
        setSuccessFor(password);
    }

    if (rePasswordValue === ""){
        setErrorFor(rePassword, "Vui lòng nhập mật khẩu")
    } else if(!(rePasswordValue === passwordValue)){
        setErrorFor(rePassword, "Mật khẩu không khớp")
    } else {
        setSuccessFor(rePassword);
    }

    if(
        phoneNumberValue === '' ||
        !isPhone(phoneNumberValue) ||
        passwordValue === "" ||
        rePasswordValue === "" ||
        !(rePasswordValue === passwordValue)
    ){
        return false;
    } else {
        return true;
    }
}

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-control error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-control success';
}