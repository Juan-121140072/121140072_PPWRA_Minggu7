<!-- Juan Verrel Tanuwijaya, 121140072 -->

<?php
session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minggu7</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            margin-top: 10px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        select {
            width: calc(100% - 16px);
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
        }

        input {
            width: calc(100% - 16px);
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
            border: none;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .hasil {
            padding: 5px;
            border: 1px solid gray;
            border-radius: 10px;
            background-color: teal;
        }

        .hapus {
            background-color: red !important;
        }

        .hidden {
            display: none;
        }

        .menu-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 15px;
            padding: 30px;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        button {
            background-color: #c2fbd7;
            border-radius: 100px;
            box-shadow: rgba(44, 187, 99, .2) 0 -25px 18px -14px inset, rgba(44, 187, 99, .15) 0 1px 2px, rgba(44, 187, 99, .15) 0 2px 4px, rgba(44, 187, 99, .15) 0 4px 8px, rgba(44, 187, 99, .15) 0 8px 16px, rgba(44, 187, 99, .15) 0 16px 32px;
            color: green;
            cursor: pointer;
            display: inline-block;
            font-family: CerebriSans-Regular, -apple-system, system-ui, Roboto, sans-serif;
            padding: 7px 20px;
            text-align: center;
            text-decoration: none;
            transition: all 250ms;
            border: 0;
            font-size: 16px;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        button:hover {
            box-shadow: rgba(44, 187, 99, .35) 0 -25px 18px -14px inset, rgba(44, 187, 99, .25) 0 1px 2px, rgba(44, 187, 99, .25) 0 2px 4px, rgba(44, 187, 99, .25) 0 4px 8px, rgba(44, 187, 99, .25) 0 8px 16px, rgba(44, 187, 99, .25) 0 16px 32px;
            transform: scale(1.05) rotate(-1deg);
        }

        table {
            width: 100%; /* Set the width to 100% to fill the container */
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: gray;
            color: whitesmoke;
        }

        td {
            background-color: whitesmoke
        }

        .table-container {
            width: 50%;
            overflow: auto; /* Add the overflow property to enable scrolling */
            max-height: 400px; /* Set a maximum height to trigger scrolling */
            margin: 20px;
            margin-top: 5px;
        }

        .prodiFilter {
            width: 500px;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="menu-container">
        <h2 style="margin:0px; margin-bottom:15px;">Menu Data Mahasiswa</h2>
        <div style="display: flex; gap: 20px;">
            <button onclick="formTambah()">Tambah Data</button>
            <button onclick="formEdit()">Edit Data</button>
            <button onclick="formHapus()">Hapus Data</button>
        </div>
    </div>

    <form class="hidden tambah-data" action="tambahdata.php" method="post">
        <h2>Input Data</h2>
        <label for="nim">NIM:</label>
        <input type="text" name="nim" required>
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required>
        <label for="prodi">Program Studi:</label>
        <select name="prodi" id="prodi">
            <option disabled selected>-- Pilih Prodi --</option>
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Teknik Elektro">Teknik Elektro</option>
            <option value="Teknik Geomatika">Teknik Geomatika</option>
            <option value="Teknik Tubrut">Teknik Tubrut</option>
        </select>
        <input type="submit" value="Tambahkan">
    </form>

    <form class="hidden edit-data" action="editdata.php" method="post">
        <h2>Edit Data</h2>
        <label for="nim">NIM:</label>
        <input type="text" name="nim" required>
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required>
        <label for="prodi">Program Studi:</label>
        <select name="prodi" id="prodi">
            <option disabled selected>-- Pilih Prodi --</option>
            <option value="Teknik Informatika">Teknik Informatika</option>
            <option value="Teknik Elektro">Teknik Elektro</option>
            <option value="Teknik Geomatika">Teknik Geomatika</option>
            <option value="Teknik Tubrut">Teknik Tubrut</option>
        </select>
        <input type="submit" value="Edit">
    </form>

    <form class="hidden hapus-data" style="margin-bottom:50px;" action="hapusdata.php" method="get">
        <h2>Hapus Data</h2>
        <label for="del">Nim:</label>
        <input type="text" name="del" required>
        <input class="hapus" type="submit" value="Hapus">
    </form>

    <select class="prodiFilter" onchange="ambilData()">
        <option value="">-- Pilih Prodi --</option>
        <option value="Teknik Informatika">Teknik Informatika</option>
        <option value="Teknik Elektro">Teknik Elektro</option>
        <option value="Teknik Geomatika">Teknik Geomatika</option>
        <option value="Teknik Tubrut">Teknik Tubrut</option>
    </select>

    <div class="table-container">
    <table>
        <thead>
            <th>NIM</th>
            <th>Nama</th>
            <th>Program Studi</th>
        </thead>
        <tbody class="table-body">
        </tbody>
    </table>
    <div>

    <script>
        let formActiveNow;
        ambilData();

        function ambilData() {
            const prodiFilter = document.querySelector('.prodiFilter').value;

            const fetchUrl = prodiFilter ? `ambildata.php?prodi=${encodeURIComponent(prodiFilter)}` : 'ambildata.php';

            fetch(fetchUrl)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    displayData(data);
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        }

        function displayData(data) {
            const tableBody = document.querySelector('.table-body');
            tableBody.innerHTML = '';
            
            if(data.length!=0){
                data.forEach(row => {
                const tr = `<tr><td>${row.nim}</td><td>${row.nama}</td><td>${row.prodi}</td></tr>`
                tableBody.innerHTML+=tr;
            });
            }else{
                tableBody.innerHTML+=`<tr><td colspan="3">Data Tidak Ditemukan</td></tr>`
            }
            
        }

        function formTambah() {
            if (!formActiveNow) {
                document.querySelector(".tambah-data").classList.remove("hidden");
                formActiveNow = document.querySelector(".tambah-data");
            }
            else if (formActiveNow != document.querySelector(".tambah-data")) {
                document.querySelector(".tambah-data").classList.remove("hidden");
                formActiveNow.classList.add("hidden");
                formActiveNow = document.querySelector(".tambah-data");
            } else {
                formActiveNow.classList.add("hidden");
                formActiveNow = null;
            }
        }

        function formEdit() {
            if (!formActiveNow) {
                document.querySelector(".edit-data").classList.remove("hidden");
                formActiveNow = document.querySelector(".edit-data");
            }
            else if (formActiveNow != document.querySelector(".edit-data")) {
                document.querySelector(".edit-data").classList.remove("hidden");
                formActiveNow.classList.add("hidden");
                formActiveNow = document.querySelector(".edit-data");
            } else {
                formActiveNow.classList.add("hidden");
                formActiveNow = null;
            }
        }

        function formHapus() {
            if (!formActiveNow) {
                document.querySelector(".hapus-data").classList.remove("hidden");
                formActiveNow = document.querySelector(".hapus-data");
            }
            else if (formActiveNow != document.querySelector(".hapus-data")) {
                document.querySelector(".hapus-data").classList.remove("hidden");
                formActiveNow.classList.add("hidden");
                formActiveNow = document.querySelector(".hapus-data");
            } else {
                formActiveNow.classList.add("hidden");
                formActiveNow = null;
            }
        }
    </script>
</body>

</html>

<?php
if (isset($_SESSION["hasil1"]) || isset($_SESSION["hasil2"]) || isset($_SESSION["hasil3"])) {
    if (basename($_SERVER['PHP_SELF']) != $_SESSION["hasil1"] || basename($_SERVER['PHP_SELF']) != $_SESSION["hasil2"] || basename($_SERVER['PHP_SELF']) != $_SESSION["hasil3"]) {
        session_destroy();
    }
}
?>