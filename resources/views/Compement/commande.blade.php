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
  <title>Effectuer une commande</title>
</head>
<body class="min-h-screen bg-black font-sans">
  <div class="container mx-auto px-4 py-12 flex justify-center">
    <div class="w-full max-w-4xl">
      <!-- Carte principale -->
      <div class="bg-white rounded-3xl shadow-xl overflow-hidden transition-all duration-300 border border-black ">

        <div class=" p-8 text-center">
          <h1 class="text-4xl font-bold  ">Effectuer une commande </h1>
        </div>
   <form class="space-y-6 p-12 " action="{{ route('Commandepost') }}" method="POST">
          @csrf
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="animate-fade-in">
              <label class="block text-gray-700 font-medium mb-2">Nom du item</label>
              <input type="text" name="Nom"
                     class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-blue-50/60  focus:outline-none " />
            </div>
   <div class="animate-fade-in">
              <label class="block text-gray-700 font-medium mb-2 text-center">
À</label>
              <select type="text" name="recepteur"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-blue-50/60 focus:outline-none " >
 @foreach ($User as $user)
        <option value="{{ $user->id }}">
    {{$user->id}}:{{$user->name}}
</option>
  @endforeach

            </select>
                    </div>
            <div class="animate-fade-in">
                <label class="block text-gray-700 font-medium mb-2">Quantite</label>
                <input type="number" name="Quantite"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-blue-50/60 focus:outline-none " />
              </div>
               <div class="animate-fade-in">
                <label class="block text-gray-700 font-medium mb-2">Description</label>
                <input type="text" name="Description"
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

  <div class=" mt-11">
  <h2>Liste des commandes </h2>
  <div class="">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Numero de la commande </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom de materiel</th>
                     <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantite commandée</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Envoiyer a </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                      <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>

                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>

                </tr>
                </thead>
                @foreach ($Commandes as $commande )
                        <tbody class="bg-white divide-y divide-gray-200">

                  <tr class="hover:bg-gray-50 transition duration-150 animate-fade-in">
                    <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">{{$commande->id}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-500">{{$commande->NommItem}} </td>
                  <td class="px-6 py-4 whitespace-nowrap text-gray-500">{{$commande->quantite}} </td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-500">{{$commande->recepteur}} </td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-500">{{$commande->Description}} </td>
<td class="px-6 py-4 whitespace-nowrap text-gray-500">{{$commande->date}} </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                      <div class="flex flex-row space-x-1">
                         @php
    $status = $commande->status;

    // Définir une couleur différente selon le statut
    $bgColor = match($status) {
        'En attente' => 'bg-yellow-500',
        'validée'    => 'bg-green-500',
        'Refusée'    => 'bg-red-500',

        default      => 'bg-gray-500',
    };
@endphp

<div class="h-10 rounded-3xl flex justify-center items-center {{ $bgColor }}">
    <h4 class="px-6 py-4 text-center text-white">{{ $commande->status }}</h4>
</div>


                      </div>
                    </td>
                  </tr>

                </tbody>
                @endforeach

              </table>
            </div>

    </div>












  </div>
</body>
</html>
