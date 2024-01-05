// script.js
function showForm() {
    var selectedGender = document.querySelector(
        'input[name="gender"]:checked'
    ).value;
    var lakiForm = document.getElementById("lakiForm");
    var perempuanForm = document.getElementById("perempuanForm");

    // Semua formulir disembunyikan
    lakiForm.classList.add("hidden");
    perempuanForm.classList.add("hidden");

    // Menampilkan formulir yang sesuai dengan jenis kelamin yang dipilih
    if (selectedGender === "Male") {
        lakiForm.classList.remove("hidden");
    } else if (selectedGender === "Female") {
        perempuanForm.classList.remove("hidden");
    }
}

function showfamilyForm() {
    var selectedStatus = document.querySelector(
        'input[name="status"]:checked'
    ).value;
    var family1Form = document.getElementById("family1Form");
    var family2Form = document.getElementById("family2Form");

    // Semua formulir disembunyikan
    family1Form.classList.add("hidden");
    family2Form.classList.add("hidden");

    // Menampilkan formulir yang sesuai dengan jenis kelamin yang dipilih
    if (selectedStatus === "Married") {
        family1Form.classList.remove("hidden");
    } else if (selectedStatus === "Single") {
        family2Form.classList.remove("hidden");
    }
}
function showfamily2Form() {
    var selectedStatus = document.querySelector(
        'input[name="status"]:checked'
    ).value;
    var family1Form = document.getElementById("family1fForm");
    var family2Form = document.getElementById("family2fForm");

    // Semua formulir disembunyikan
    family1Form.classList.add("hidden");
    family2Form.classList.add("hidden");

    // Menampilkan formulir yang sesuai dengan jenis kelamin yang dipilih
    if (selectedStatus === "married") {
        family1Form.classList.remove("hidden");
    } else if (selectedStatus === "single") {
        family2Form.classList.remove("hidden");
    }
}

function toggleInput(inputId) {
    var inputElement = document.getElementById(inputId);

    if (inputElement.classList.contains("hidden")) {
        inputElement.classList.remove("hidden");
    } else {
        inputElement.classList.add("hidden");
    }
}

function toggleInput2(inputId) {
    var inputElement = document.getElementById(inputId);

    if (inputElement.classList.contains("hidden")) {
        inputElement.classList.remove("hidden");
    } else {
        inputElement.classList.add("hidden");
    }
}

function checkForm() {
    // Ambil nilai dari setiap input yang diperlukan
    const gender = document.querySelector('input[name="gender"]:checked');
    const status = document.querySelector('input[name="status"]:checked');
    const totalAssets = document.getElementById("harta").value.trim();

    // Aktifkan tombol Calculate jika ketiga input telah diisi, nonaktifkan jika belum
    const calculateButton = document.getElementById("calculateButton");
    if (gender && status && totalAssets !== "") {
        calculateButton.disabled = false;
    } else {
        calculateButton.disabled = true;
    }
}

// Tambahkan event listener untuk memeriksa setiap kali ada perubahan pada input
const formInputs = document.querySelectorAll(
    'input[type="text"], input[type="radio"]'
);
formInputs.forEach((input) => {
    input.addEventListener("input", checkForm);
});
