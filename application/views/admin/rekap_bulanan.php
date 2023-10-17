<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="/dist/tailwind.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>
<style>
     body {
        margin: 0;
        padding-left:50vh;
        padding-right:20vh; 
        min-height: 100vh;
        /* background-color: #000000; */
    } 
</style>
<body>
<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-blue-50 dark:bg-blue-800">
      <ul class="space-y-2 font-medium">

         <li>
            <a href="<?php echo base_url('admin/rekap_harian')?>" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128z"/></svg>

               <span class="flex-1 ml-3 whitespace-nowrap">Rekap Harian</span>
            </a>
         </li>

         <li>
            <a href="<?php echo base_url('admin/rekap_mingguan')?>" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128z"/></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Rekap Mingguan</span>
            </a>
         </li>

         <li>
            <a href="<?php echo base_url('admin/rekap_bulanan')?>" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><path d="M0 64C0 28.7 28.7 0 64 0H224V128c0 17.7 14.3 32 32 32H384V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm384 64H256V0L384 128z"/></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Rekap Bulanan</span>
            </a>
         </li>

         <li>
            <a href="<?php echo base_url('absensi/login')?>" class="flex items-center p-3 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Log Out</span>
            </a>
         </li>
         <li><span id="jam"></span></li>
</aside>
<script type="text/javascript">
        window.onload = function() { jam(); }
       
        function jam() {
            var e = document.getElementById('jam'),
            d = new Date(), h, m, s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());
       
            e.innerHTML = h +':'+ m +':'+ s;
       
            setTimeout('jam()', 1000);
        }
       
        function set(e) {
            e = e < 10 ? '0'+ e : e;
            return e;
        }
    </script>

    <div class="relative min-h-screen md:flex" data-dev-hint="container">
        <main id="content" class="max-h-screen overflow-y-auto flex-1 p-6 lg:px-8">
            <div class="container mx-auto">
                <div class="grid grid-cols-1 px-2 md:grid-cols-3 rounded-t-lg py-2.5 bg-gray-700 text-white text-xl">
                    <div class="flex justify-center mb-2 md:justify-start md:pl-6">
                        REKAP BULANAN
                    </div>

                    <a href="<?php echo base_url('admin/export_bulan')?>"class="btn btn-secondary">Export <i class="fa-solid fa-file-arrow-down"></i> </a>
                    

                    <form action="<?php echo base_url('admin/rekap_bulanan')?>" method="post">
                    <select name="bulan" class="form-select" aria-label="Default select example">
                                 <option selected>Bulan</option>
                                 <option value="01">Januari</option>
                                 <option value="02">Februari</option>
                                 <option value="03">Maret</option>
                                 <option value="04">April</option>
                                 <option value="05">Mei</option>
                                 <option value="06">Juni</option>
                                 <option value="07">Juli</option>
                                 <option value="08">Agustus</option>
                                 <option value="09">September</option>
                                 <option value="10">Oktober</option>
                                 <option value="11">November</option>
                                 <option value="12">Desember</option>
                    </select>
                    <button class="btn btn-light" type="submit" name="submit">Submit</button>
                  </form>
                </div>
                <div class="overflow-x-auto w-full px-4 bg-white rounded-b-lg shadow">
                    <table class="my-4 w-full divide-y divide-gray-300 text-center">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-5 py-3 text-xs text-gray-500">NO</th>
                                <th class="px-5 py-3 text-xs text-gray-500">
                                    KEGIATAN
                                </th>
                                <th class="px-5 py-3 text-xs text-gray-500">TANGGAL</th>
                                <th class="px-5 py-3 text-xs text-gray-500">JAM MASUK</th>
                                <th class="px-5 py-3 text-xs text-gray-500">JAM PULANG</th>
                                <th class="px-5 py-3 text-xs text-gray-500">KETERANGAN IZIN</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">
                            <?php $no=0; foreach ($absensi as $rekap): $no++ ?>
                            <tr class="whitespace-nowrap">
                                <td class="px-5 py-3 text-sm text-gray-500"><?php echo $no ?></td>
                                <td class="px-5 py-3">
                                    <div class="text-sm text-gray-900">
                                        <?php echo $rekap->kegiatan; ?>
                                    </div>
                                </td>
                                <td class="px-5 py-3">
                                    <div class="text-sm text-gray-900">
                                        <?php echo $rekap->date; ?>
                                    </div>
                                </td>
                                <td class="px-5 py-3">
                                    <div class="text-sm text-gray-900">
                                        <?php echo $rekap->jam_masuk; ?>
                                    </div>
                                </td>
                                <td class="px-5 py-3">
                                    <div class="text-sm text-gray-900">
                                        <?php echo $rekap->jam_pulang; ?>
                                    </div>
                                </td>
                                <td class="px-5 py-3">
                                    <div class="text-sm text-gray-900">
                                        <?php echo $rekap->keterangan_izin; ?>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Add an event listener for the "change" event on the select element
        var selectElement = document.getElementById('bulan');
        var formElement = selectElement.form; // Get the parent form

        selectElement.addEventListener('change', function() {
            formElement.submit(); // Submit the form when the select element changes
        });
    });
    </script>
</body>
</html>