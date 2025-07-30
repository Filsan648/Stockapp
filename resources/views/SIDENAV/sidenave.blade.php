<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .active-link {
      background-color: #cddef74d; /* blue-500 */

    }

  </style>
</head>
<body class="">

<div class="h-screen w-64   shadow-sm flex flex-col  justify-center  ">
    <div class="p-6 ">

    </div>
  <!-- User Info -->
  <div class=" ">


    <!-- Navigation -->
    <nav id="sidebarMenu" class="px-4 py-6 space-y-3 text-sm text-gray-700 bg-violet-700 w-1/3 mt-2  rounded-3xl   ">
      <a href="{{ route('dashboard') }}"
         class="flex items-center gap-3 rounded-lg px-3 py-2 transition
         {{ request()->routeIs('dashboard') ? 'active-link' : '' }}">
        <img src="image/icons/applications.png" alt="Dashboard" width="15" height="15"  class="text-white">

      </a>

      <a href="{{ route('materiel') }}"
         class="flex items-center gap-3 rounded-lg px-3 py-2 transition
         {{ request()->routeIs('materiel') ? 'active-link' : '' }}">
        <img src="image/icons/apps-add.svg" class=" invert" alt="Matériels" width="15" height="15">

      </a>

      <a href="{{ route('stock') }}"
         class="flex items-center gap-3 rounded-lg px-3 py-2 transition
         {{ request()->routeIs('stock') ? 'active-link' : '' }}">
        <img src="image/icons/plus.svg" class=" invert" alt="Mouvements" width="15" height="15">

      </a>
   <a href="{{ route('commande') }}"
         class="flex items-center gap-3 rounded-lg px-3 py-2 transition
         {{ request()->routeIs('commande') ? 'active-link' : '' }}">
        <img src="image/icons/historique.png"  alt="commande" width="15" height="15">

      </a>
      <a href="{{ route('HistoriqueStock') }}"
         class="flex items-center gap-3 rounded-lg px-3 py-2 transition
         {{ request()->routeIs('HistoriqueStock') ? 'active-link' : '' }}">
        <img src="image/icons/time-past.svg" class=" invert" alt="Historique de stock" width="15" height="15">

      </a>
 <a href="{{ route('employer') }}"
         class="flex items-center gap-3 rounded-lg px-3 py-2 transition
         {{ request()->routeIs('employer') ? 'active-link' : '' }}">
        <img src="image/icons/mallette.png" alt="Employés" width="15" height="15">

      </a>
      <a href="{{ route('users') }}"
         class="flex items-center gap-3 rounded-lg px-3 py-2 transition
         {{ request()->routeIs('users') ? 'active-link' : '' }}">
        <img src="image/icons/user-add.svg" class=" invert" alt="user" width="15" height="15">

      </a>
 <a href="{{ route('stock') }}"
         class="flex items-center gap-3 rounded-lg px-3 py-2 transition
         {{ request()->routeIs('stock') ? 'active-link' : '' }}">
        <img src="image/icons/cloche.png"   alt="Paramètres" width="15" height="15">

      </a>
      <a href="{{ route('stock') }}"
         class="flex items-center gap-3 rounded-lg px-3 py-2 transition
         {{ request()->routeIs('stock') ? 'active-link' : '' }}">
        <img src="image/icons/settings.svg"  class=" invert" alt="Paramètres" width="15" height="15">

      </a>


      <div class="">
    <a href="#logout" class="flex items-center gap-3 text-red-500 hover:bg-red-150 rounded-lg px-3 py-2 transition">
      <img src="image/icons/user-logout.svg" class=" invert"  alt="Déconnexion" width="15" height="15">

    </a>
  </div>
    </nav>
  </div>



</div>

</body>
</html>
