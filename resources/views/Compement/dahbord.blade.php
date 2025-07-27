<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        fontFamily: {
          sans: ['Inter', 'sans-serif'],
        },
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
            },
            dark: {
              700: '#1e293b',
              800: '#1e293b',
            }
          },
          boxShadow: {
            card: '0 4px 20px rgba(0, 0, 0, 0.08)',
            chart: '0 4px 12px rgba(0, 0, 0, 0.05)',
          }
        }
      }
    }
  </script>
  <style>
    .animate-float {
      animation: float 6s ease-in-out infinite;
    }
    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }
    .chart-container {
      transition: all 0.3s ease;
    }
    .chart-container:hover {
      transform: translateY(-5px);
    }
  </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 font-sans p-4 md:p-6">
  <div class="max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-800 mb-2">Tableau de Bord</h1>
    <p class="text-gray-600 mb-8">Aperçu des stocks et des mouvements</p>

    <!-- Cards Row -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
      <!-- Employer Card -->
      <div class="bg-gradient-to-r from-red-500 to-red-600 rounded-2xl shadow-lg p-6 text-white transform transition-all hover:scale-105">
        <div class="flex items-center">
          <div class="p-3 rounded-full bg-white/20 backdrop-blur-sm mr-4 animate-float">
            <img src="/image/icons/employer.png" class="w-8 h-8" />
          </div>
          <div>
            <p class="text-sm font-medium opacity-80">Employés</p>
            <h3 class="text-2xl font-bold">{{$Employer}}</h3>
          </div>
        </div>
      </div>

      <!-- Materiel Card -->
      <div class="bg-gradient-to-r from-amber-500 to-amber-600 rounded-2xl shadow-lg p-6 text-white transform transition-all hover:scale-105">
        <div class="flex items-center">
          <div class="p-3 rounded-full bg-white/20 backdrop-blur-sm mr-4 animate-float">
            <img src="/image/icons/MATERIEL.png" class="w-8 h-8" />
          </div>
          <div>
            <p class="text-sm font-medium opacity-80">Matériels</p>
            <h3 class="text-2xl font-bold">{{$Materiel}}</h3>
          </div>
        </div>
      </div>

      <!-- Stock Card -->
      <div class="bg-gradient-to-r from-violet-500 to-violet-600 rounded-2xl shadow-lg p-6 text-white transform transition-all hover:scale-105">
        <div class="flex items-center">
          <div class="p-3 rounded-full bg-white/20 backdrop-blur-sm mr-4 animate-float">
            <img src="/image/icons/stock.png" class="w-8 h-8" />
          </div>
          <div>
            <p class="text-sm font-medium opacity-80">Stock Total</p>
            <h3 class="text-2xl font-bold">{{$Stock}}</h3>
          </div>
        </div>
      </div>
    </div>

    <!-- Material Details Section -->
    <div class="bg-white rounded-2xl shadow-card p-6 mb-8 transition-all hover:shadow-chart">
      <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
        <h2 class="text-xl font-semibold text-gray-800">Détails par matériel</h2>
        <div class="w-full md:w-64 mt-4 md:mt-0">
          <select id="materielSelect" class="w-full p-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 text-gray-700 bg-gray-50">
            <option disabled selected class="text-gray-400">Choisir un matériel</option>
            @foreach (collect($Stocks)->pluck('stock_materiel')->unique() as $materiel)
              <option value="{{ $materiel }}" class="text-gray-700">{{ $materiel }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="h-80 chart-container">
        <canvas id="chart3"></canvas>
      </div>
    </div>

    <!-- First Row of Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
      <!-- Current Stock Quantity -->
      <div class="bg-white rounded-2xl shadow-card p-6 transition-all hover:shadow-chart chart-container">
        <h2 class="text-xl font-semibold text-gray-800 mb-6">Quantité actuelle en stock</h2>
        <div class="h-80">
          <canvas id="chart1"></canvas>
        </div>
      </div>

      <!-- Quantity by Employee -->
      <div class="bg-white rounded-2xl shadow-card p-6 transition-all hover:shadow-chart chart-container">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
          <h2 class="text-xl font-semibold text-gray-800">Quantité sortie par employé</h2>
          <div class="w-full md:w-48 mt-4 md:mt-0">
            <select id="moisSelect" class="w-full p-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 text-gray-700 bg-gray-50">
              <option disabled selected class="text-gray-400">Mois</option>
              @foreach (collect($employer_quantite)->pluck('month')->unique() as $month)
                <option value="{{ $month }}" class="text-gray-700">{{ $month }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="h-80">
          <canvas id="chart4"></canvas>
        </div>
      </div>
    </div>

    <!-- Monthly Flow Chart -->
    <div class="bg-white rounded-2xl shadow-card p-6 transition-all hover:shadow-chart chart-container mb-8">
      <h2 class="text-xl font-semibold text-gray-800 mb-6">Flux mensuel des entrées/sorties</h2>
      <div class="h-80">
        <canvas id="chart2"></canvas>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    // Custom colors
    const colors = {
      primary: '#3b82f6',
      secondary: '#ec4899',
      success: '#10b981',
      danger: '#ef4444',
      warning: '#f59e0b',
      info: '#6366f1',
      dark: '#1e293b'
    };

    const stockData = {!! json_encode(collect($Stocks)->groupBy('stock_materiel')) !!};
    const labelschart1 = {!! json_encode(collect($materiel_stock)->pluck('materiel')) !!};
    const datachart1 = {!! json_encode(collect($materiel_stock)->pluck('quantite')) !!};
    const labelschart4 = {!! json_encode(collect($employer_quantite)->groupBy('month')) !!};
    const datachart4 = {!! json_encode(collect($employer_quantite)->pluck('quantite_prix')) !!};
    const labelschart2 = {!! json_encode(collect($stock_entree)->pluck('month')) !!};
    const datachart2a = {!! json_encode(collect($stock_entree)->pluck('quantite_entree')) !!};
    const datachart2b = {!! json_encode(collect($stock_entree)->pluck('quantite_sorti')) !!};

    // Chart configuration
    const chartOptions = {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          position: 'top',
          labels: {
            font: {
              size: 14,
              family: 'Inter'
            },
            padding: 20
          }
        },
        tooltip: {
          backgroundColor: colors.dark,
          titleFont: { size: 14, family: 'Inter', weight: 'bold' },
          bodyFont: { size: 13, family: 'Inter' },
          padding: 12,
          cornerRadius: 8,
          displayColors: true,
          boxPadding: 4
        }
      },
      scales: {
        x: {
          grid: {
            display: false
          },
          ticks: {
            font: {
              family: 'Inter'
            }
          }
        },
        y: {
          grid: {
            color: 'rgba(0, 0, 0, 0.05)'
          },
          ticks: {
            font: {
              family: 'Inter'
            }
          }
        }
      },
      elements: {
        bar: {
          borderRadius: 8
        }
      }
    };

    // Chart 1 - Current Stock
    new Chart(document.getElementById('chart1').getContext('2d'), {
      type: 'bar',
      data: {
        labels: labelschart1,
        datasets: [{
          label: 'Quantité en stock',
          data: datachart1,
          backgroundColor: [
            'rgba(99, 102, 241, 0.8)',
            'rgba(59, 130, 246, 0.8)',
            'rgba(16, 185, 129, 0.8)',
            'rgba(245, 158, 11, 0.8)',
            'rgba(236, 72, 153, 0.8)'
          ],
          borderColor: [
            'rgba(99, 102, 241, 1)',
            'rgba(59, 130, 246, 1)',
            'rgba(16, 185, 129, 1)',
            'rgba(245, 158, 11, 1)',
            'rgba(236, 72, 153, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        ...chartOptions,
        plugins: {
          ...chartOptions.plugins,
          title: {
            display: false
          }
        }
      }
    });

    // Chart 2 - Monthly Flow
    new Chart(document.getElementById('chart2').getContext('2d'), {
      type: 'line',
      data: {
        labels: labelschart2,
        datasets: [
          {
            label: 'Quantité entrée',
            data: datachart2a,
            backgroundColor: 'rgba(239, 68, 68, 0.2)',
            borderColor: 'rgba(239, 68, 68, 1)',
            borderWidth: 2,
            tension: 0.3,
            fill: true,
            pointBackgroundColor: 'rgba(239, 68, 68, 1)',
            pointRadius: 4,
            pointHoverRadius: 6
          },
          {
            label: 'Quantité sortie',
            data: datachart2b,
            backgroundColor: 'rgba(59, 130, 246, 0.2)',
            borderColor: 'rgba(59, 130, 246, 1)',
            borderWidth: 2,
            tension: 0.3,
            fill: true,
            pointBackgroundColor: 'rgba(59, 130, 246, 1)',
            pointRadius: 4,
            pointHoverRadius: 6
          }
        ]
      },
      options: {
        ...chartOptions,
        plugins: {
          ...chartOptions.plugins,
          title: {
            display: false
          }
        }
      }
    });

    // Chart 3 - Material Details
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
              backgroundColor: 'rgba(16, 185, 129, 0.2)',
              borderColor: 'rgba(16, 185, 129, 1)',
              borderWidth: 2,
              tension: 0.3,
              fill: true,
              pointBackgroundColor: 'rgba(16, 185, 129, 1)',
              pointRadius: 4,
              pointHoverRadius: 6
            },
            {
              label: 'Quantité sortie',
              data: sorties,
              backgroundColor: 'rgba(245, 158, 11, 0.2)',
              borderColor: 'rgba(245, 158, 11, 1)',
              borderWidth: 2,
              tension: 0.3,
              fill: true,
              pointBackgroundColor: 'rgba(245, 158, 11, 1)',
              pointRadius: 4,
              pointHoverRadius: 6
            }
          ]
        },
        options: {
          ...chartOptions,
          plugins: {
            ...chartOptions.plugins,
            title: {
              display: false
            }
          }
        }
      });
    }

    // Chart 4 - Quantity by Employee
    const chart4Ctx = document.getElementById('chart4').getContext('2d');
    let chart4Instance = null;

    function updateEmployeeChart(mois) {
      const data = labelschart4[mois];
      if (!data) return;

      const labels = data.map(item => item.employer);
      const employer = data.map(item => item.quantite_prix);

      if (chart4Instance) chart4Instance.destroy();

      chart4Instance = new Chart(chart4Ctx, {
        type: 'doughnut',
        data: {
          labels: labels,
          datasets: [{
            data: employer,
            backgroundColor: [
              'rgba(99, 102, 241, 0.8)',
              'rgba(59, 130, 246, 0.8)',
              'rgba(16, 185, 129, 0.8)',
              'rgba(245, 158, 11, 0.8)',
              'rgba(236, 72, 153, 0.8)',
              'rgba(139, 92, 246, 0.8)',
              'rgba(20, 184, 166, 0.8)'
            ],
            borderColor: 'rgba(255, 255, 255, 0.5)',
            borderWidth: 1,
            cutout: '70%'
          }]
        },
        options: {
          ...chartOptions,
          plugins: {
            ...chartOptions.plugins,
            legend: {
              position: 'right',
              labels: {
                boxWidth: 12,
                padding: 16,
                usePointStyle: true
              }
            },
            title: {
              display: false
            }
          }
        }
      });
    }

    // Event Listeners
    document.getElementById('materielSelect').addEventListener('change', function() {
      updateChart3(this.value);
    });

    document.getElementById('moisSelect').addEventListener('change', function() {
      updateEmployeeChart(this.value);
    });

    // Initialize first charts
    const firstMaterial = document.getElementById('materielSelect').options[1]?.value;
    if (firstMaterial) updateChart3(firstMaterial);

    const firstMonth = document.getElementById('moisSelect').options[1]?.value;
    if (firstMonth) updateEmployeeChart(firstMonth);
  </script>
</body>
</html>
