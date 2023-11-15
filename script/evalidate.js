submitBtn.addEventListener("click", async (e) => {
    e.preventDefault();
    let username = document.getElementById("username").value;
    let email = document.getElementById("useremail").value;
    let password = document.getElementById("userpassword").value;
    resultCont.innerHTML = `<img width="123" src="../img/loading.svg" alt="loading svg">`
    let key = "ema_live_gJVxfFpD3BE2H6E7TKWflkqtJNIStW6OmJYo8W8t";
    let url = `https://api.emailvalidation.io/v1/info?apikey=${key}&email=${email}`;
    let res = await fetch(url);
    result = await res.json();
    for (key of Object.keys(result)) {
        if (result[key] !== "" && result[key] !== " ") {
            if (result.message == "Validation error") {
                console.log("invalid");
                resultCont.innerHTML = `<h1 style="color: red;">${email} INVALID FORMAT!</h1>`;
            }
            else if (result.smtp_check == false || result.state == "undeliverable") {
                console.log("invalid");
                resultCont.innerHTML = `<h1 style="color: red;">${email} is an INVALID email!</h1>`;
            }
            else {
                resultCont.innerHTML = "";
                document.getElementById("userName").value = username;
                document.getElementById("userEmail").value = email;
                document.getElementById("userPassword").value = password;
                document.querySelector("#registerForm").submit();
            }
        }
    }
});