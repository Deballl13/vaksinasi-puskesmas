function validateDaftar(laman = "daftar") {
    const form = document.getElementById("daftar");
    const invalid_feedback =
        document.getElementsByClassName("invalid-feedback");
    let valid = true;
    let length = 10;

    if (laman === "edit") {
        length = 8;
    }

    for (let i = 1; i <= length; i++) {
        if (i < 3) {
            if (form[i].value.trim() === "") {
                form[i].classList.add("border-danger");
                invalid_feedback[i - 1].style.display = "block";
                valid = false;
            } else {
                form[i].classList.remove("border-danger");
                invalid_feedback[i - 1].style.display = "none";
            }
        } else if (i === 3 || i === 4) {
            if (!form[3].checked && !form[4].checked) {
                form[i].classList.add("border-danger");
                invalid_feedback[2].style.display = "block";
                valid = false;
            } else {
                form[i].classList.remove("border-danger");
                invalid_feedback[2].style.display = "none";
            }
        } else {
            if (form[i].value.trim() === "") {
                if (form[i] === form[6]) {
                    invalid_feedback[i - 2].innerHTML = "Masukkan nomor hp!";
                }
                form[i].classList.add("border-danger");
                invalid_feedback[i - 2].style.display = "block";
                valid = false;
            } else if (
                form[i] === form[6] &&
                !form[i].value.match(/^[0]{1}[8]{1}[-\s\./0-9]*$/g)
            ) {
                invalid_feedback[i - 2].innerHTML = "Format nomor tidak sesuai";
            } else {
                form[i].classList.remove("border-danger");
                invalid_feedback[i - 2].style.display = "none";
            }
        }
    }

    return valid;
}
