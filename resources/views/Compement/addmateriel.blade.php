<!DOCTYPE html>
<html lang="en">
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
  <title>Matériel</title>
</head>
<body class="min-h-screen bg-black font-sans">

  <div class="w-full max-w-4xl mx-auto p-6 lg:p-10">
    <div class="bg-white border border-black rounded-3xl  overflow-hidden transition-all duration-300 ">
      <div class=" p-6">
        <h1 class="text-3xl font-bold text-center  ">Ajouter des items</h1>
      </div>

      <div class="p-8">
        <form class="space-y-6" action="{{ route('materiel_post') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="animate-fade-in">
              <label class="block text-gray-700 font-medium mb-2">Items</label>
              <input type="text" name="Materiel" placeholder="Ex: Gant"
                     class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-blue-50/60  focus:outline-none " />
            </div>

            <div class="animate-fade-in">
              <label class="block text-gray-700 font-medium mb-2">Quantité</label>
              <input type="number" name="quantite" placeholder="Ex: 5"
                     class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-blue-50/60 focus:outline-none " />
            </div>
            <div class="animate-fade-in">
                <label class="block text-gray-700 font-medium mb-2">Categorie</label>
                <select name="Categori"class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-blue-50/60 focus:outline-none " >
                <option value="Matières Premières" >Matières Premières</option>
                <option value="Produits Finis" >Produits Finis</option>
                <option value="Pièces Détachées">Pièces Détachées</option>
                <option value="Fournitures d’Usine">Fournitures d’Usine</option>
                </select>
              </div>
              <div class="animate-fade-in">
                <label class="block text-gray-700 font-medium mb-2">Image</label>
                <input type="file" name="Image" accept="image/*"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-blue-50/60 focus:outline-none " />
              </div>
               <div class="animate-fade-in">
                <label class="block text-gray-700 font-medium mb-2">Date</label>
                <input type="date" name="date" placeholder="Ex: 5"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-blue-50/60 focus:outline-none " />
              </div>
          </div>

          <div class="flex justify-end pt-4">
            <button type="submit" class="bg-black hover:bg-blue-300 text-white font-semibold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105 shadow-md">
              Enregistrer
            </button>
          </div>
        </form>

        <!-- Liste des matériaux -->
        <div class="mt-12 animate-fade-in">
          <h2 class="text-2xl font-semibold text-gray-800 mb-6 pb-2 border-b border-gray-200">Inventaire des Matériels</h2>

          @if(count($materiel) > 0)
            <div class="overflow-hidden rounded-xl shadow-sm">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                     <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Items</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categorie</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"> Quantité</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image </th>
                   <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  @foreach ($materiel as $materie)
                  <tr class="hover:bg-gray-50 transition duration-150">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $materie->id }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $materie->materiel }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $materie->categorie }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $materie->quantite }}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                         @if(file_exists(public_path('images/' . $materie->image)))
    <img src="{{ asset('images/' . $materie->image) }}" alt="Image" class="w-32 h-32 object-cover rounded">
@else
    <p>Aucune image disponible</p>
@endif</td>

                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                      <div class="flex space-x-2">
                        <button class="text-black/60 hover:text-blue-300 transition duration-300">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                          </svg>
                        </button>
                        <button class="text-black/60 hover:text-blue-300 transition duration-300">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                          </svg>
                        </button>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @else
            <div class="text-center py-8 bg-gray-50 rounded-lg">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
              </svg>
              <h3 class="mt-4 text-lg font-medium text-gray-700">Aucun Items enregistré</h3>
              <p class="mt-1 text-gray-500">Commencez par ajouter votre premier Items</p>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>

</body>
</html>
