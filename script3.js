document.addEventListener("DOMContentLoaded", function () {
    const namaInput = document.getElementById("nama");
    const noTelpInput = document.getElementById("noTelp");
    const alamatInput = document.getElementById("alamat");
    const kelasInput = document.getElementById("kelas");
    const editIndexInput = document.getElementById("editIndex");
    const dataList = document.getElementById("dataList");

    let dataPendaftar = [];

    window.tambahData = function (event) {
        event.preventDefault(); // Mencegah form direfresh

        let nama = namaInput.value.trim();
        let noTelp = noTelpInput.value.trim();
        let alamat = alamatInput.value.trim();
        let kelas = kelasInput.value;

        // Validasi Nama
        let polaNama = /^[a-zA-Z' ]+$/;
        if (!polaNama.test(nama)) {
            alert("Nama hanya boleh berisi huruf dan tanda petik satu (')!");
            return false;
        }

        let pendaftar = { nama, noTelp, alamat, kelas };

        let editIndex = editIndexInput.value;
        if (editIndex !== "") {
            dataPendaftar[editIndex] = pendaftar;
        } else {
            dataPendaftar.push(pendaftar);
        }

        renderTable();
        resetForm();
    };

    function renderTable() {
        dataList.innerHTML = "";
        dataPendaftar.forEach((pendaftar, index) => {
            let row = document.createElement("tr");
            row.innerHTML = `
                <td>${pendaftar.nama}</td>
                <td>${pendaftar.noTelp}</td>
                <td>${pendaftar.alamat}</td>
                <td>${pendaftar.kelas}</td>
                <td>
                    <button onclick="editData(${index})">Edit</button>
                    <button onclick="hapusData(${index})">Hapus</button>
                </td>
            `;
            dataList.appendChild(row);
        });
    }

    window.editData = function (index) {
        let pendaftar = dataPendaftar[index];
        namaInput.value = pendaftar.nama;
        noTelpInput.value = pendaftar.noTelp;
        alamatInput.value = pendaftar.alamat;
        kelasInput.value = pendaftar.kelas;
        editIndexInput.value = index;
    };

    window.hapusData = function (index) {
        dataPendaftar.splice(index, 1);
        renderTable();
    };

    function resetForm() {
        document.getElementById("formPendaftaran").reset();
        editIndexInput.value = "";
    }
});
