const formCheckout = document.getElementById("checkout-form");
const TenKH = formCheckout.querySelector("input[name=TenKH]");
const phoneNumber = formCheckout.querySelector("input[name=DienThoai]");
const address = formCheckout.querySelector("input[name=DiaChi]");
const numberOfService = formCheckout.querySelector("input[name=SoLuong]");
const totalPrice = document.getElementById("total-price");
const onePrice = document.getElementById("ThanhTien");
const model = document.getElementById("model");
const closeNotifySucces = model.querySelector(".close-btn");
const submitCheckout = formCheckout.querySelector("input[type=submit]");


closeNotifySucces.addEventListener("click", function(){
    model.classList.remove("active");
})

formCheckout.addEventListener('submit', e => {
	e.preventDefault();
	
	checkInputs();
    if (checkInputs()){
        formCheckout.submit();
        // call ajax
        // const isSuccess = true;
        // if (isSuccess){
        //     model.classList.add("active");
        // } else {
        //     setErrorFor(submitCheckout, "Đăng kí thất bại");
        // }
    };
    
});

function checkInputs() {
	// trim to remove the whitespaces
	const nameValue = TenKH.value.trim();
	const phoneNumberValue = phoneNumber.value.trim();
	const addressValue = address.value.trim();
	const numberOfServiceValue = numberOfService.value;
	
	if(nameValue === '') {
		setErrorFor(TenKH, 'Vui lòng nhập tên');
	} else if (nameValue.length < 5){
        setErrorFor(TenKH, 'Tên phải có ít nhất 5 kí tự');
    } else {
		setSuccessFor(TenKH);
	}

    if (phoneNumberValue === ''){
        setErrorFor(phoneNumber, 'Vui lòng nhập số điện thoại');
    } else if (!isPhone(phoneNumberValue)){
        setErrorFor(phoneNumber, 'Số điện thoại không đúng');
    } else {
        setSuccessFor(phoneNumber);
    }

    if (addressValue === ""){
        setErrorFor(address, "Vui lòng nhập địa chỉ");
    } else {
        setSuccessFor(address);
    }

    if (numberOfServiceValue < 0){
        setErrorFor(numberOfService, "Vui lòng nhập số lượng");
    } else {
        setSuccessFor(numberOfService);
    }

    if (
        nameValue === '' ||
        nameValue.length < 5 ||
        phoneNumberValue === '' ||
        !isPhone(phoneNumberValue) ||
        addressValue === "" ||
        numberOfServiceValue < 0
    ){
        return false;
    } else {
        return true;
    }
	
}


// numberOfService.addEventListener("change", function(){
//     const total = this.value > 0 && this.value * parseFloat(onePrice.innerText);
//     totalPrice.innerText = toCurrency(total);
// })

function toCurrency(number) {
    if (number.toString().trim().length > 0) {
      if (number.toString() === '0') {
        return '0';
      }
      return Number(number).toFixed().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,');
    }
    return '';
  }

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small[class=error-msg]');
	formControl.className = 'form-control error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-control success';
}
	
function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

function isPhone(phoneNumber) {
    return /(84|0[3|5|7|8|9])+([0-9]{8})\b/.test(phoneNumber)
}

