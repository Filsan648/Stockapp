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
            },
            secondary: {
              50: '#fef2f2',
              600: '#dc2626',
              700: '#b91c1c',
            }
          },
          animation: {
            'fade-in': 'fadeIn 0.3s ease-in-out',
            'float': 'float 3s ease-in-out infinite',
          },
          keyframes: {
            fadeIn: {
              '0%': { opacity: '0', transform: 'translateY(10px)' },
              '100%': { opacity: '1', transform: 'translateY(0)' },
            },
            float: {
              '0%, 100%': { transform: 'translateY(0)' },
              '50%': { transform: 'translateY(-5px)' },
            }
          },
        }
      }
    }
  </script>
  <title>Gestion de Stock</title>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 to-blue-100 font-sans">
  <!-- Notification Flash -->
  @if(session('error'))
  <div class="fixed top-4 right-4 z-50 animate-fade-in">
    <div class="bg-red-100 border-l-4 border-red-600 text-red-700 p-4 shadow-lg rounded-lg flex items-start max-w-md">
      <div class="flex-shrink-0">
        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </div>
      <div class="ml-3">
        <p class="font-bold">Erreur</p>
        <p class="text-sm">{{ session('error') }}</p>
      </div>
    </div>
  </div>
  @endif

  @if(session('success'))
  <div class="fixed top-4 right-4 z-50 animate-fade-in">
    <div class="bg-green-100 border-l-4 border-green-600 text-green-700 p-4 shadow-lg rounded-lg flex items-start max-w-md">
      <div class="flex-shrink-0">
        <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
      </div>
      <div class="ml-3">
        <p class="font-bold">Succès</p>
        <p class="text-sm">{{ session('success') }}</p>
      </div>
    </div>
  </div>
  @endif

  <div class="container mx-auto px-4 py-8 flex justify-center items-start">
    <div class="w-full max-w-5xl bg-white rounded-3xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl">
      <!-- Header -->
      <div class="bg-gradient-to-r from-primary-600 to-primary-700 p-8 text-center">
        <h1 class="text-4xl font-extrabold text-white animate-float">Gestion de Stock</h1>
        <p class="text-blue-100 mt-2 text-lg">Ajoutez ou retirez des matériels du stock</p>
      </div>

      <div class="p-8 space-y-12">
        <!-- Ajouter dans le stock -->
        <section class="animate-fade-in">
          <div class="flex items-center mb-6">
            <div class="bg-blue-100 p-2 rounded-full mr-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
              </svg>
            </div>
            <h2 class="text-2xl font-semibold text-gray-800">Ajouter dans le stock</h2>
          </div>

          <form class="space-y-6" action="{{ route('stock_post') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
              <div>
                <label class="block text-gray-700 font-medium mb-2">Type de matériel</label>
                <select name="materiel" class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-primary-50 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent transition duration-300" required>
                  @foreach ($materiel as $materie)
                    <option value="{{$materie}}">{{$materie}}</option>
                  @endforeach
                </select>
              </div>

              <div>
                <label class="block text-gray-700 font-medium mb-2">Quantité</label>
                <input type="number" name="nombre_ajout" min="0" class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-primary-50 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent transition duration-300" />
              </div>

              <div>
                <label class="block text-gray-700 font-medium mb-2">Date</label>
                <input type="date" name="date" class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-primary-50 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:border-transparent transition duration-300" />
              </div>
            </div>

            <div class="flex justify-end pt-2">
              <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white font-semibold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105 shadow-md flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                </svg>
                Enregistrer
              </button>
            </div>
          </form>
        </section>

        <!-- Sortir du stock -->
        <section class="animate-fade-in">
          <div class="flex items-center mb-6">
            <div class="bg-red-100 p-2 rounded-full mr-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
              </svg>
            </div>
            <h2 class="text-2xl font-semibold text-gray-800">Sortir du stock</h2>
          </div>

          <form class="space-y-6" action="{{ route('stock_post_sorti') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
              <div>
                <label class="block text-gray-700 font-medium mb-2">Type de matériel</label>
                <select name="materiel" class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-secondary-50 focus:outline-none focus:ring-2 focus:ring-secondary-600 focus:border-transparent transition duration-300" required>
                  @foreach ($materiel as $materie)
                    <option value="{{$materie}}">{{$materie}}</option>
                  @endforeach
                </select>
              </div>

              <div>
                <label class="block text-gray-700 font-medium mb-2">Quantité</label>
                <input type="number" name="nombre_sortie" min="0" class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-secondary-50 focus:outline-none focus:ring-2 focus:ring-secondary-600 focus:border-transparent transition duration-300" />
              </div>

              <div>
                <label class="block text-gray-700 font-medium mb-2">Employé</label>
                <select name="client" class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-secondary-50 focus:outline-none focus:ring-2 focus:ring-secondary-600 focus:border-transparent transition duration-300" required>
                  @foreach ($employer as $employe)
                    <option value="{{$employe}}">{{$employe}}</option>
                  @endforeach
                </select>
              </div>

              <div>
                <label class="block text-gray-700 font-medium mb-2">Date</label>
                <input type="date" name="date" class="w-full px-4 py-3 rounded-lg border border-gray-300 bg-secondary-50 focus:outline-none focus:ring-2 focus:ring-secondary-600 focus:border-transparent transition duration-300" />
              </div>
            </div>

            <div class="flex justify-end pt-2">
              <button type="submit" class="bg-secondary-600 hover:bg-secondary-700 text-white font-semibold py-3 px-8 rounded-lg transition duration-300 transform hover:scale-105 shadow-md flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" />
                </svg>
                Enregistrer
              </button>
            </div>
          </form>
        </section>
      </div>
    </div>
  </div>

  <script>
    // Auto-dismiss notifications after 5 seconds
    setTimeout(() => {
      const notifications = document.querySelectorAll('[role="alert"]');
      notifications.forEach(notification => {
        notification.style.transition = 'opacity 0.5s ease-out';
        notification.style.opacity = '0';
        setTimeout(() => notification.remove(), 500);
      });
    }, 5000);
  </script>
</body>
</html>
