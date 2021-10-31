const form = document.getElementById("form_status");
const input = document.getElementById("inputStatus");
const btnSetuju = document.getElementById("btnSetuju");
const btnTolak = document.getElementById("btnTolak");
const btnSelesai = document.getElementById("btnSelesai");
const btnBatal = document.getElementById("btnBatal");

if (btnSetuju !== null && btnTolak !== null) {
    btnSetuju.onclick = () => {
        input.value = 1;
    };
    btnTolak.onclick = () => {
        input.value = 3;
    };
} else if (btnSelesai !== null && btnBatal !== null) {
    btnSelesai.onclick = () => {
        input.value = 2;
    };
    btnBatal.onclick = () => {
        input.value = 4;
    };
}
