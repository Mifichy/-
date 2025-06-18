const loginInput = document.getElementById("login");
const passwordInput = document.getElementById("password");
const loginError = document.getElementById("loginError");
const passError = document.getElementById("passwordError");
const nameInput = document.getElementById("name");
const regBtn = document.getElementById("regbtn");

const validateLogin = () =>{
    const login = loginInput.value.trim();
    if (login.length < 3 || login.length > 20){
        loginError.textContent ="Логин должен быть от 3 до 20 символов";
        return false;
    }
    else{
        loginError.textContent ="";
        return true;
    }
}
const validatePassword = () =>{
    const pass = passwordInput.value.trim();
    if (pass.length < 6 ){
        passError.textContent ="Пароль должен быть не менее 6 символов";
        return false;
    }
    else{
        passError.textContent ="";
        return true;
    }
}

const validateForm=()=>{
    const isLoginValid = validateLogin();
    const isPassValid = validatePassword();
    const nameValid = nameInput.value.trim() !=="";

    if(isLoginValid && isPassValid && nameValid){
        regBtn.disabled= false;
    }
    else{
        regBtn.disabled= true;
    }
}

loginInput.addEventListener('input',validateForm);
passwordInput.addEventListener('input',validateForm);
nameInput.addEventListener('input',validateForm);
