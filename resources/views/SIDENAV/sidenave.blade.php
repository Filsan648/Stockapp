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
<body class="bg-gray-50">

<div class="h-screen w-64 bg-white border-r border-gray-150 shadow-sm flex flex-col justify-between">
  <!-- User Info -->
  <div>
    <div class="p-6 border-b border-gray-150">
      <div class="text-center">
        <h2 class="text-xl font-semibold text-gray-800">Nom de l’utilisateur</h2>
        <p class="text-sm text-gray-500">Administrateur</p>
      </div>
    </div>

    <!-- Navigation -->
    <nav id="sidebarMenu" class="px-4 py-6 space-y-3 text-sm text-gray-700 ">
      <a href="{{ route('dashboard') }}"
         class="flex items-center gap-3 rounded-lg px-3 py-2 transition
         {{ request()->routeIs('dashboard') ? 'active-link' : '' }}">
        <img src="image/icons/applications.svg" alt="Dashboard" width="15" height="15">
        <span>Dashboard</span>
      </a>

      <a href="{{ route('materiel') }}"
         class="flex items-center gap-3 rounded-lg px-3 py-2 transition
         {{ request()->routeIs('materiel') ? 'active-link' : '' }}">
        <img src="image/icons/apps-add.svg" alt="Matériels" width="15" height="15">
        <span>Matériels</span>
      </a>

      <a href="{{ route('stock') }}"
         class="flex items-center gap-3 rounded-lg px-3 py-2 transition
         {{ request()->routeIs('stock') ? 'active-link' : '' }}">
        <img src="image/icons/plus.svg" alt="Mouvements" width="15" height="15">
        <span>Stock</span>
      </a>

      <a href="{{ route('HistoriqueStock') }}"
         class="flex items-center gap-3 rounded-lg px-3 py-2 transition
         {{ request()->routeIs('HistoriqueStock') ? 'active-link' : '' }}">
        <img src="image/icons/time-past.svg" alt="Historique de stock" width="15" height="15">
        <span>Historique de stock</span>
      </a>

      <a href="{{ route('employer') }}"
         class="flex items-center gap-3 rounded-lg px-3 py-2 transition
         {{ request()->routeIs('employer') ? 'active-link' : '' }}">
        <img src="image/icons/user-add.svg" alt="Employés" width="15" height="15">
        <span>Employés</span>
      </a>

      <a href="{{ route('stock') }}"
         class="flex items-center gap-3 rounded-lg px-3 py-2 transition
         {{ request()->routeIs('stock') ? 'active-link' : '' }}">
        <img src="image/icons/settings.svg" alt="Paramètres" width="15" height="15">
        <span>Paramètres</span>
      </a>
    </nav>
  </div>

  <!-- Logout -->
  <div class="px-4 py-6 border-t border-gray-150">
    <a href="#logout" class="flex items-center gap-3 text-red-500 hover:bg-red-150 rounded-lg px-3 py-2 transition">
      <img src="image/icons/user-logout.svg" alt="Déconnexion" width="15" height="15">
      <span>Se déconnecter</span>
    </a>
  </div>
</div>

</body>
</html>
