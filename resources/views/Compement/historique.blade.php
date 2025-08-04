<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: {
              600: '#2563eb',
              700: '#1d4ed8',
            },
            secondary: {
              100: '#e0f2fe',
              200: '#bae6fd',
            },
            entree: {
              100: '#f0fdf4',
              500: '#22c55e',
            },
            sortie: {
              100: '#fef2f2',
              500: '#ef4444',
            }
          },
          animation: {
            'fade-in': 'fadeIn 0.5s ease-in-out',
          },
          keyframes: {
            fadeIn: {
              '0%': { opacity: '0', transform: 'translateY(10px)' },
              '100%': { opacity: '1', transform: 'translateY(0)' },
            },
          },
        }
      }
    }
  </script>
  <title>Gestion de Matériel</title>
</head>
<body class="bg-gray-50">
  <div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold  mb-8 text-center animate-fade-in">Gestion des Mouvements de Matériel</h1>

    <div class="bg-white rounded-lg shadow-md overflow-hidden border border-black animate-fade-in">
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="">
            <tr>
<th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider relative group cursor-pointer">
  Type de mouvement
  <div class="absolute left-0 mt-2 hidden group-hover:block z-10 bg-white border rounded shadow-lg w-24 m-4  ">
    <ul class="text-xs text-gray-700 divide-y divide-gray-200">
      <li class="px-4 py-2 hover:bg-blue-50 cursor-pointer   " onclick="filterByType('entree')">Entrée</li>
      <li class="px-4 py-2 hover:bg-blue-50  cursor-pointer" onclick="filterByType('sorti')">Sortie</li>
      <li class="px-4 py-2 hover:bg-blue-50  cursor-pointer" onclick="filterByType('all')">Tous</li>
    </ul>
  </div>
</th>
   <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Matériel </th>
              <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider relative group cursor-pointer">Quantité
  <div class="absolute  left-0 mt-2 hidden group-hover:block z-10 bg-white border rounded shadow-lg w-20 p-2 m-4">
    <ul class="text-xs text-gray-700 divide-y divide-gray-200">
        <div onclick="sortByQuantity('ASC')" class="flex flex-row hover:bg-blue-50 px-4 py-2">
 ASC
                </div>
     <div class="flex flex-row hover:bg-blue-50 px-4 py-2" onclick="sortByQuantity('DESC')"  > DESC </div>
  </div>



            </th>
              <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Employé</th>
<th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Categorie du produit</th>
<th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Stock</th>
              <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider relative group cursor-pointer">Date
                 <div class="absolute m-4 left-0 mt-2 hidden group-hover:block z-10 bg-white border rounded shadow-lg w-20 p-2">
    <ul class="text-xs text-gray-700 divide-y divide-gray-200">
        <div class="flex flex-row hover:bg-blue-50 px-4 py-2"   onclick="sortbyeDate('ASC')">
 ASC
                </div>
     <div class="flex flex-row hover:bg-blue-50 px-4 py-2" onclick="sortbyeDate('DESC')"> DESC </div>
    </ul>
  </div></th>
            </tr>
          </thead>
          <tbody id="stock-table" class="bg-white divide-y divide-gray-200">
            @foreach ($stock as $stoc)
            <tr data-type="{{ $stoc->typestock }}"  data-quantity="{{$stoc->quantite }}" data-date="{{$stoc->quantite }}" class="@if($stoc->typestock === 'entree')  @else  @endif transition-colors duration-150  hover:shadow  ">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium @if($stoc->typestock === 'entree') text-black @else @endif">
                {{ ucfirst($stoc->typestock) }}
                @if($stoc->typestock === 'entree')
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline ml-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12 7a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0V8.414l-4.293 4.293a1 1 0 01-1.414 0L8 10.414l-4.293 4.293a1 1 0 01-1.414-1.414l5-5a1 1 0 011.414 0L11 10.586 14.586 7H12z" clip-rule="evenodd" />
                  </svg>
                @else
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline ml-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12 13a1 1 0 100 2h5a1 1 0 001-1v-5a1 1 0 10-2 0v2.586l-4.293-4.293a1 1 0 00-1.414 0L8 9.586l-4.293-4.293a1 1 0 00-1.414 1.414l5 5a1 1 0 001.414 0L11 9.414 14.586 13H12z" clip-rule="evenodd" />
                  </svg>
                @endif
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{$stoc->materiel}}</td>
              <td data-type="{{ $stoc->quantite }}" class="px-6 py-4 whitespace-nowrap text-sm font-medium ">
                {{$stoc->quantite}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700"> @if($stoc->nom_employer == "null") --
                @else
                {{$stoc->nom_employer}} @endif</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{$stoc->categorie}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{$stoc->stock}}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{$stoc->date}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    @if(count($stock) === 0)
    <div class="mt-8 text-center py-12 bg-secondary-100 rounded-lg animate-fade-in">
      <p class="text-gray-600">Aucun mouvement de matériel enregistré pour le moment.</p>
    </div>
    @endif
  </div>
</body>
<script>
  function filterByType(type) {
    const rows = document.querySelectorAll('#stock-table tr');
    rows.forEach(row => {
      const rowType = row.getAttribute('data-type');
      const rowquantite=row.getAttribute('data-quantity')
     console.log(rowquantite)

      if (type === 'all' || rowType === type) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    });
  }
   function sortByQuantity(order) {
    const tbody = document.querySelector('#stock-table');
    const rows = Array.from(tbody.querySelectorAll('tr'));

    rows.sort((a, b) => {
      const aQty = parseFloat(a.getAttribute('data-quantity')) || 0;
      const bQty = parseFloat(b.getAttribute('data-quantity')) || 0;
      const aQty2 = parseFloat(a.getAttribute('data-quantity')) || 0;
      const bQty2 = parseFloat(b.getAttribute('data-quantity')) || 0;


      return order === 'ASC' ? aQty - bQty : bQty - aQty;
    });
    rows.forEach(row => tbody.appendChild(row));
  }

   function sortbyeDate(order) {
    const tbody = document.querySelector('#stock-table');
    const rows = Array.from(tbody.querySelectorAll('tr'));

    rows.sort((a, b) => {
      const aQty = parseFloat(a.getAttribute('data-date')) || 0;
      const bQty = parseFloat(b.getAttribute('data-date')) || 0;



      return order === 'ASC' ? aQty - bQty : bQty - aQty;
    });
    rows.forEach(row => tbody.appendChild(row));
  }
</script>

</html>
