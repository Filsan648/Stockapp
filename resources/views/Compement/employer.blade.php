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
              50: '#eff6ff',
              600: '#2563eb',
              700: '#1d4ed8',
            }
          },
          animation: {
            'fade-in': 'fadeIn 0.5s ease-out',
            'float': 'float 6s ease-in-out infinite',
          },
          keyframes: {
            fadeIn: {
              '0%': { opacity: '0', transform: 'translateY(10px)' },
              '100%': { opacity: '1', transform: 'translateY(0)' },
            },
            float: {
              '0%, 100%': { transform: 'translateY(0)' },
              '50%': { transform: 'translateY(-8px)' },
            }
          },
        }
      }
    }
  </script>
  <title>Gestion des Employés</title>
</head>
<body class="min-h-screen bg-black font-sans">
  <div class="container mx-auto px-4 py-12 flex justify-center">
    <div class="w-full max-w-4xl">
      <!-- Carte principale -->
      <div class="bg-white rounded-3xl shadow-xl overflow-hidden transition-all duration-300 border border-black ">

        <div class=" p-8 text-center">
          <h1 class="text-4xl font-bold  ">Ajouter un Employé</h1>

        </div>
   <form class="space-y-6 p-12 " action="{{ route('employer_post') }}" method="POST">
          @csrf
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="animate-fade-in">
              <label class="block text-gray-700 font-medium mb-2">Nom</label>
              <input type="text" name="nom"
                     class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-blue-50/60  focus:outline-none " />
            </div>

            <div class="animate-fade-in">
              <label class="block text-gray-700 font-medium mb-2">Fonction</label>
              <input type="text" name="fonction"
                     class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-blue-50/60 focus:outline-none " />
            </div>
            <div class="animate-fade-in">
                <label class="block text-gray-700 font-medium mb-2">Departement</label>
                <input type="text" name="departement"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-blue-50/60 focus:outline-none " />
              </div>
          </div>

          <div class="flex justify-end pt-4">
            <button type="submit" class="bg-black  text-white font-semibold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105 shadow-md">
              Enregistrer
            </button>
          </div>
        </form>


      </div>


      <div class="mt-12 bg-white border border-black overflow-hidden">
        <div class="p-6">
          <h2 class="text-2xl font-bold justify-center flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            Liste des Employés
          </h2>
        </div>

        <div class="p-6">
          @if(count($employer) > 0)
            <div class="overflow-x-auto">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fonction</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Département</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                  @foreach ($employer as $employe)
                  <tr class="hover:bg-gray-50 transition duration-150 animate-fade-in">
                    <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">{{ $employe->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-500">{{ $employe->fonction }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-500">{{ $employe->Departement }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                      <div class="flex space-x-2">
                        <button class="text-blue-600 hover:text-blue-900 transition duration-300">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                          </svg>
                        </button>
                        <button class="text-red-600 hover:text-red-900 transition duration-300">
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
            <div class="text-center py-12 bg-gray-50 rounded-lg">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <h3 class="mt-4 text-lg font-medium text-gray-700">Aucun employé enregistré</h3>
              <p class="mt-1 text-gray-500">Commencez par ajouter votre premier employé</p>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</body>
</html>
