<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard</title>

<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class=" font-serif ">
    <div>
    <aside class=" w-full pt-6">
        @yield('title')
      </aside>
    </div>
    <div class="flex flex-row overflow-hidden">
<div>
    <aside class=" w-1/5  fixed top-50% ">
        @yield('sidenave')
      </aside>
    </div>

  <div class="  w-full  overflow-y-auto  pl-24  ">

    <aside class="m-10   ">
        @yield('content')
      </aside>

  </div>
    </div>
</body>
</html>
