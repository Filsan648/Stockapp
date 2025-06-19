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
<body class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 font-sans">
  <div class="container mx-auto px-4 py-12 flex justify-center">
    <div class="w-full max-w-4xl">
      <!-- Carte principale -->
      <div class="bg-white rounded-3xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl">
        <!-- En-tête avec fond gradient -->
        <div class="bg-gradient-to-r from-primary-600 to-primary-700 p-8 text-center">
          <h1 class="text-4xl font-bold text-white animate-float">Ajouter un Employé</h1>
          <p class="text-blue-100 mt-2">Renseignez les informations du nouvel employé</p>
        </div>

        <!-- Contenu du formulaire -->
        <div class="p-8">
          <form class="space-y-8" action="{{ route('employer_post') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Champ Nom -->
              <div class="animate-fade-in">
                <label class="block text-gray-700 font-medium mb-2 flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                  </svg>
                  Nom de l'employé
                </label>
                <input type="text" name="nom" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-primary-50 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent transition duration-300 placeholder-gray-400"
                       placeholder="Ex: Jean Dupont">
              </div>

              <!-- Champ Fonction -->
              <div class="animate-fade-in" style="animation-delay: 0.1s">
                <label class="block text-gray-700 font-medium mb-2 flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                    <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                  </svg>
                  Fonction
                </label>
                <input type="text" name="fonction" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-primary-50 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent transition duration-300 placeholder-gray-400"
                       placeholder="Ex: Développeur Web">
              </div>

              <!-- Champ Département -->
              <div class="md:col-span-2 animate-fade-in" style="animation-delay: 0.2s">
                <label class="block text-gray-700 font-medium mb-2 flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-primary-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H9a1 1 0 00-1 1v2a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd" />
                  </svg>
                  Département
                </label>
                <input type="text" name="departement" required
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-primary-50 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent transition duration-300 placeholder-gray-400"
                       placeholder="Ex: Informatique">
              </div>
            </div>

            <!-- Bouton de soumission -->
            <div class="flex justify-end pt-4">
              <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white font-semibold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105 shadow-md flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                Enregistrer
              </button>
            </div>
          </form>
        </div>
      </div>

      <!-- Liste des employés -->
      <div class="mt-12 bg-white rounded-3xl shadow-xl overflow-hidden">
        <div class="bg-gradient-to-r from-gray-700 to-gray-800 p-6">
          <h2 class="text-2xl font-bold text-white flex items-center">
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
