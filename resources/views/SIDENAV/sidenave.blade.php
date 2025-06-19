<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .active-link {
      background-color: #3b82f6; /* blue-500 */
      color: white;
    }
    .active-link img {
      filter: brightness(0) invert(1); /* rend les icônes blanches */
    }
  </style>
</head>
<body class="bg-gray-50">

<div class="h-screen w-64 bg-white border-r border-gray-200 shadow-sm flex flex-col justify-between">
  <!-- User Info -->
  <div>
    <div class="p-6 border-b border-gray-100">
      <div class="text-center">
        <h2 class="text-xl font-semibold text-gray-800">Nom de l’utilisateur</h2>
        <p class="text-sm text-gray-500">Administrateur</p>
      </div>
    </div>

    <!-- Navigation -->
    <nav id="sidebarMenu" class="px-4 py-6 space-y-3 text-gray-700 text-base">
      <a href="{{ route('dashboard') }}"
         class="flex items-center gap-3 rounded-lg px-3 py-2 transition hover:bg-blue-100
         {{ request()->routeIs('dashboard') ? 'active-link' : '' }}">
        <img src="image/icons/applications.svg" alt="Dashboard" width="20" height="20">
        <span>Dashboard</span>
      </a>

      <a href="{{ route('materiel') }}"
         class="flex items-center gap-3 rounded-lg px-3 py-2 transition hover:bg-blue-100
         {{ request()->routeIs('materiel') ? 'active-link' : '' }}">
        <img src="image/icons/apps-add.svg" alt="Matériels" width="20" height="20">
        <span>Matériels</span>
      </a>

      <a href="{{ route('stock') }}"
         class="flex items-center gap-3 rounded-lg px-3 py-2 transition hover:bg-blue-100
         {{ request()->routeIs('stock') ? 'active-link' : '' }}">
        <img src="image/icons/plus.svg" alt="Mouvements" width="20" height="20">
        <span>Stock</span>
      </a>

      <a href="{{ route('HistoriqueStock') }}"
         class="flex items-center gap-3 rounded-lg px-3 py-2 transition hover:bg-blue-100
         {{ request()->routeIs('HistoriqueStock') ? 'active-link' : '' }}">
        <img src="image/icons/time-past.svg" alt="Historique de stock" width="20" height="20">
        <span>Historique de stock</span>
      </a>

      <a href="{{ route('employer') }}"
         class="flex items-center gap-3 rounded-lg px-3 py-2 transition hover:bg-blue-100
         {{ request()->routeIs('employer') ? 'active-link' : '' }}">
        <img src="image/icons/user-add.svg" alt="Employés" width="20" height="20">
        <span>Employés</span>
      </a>

      <a href="{{ route('stock') }}"
         class="flex items-center gap-3 rounded-lg px-3 py-2 transition hover:bg-blue-100
         {{ request()->routeIs('stock') ? 'active-link' : '' }}">
        <img src="image/icons/settings.svg" alt="Paramètres" width="20" height="20">
        <span>Paramètres</span>
      </a>
    </nav>
  </div>

  <!-- Logout -->
  <div class="px-4 py-6 border-t border-gray-100">
    <a href="#logout" class="flex items-center gap-3 text-red-500 hover:bg-red-100 rounded-lg px-3 py-2 transition">
      <img src="image/icons/user-logout.svg" alt="Déconnexion" width="20" height="20">
      <span>Se déconnecter</span>
    </a>
  </div>
</div>

</body>
</html>
