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
              50: '#f0f9ff',
              100: '#e0f2fe',
              500: '#3b82f6',
              600: '#2563eb',
            },
            secondary: {
              500: '#ec4899',
              600: '#db2777',
            }
          }
        }
      }
    }
  </script>
  <title>Dashboard Matériel</title>
</head>

<body class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 font-sans p-6 ">
  <div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold  text-gray-800 m-10 mb-20">Dashboard</h1>

<div class="flex flex-row  justify-center items-center gap-14 mb-14">
    <div class="flex flex-row w-3xl  shadow shadow-black rounded-xl  p-9"> <img src="/image/icons/employer.png" class=" w-20" /> <div class="flex-col flex"> <div class="text-xl">Employers</div> <div class="text-black/60 m-2">{{$Employer}}</div>     </div> </div>
    <div class="flex flex-row w-3xl  shadow shadow-black rounded-xl  p-9  gap-5 "> <img src="/image/icons/MATERIEL.png" class=" w-20" /> <div class="flex-col flex"> <div class="text-xl"> Materiel  </div> <div class="text-black/60 m-2">{{$Materiel}}</div>     </div> </div>
    <div class="flex flex-row w-3xl  shadow shadow-black rounded-xl  p-9  gap-5 "> <img src="/image/icons/stock.png" class=" w-20" /> <div class="flex-col flex"> <div class="text-xl"> Stock  </div> <div class="text-black/60 m-2">{{$Stock}}</div>     </div> </div>



</div>
    <!-- Première ligne de graphiques -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
      <!-- Quantité sortie par matériel -->
      <div class="bg-white rounded-xl shadow p-6 shadow-black   transition-shadow">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Quantité actuelle en stock pour chaque matériel</h2>
        <div class="h-80">
          <canvas id="chart1"></canvas>
        </div>
      </div>

      <!-- Quantité sortie par employé -->
      <div class="bg-white rounded-xl shadow shadow-black   p-6  transition-shadow">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Quantité sortie par employé</h2>
        <div class="h-80">
          <canvas id="chart4"></canvas>
        </div>
      </div>
    </div>

    <!-- Deuxième ligne de graphiques -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
      <!-- Flux mensuel des entrées/sorties -->
      <div class="bg-white rounded-xl shadow shadow-black  p-6  transition-shadow">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Flux mensuel des entrées/sorties</h2>
        <div class="h-80">
          <canvas id="chart2"></canvas>
        </div>
      </div>

      <!-- Détails par matériel avec sélection -->
      <div class="bg-white rounded-xl shadow p-6 shadow-black   transition-shadow">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Détails par matériel</h2>
        <div class="mb-4">
          <label for="materielSelect" class="block text-lg font-medium text-gray-700 mb-2">Sélectionnez un matériel :</label>
          <select id="materielSelect" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
            <option disabled selected class="text-gray-400">Choisir un matériel</option>
            @foreach (collect($Stocks)->pluck('stock_materiel')->unique() as $materiel)
              <option value="{{ $materiel }}" class="text-gray-700">{{ $materiel }}</option>
            @endforeach
          </select>
        </div>
        <div class="h-80">
          <canvas id="chart3"></canvas>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    // Couleurs personnalisées
    const colors = {
      primary: {
        light: 'black',
        dark: 'rgba(37, 99, 235, 1)'
      },
      secondary: {
        light: 'black',
        dark: 'rgba(219, 39, 119, 1)'
      },
      success: {
        light: 'rgba(16, 185, 129, 0.5)',
        dark: 'rgba(5, 150, 105, 1)'
      }
    };

    const stockData = {!! json_encode(collect($Stocks)->groupBy('stock_materiel')) !!};
    const labelschart1 = {!! json_encode(collect($materiel_stock)->pluck('materiel')) !!};
    const datachart1 = {!! json_encode(collect($materiel_stock)->pluck('quantite')) !!};

    const labelschart4 = {!! json_encode(collect($employer_quantite)->pluck('employer')) !!};
    const datachart4 = {!! json_encode(collect($employer_quantite)->pluck('quantite_prix')) !!};

    const labelschart2 = {!! json_encode(collect($stock_entree)->pluck('month')) !!};
    const datachart2a = {!! json_encode(collect($stock_entree)->pluck('quantite_entree')) !!};
    const datachart2b = {!! json_encode(collect($stock_entree)->pluck('quantite_sorti')) !!};

    const chartOptions = {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          position: 'top',
          labels: {
            font: { size: 14 }
          }
        },
        tooltip: {

          titleFont: { size: 16 },
          bodyFont: { size: 14 },
          padding: 12
        }
      },

    };

    // Chart 1
    new Chart(document.getElementById('chart1').getContext('2d'), {
      type: 'bar',
      data: {
        labels: labelschart1,
        datasets: [{
          label: 'Quantité ',
          data: datachart1,
          backgroundColor: colors.secondary.light,

          borderWidth: 2,
          borderRadius: 6,

        }]
      },
      options: {
        ...chartOptions,
        plugins: {
          ...chartOptions.plugins,
          title: {
            display: true,
            text: 'Quantité actuelle en stock pour chaque matériel',
            font: { size: 16 }
          }
        }
      }
    });

    // Chart 4
    new Chart(document.getElementById('chart4').getContext('2d'), {
      type: 'bar',
      data: {
        labels: labelschart4,
        datasets: [{
          label: 'Quantité sortie ',
          data: datachart4,
          backgroundColor: colors.secondary.light,

          borderWidth: 2,
          borderRadius: 6,

        }]
      },
      options: {
        ...chartOptions,
        plugins: {
          ...chartOptions.plugins,
          title: {
            display: true,
            text: 'Quantité totale sortie par employé',
            font: { size: 16 }
          }
        }
      }
    });

    // Chart 2
    new Chart(document.getElementById('chart2').getContext('2d'), {
      type: 'bar',
      data: {
        labels: labelschart2,
        datasets: [
          {
            label: 'Quantité entrée',
            data: datachart2a,
            backgroundColor: colors.primary.light,
            borderColor: colors.primary.dark,
            borderWidth: 2,
            borderRadius: 6,

          },
          {
            label: 'Quantité sortie',
            data: datachart2b,
            backgroundColor: colors.secondary.light,
            borderColor: colors.secondary.dark,
            borderWidth: 2,
            borderRadius: 6,

          }
        ]
      },
      options: {
        ...chartOptions,
        plugins: {
          ...chartOptions.plugins,
          title: {
            display: true,
            text: 'Flux mensuel des entrées et sorties',
            font: { size: 16 }
          }
        }
      }
    });

    // Chart 3 dynamique
    const chart3Ctx = document.getElementById('chart3').getContext('2d');
    let chart3Instance = null;

    function updateChart3(materiel) {
      const data = stockData[materiel];
      if (!data) return;

      const labels = data.map(item => item.monthsstock);
      const entrees = data.map(item => item.stock_quantiteentree);
      const sorties = data.map(item => item.stock_quantitesorti);

      if (chart3Instance) chart3Instance.destroy();

      chart3Instance = new Chart(chart3Ctx, {
        type: 'line',
        data: {
          labels: labels,
          datasets: [
            {
              label: 'Quantité entrée',
              data: entrees,

              borderColor: colors.primary.dark,
              borderWidth: 3,
              tension: 0.3,
              fill: false
            },
            {
              label: 'Quantité sortie',
              data: sorties,


              borderColor: 'black',
              borderWidth: 3,
              tension: 0.3,
              fill: true
            }
          ]
        },
        options: {
          ...chartOptions,
          plugins: {
            ...chartOptions.plugins,
            title: {
              display: true,
              text: `Historique pour: ${materiel}`,
              font: { size: 16 }
            }
          }
        }
      });
    }

    document.getElementById('materielSelect').addEventListener('change', function () {
      updateChart3(this.value);
    });

    const firstMaterial = document.getElementById('materielSelect').options[1]?.value;
    if (firstMaterial) updateChart3(firstMaterial);
  </script>
</body>
</html>
