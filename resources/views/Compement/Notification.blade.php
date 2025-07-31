 <!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <script src="https://cdn.tailwindcss.com"></script>
 <body>
 <div class=" mt-11">
  <h2 class=" p-8 text-3xl">Liste des commandes </h2>
  <div class="overflow-x-auto">
              <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                  <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Numero de la commande </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom de materiel</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Envoiyer par </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Reponse</th>
                </tr>
                </thead>
                @foreach ($Commandes as $commande )
                        <tbody class="bg-white divide-y divide-gray-200">

                  <tr class="hover:bg-gray-50 transition duration-150 animate-fade-in">
                    <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">{{$commande->id}}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-500">{{$commande->NommItem}} </td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-500">{{$commande->expediteur}} </td>
                    <td class="px-6 py-4 whitespace-nowrap text-gray-500">{{$commande->Description}} </td>

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
 <td class="px-6 py-4 whitespace-nowrap text-gray-500">
    @if($commande->status == 'En attente')
<form  action="{{ route('Commandespost',['id' => $commande->id]) }}" method="POST">
    @csrf

    <select name="response">
        <option value="validée">
    Accepter  </option>   <option value="Refusée">
  Refuser </option> </select>

<button type="submit" class=" m-1 p-3 bg-blue-800 rounded-2xl text-white ">Envoyer<button>


</form>
@else
Commande {{$commande->status}}
@endif
</td>
                    </td>
                  </tr>

                </tbody>
                @endforeach

              </table>
            </div>

    </div>
</body>
</html>
