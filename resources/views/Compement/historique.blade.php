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
    <h1 class="text-3xl font-bold text-primary-700 mb-8 text-center animate-fade-in">Gestion des Mouvements de Matériel</h1>

    <div class="bg-white rounded-lg shadow-md overflow-hidden animate-fade-in">
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-primary-600 text-white">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Type de mouvement</th>
              <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Matériel</th>
              <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Quantité</th>
              <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Employé</th>
              <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Date</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($stock as $stoc)
            <tr class="@if($stoc->typestock === 'entree') bg-entree-100 hover:bg-green-200 @else bg-sortie-100 hover:bg-red-200 @endif transition-colors duration-150">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium @if($stoc->typestock === 'entree') text-entree-500 @else text-sortie-500 @endif">
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
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium @if($stoc->typestock === 'entree') text-entree-500 @else text-sortie-500 @endif">
                {{$stoc->quantite}}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{$stoc->nom_employer}}</td>
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
</html>
