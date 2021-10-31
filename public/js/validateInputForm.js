function validateDaftar(laman = "daftar", user = "admin") {
    const form = document.getElementById("daftar");
    const invalid_feedback =
        document.getElementsByClassName("invalid-feedback");
    let valid = true;
    let start = 1;
    let length = 10;

    if (laman === "edit") {
        start = 2;
        length = 9;
    }

    for (let i = start; i <= length; i++) {
        if (i < start + 2) {
            if (form[i].value.trim() === "") {
                form[i].classList.add("border-danger");
                invalid_feedback[i - start].style.display = "block";
                valid = false;
            } else {
                form[i].classList.remove("border-danger");
                invalid_feedback[i - start].style.display = "none";
            }
        } else if (i === start + 2 || i === start + 3) {
            if (!form[start + 2].checked && !form[start + 3].checked) {
                form[i].classList.add("border-danger");
                invalid_feedback[start + 1].style.display = "block";
                valid = false;
            } else {
                form[i].classList.remove("border-danger");
                invalid_feedback[start + 1].style.display = "none";
            }
        } else {
            if (user === "admin" && i === start + 6) {
                continue;
            }

            if (form[i].value.trim() === "") {
                if (form[i] === form[start + 5]) {
                    invalid_feedback[i - (start + 1)].innerHTML =
                        "Masukkan nomor hp!";
                }
                form[i].classList.add("border-danger");
                invalid_feedback[i - (start + 1)].style.display = "block";
                valid = false;
            } else if (
                form[i] === form[start + 5] &&
                !form[start + 5].value.match(/^[0]{1}[8]{1}[-\s\./0-9]*$/g)
            ) {
                invalid_feedback[i - (start + 1)].innerHTML =
                    "Format nomor tidak sesuai";
                form[i].classList.add("border-danger");
                invalid_feedback[i - (start + 1)].style.display = "block";
                valid = false;
            } else {
                form[i].classList.remove("border-danger");
                invalid_feedback[i - (start + 1)].style.display = "none";
            }
        }
    }

    return valid;
}

function validateStok() {
    const form = document.getElementById("tambahStok");
    const invalid_feedback =
        document.getElementsByClassName("invalid-feedback");
    let valid = true;

    for (let i = 1; i <= 4; i++) {
        if (form[i].value.trim() === "") {
            form[i].classList.add("border-danger");
            invalid_feedback[i - 1].style.display = "block";
            valid = false;
        } else {
            form[i].classList.remove("border-danger");
            invalid_feedback[i - 1].style.display = "none";
        }

        if (form[i] === form[3] && form[i].value.trim() === "") {
            invalid_feedback[i - 1].innerHTML = "Masukkan jumlah vaksin!";
        } else if (form[i] === form[3] && form[i].value.trim() === "0") {
            invalid_feedback[i - 1].innerHTML = "Jumlah vaksin besar dari 0!";
            form[i].classList.add("border-danger");
            invalid_feedback[i - 1].style.display = "block";
            valid = false;
        }
    }

    return valid;
}
