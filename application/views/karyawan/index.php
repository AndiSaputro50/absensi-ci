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
</head>
<body class="bg-white-600">
<span
      class="absolute text-white text-4xl top-5 left-4 cursor-pointer"
      onclick="openSidebar()"
    >
      <i class="bi bi-filter-left px-2 bg-gray-900 rounded-md"></i>
    </span>
    <div
      class="sidebar fixed top-0 bottom-0 lg:left-0 p-2 w-[300px] overflow-y-auto text-center bg-gray-900"
    >
      <div class="text-gray-100 text-xl">
        <div class="p-2.5 mt-1 flex items-center">
          <i
            class="bi bi-x cursor-pointer ml-28 lg:hidden"
            onclick="openSidebar()"
          ></i>
        </div>
        <div class="my-2 bg-gray-600 h-[1px]"></div>
      </div>
      <div
        class="p-2.5 flex items-center rounded-md px-4 duration-300 cursor-pointer bg-gray-700 text-white"
      >
        <i class="bi bi-search text-sm"></i>
        <input
          type="text"
          placeholder="Search"
          class="text-[15px] ml-4 w-full bg-transparent focus:outline-none"
        />
      </div>
      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white"
      >
      <i class="bi bi-house-fill"></i>
        <span class="text-[15px] ml-4 text-gray-200 font-bold">Home</span>
      </div>
      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white"
      >
      <i class="bi bi-person-circle"></i>
        <span class="text-[15px] ml-4 text-gray-200 font-bold">Admin</span>
      </div>
      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white"
      >
      <i class="bi bi-person-fill"></i>
        <span class="text-[15px] ml-4 text-gray-200 font-bold">Karyawan</span>
      </div>

      <div
        class="p-2.5 mt-3 flex items-center rounded-md px-4 duration-300 cursor-pointer hover:bg-blue-600 text-white"
      >
        <i class="bi bi-box-arrow-in-right"></i>
        <span class="text-[15px] ml-4 text-gray-200 font-bold">Logout</span>
      </div>
    </div>

    

    <script type="text/javascript">
      function dropdown() {
        document.querySelector("#submenu").classList.toggle("hidden");
        document.querySelector("#arrow").classList.toggle("rotate-0");
      }
      dropdown();

      function openSidebar() {
        document.querySelector(".sidebar").classList.toggle("hidden");
      }
    </script>
</body>
</html>