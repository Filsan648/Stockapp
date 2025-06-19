<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard</title>

<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-row overflow-hidden">

<div>
    <aside class="">
        @yield('sidenave')
      </aside>
    </div>

  <div class=" bg-blue-50/95  w-full   overflow-y-auto">

    <aside class=" ">
        @yield('content')
      </aside>

  </div>

</body>
</html>
