document.addEventListener("DOMContentLoaded", () => {

    // Ambil elemen input dari form portofolio Anda
    const form = document.getElementById("contactForm");

    const nama = document.getElementById("nama");
    const email = document.getElementById("email");
    const pesan = document.getElementById("pesan");

    // Elemen pesan error di bawah input
    const errorNama = document.getElementById("error-nama");
    const errorEmail = document.getElementById("error-email");
    const errorPesan = document.getElementById("error-pesan");

    // Elemen pesan sukses
    const successMessage = document.getElementById("successMessage");

    // Event ketika tombol submit ditekan
    form.addEventListener("submit", function (e) {
        e.preventDefault(); // Mencegah reload halaman

        let isValid = true;

        // Reset tampilan sebelumnya
        successMessage.style.display = "none";
        successMessage.textContent = "";

        [nama, email, pesan].forEach(input => {
            input.style.border = "1px solid #ccc"; // reset border
        });

        errorNama.textContent = "";
        errorEmail.textContent = "";
        errorPesan.textContent = "";

        // Validasi Nama
        if (nama.value.trim() === "") {
            errorNama.textContent = "Nama wajib diisi.";
            nama.style.border = "2px solid red";
            isValid = false;
        }

        // Validasi Email
        if (email.value.trim() === "") {
            errorEmail.textContent = "Email wajib diisi.";
            email.style.border = "2px solid red";
            isValid = false;
        }

        // Validasi Pesan
        if (pesan.value.trim() === "") {
            errorPesan.textContent = "Pesan wajib diisi.";
            pesan.style.border = "2px solid red";
            isValid = false;
        }

        // Jika ada error → hentikan proses
        if (!isValid) return;

        // Jika sukses → tampilkan pesan sukses
        successMessage.textContent = "Pesan berhasil dikirim!";
        successMessage.style.color = "green";
        successMessage.style.display = "block";

        // Reset form setelah submit
        form.reset();
    });
});
