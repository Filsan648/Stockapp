<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Formulaire Matériel</title>

</head>
<body class="min-h-screen flex items-center justify-center  bg-gray-100 font-sans ">

<canvas id="chart1" class="w-full max-w-xl h-64 bg-white p-4 rounded shadow"></canvas>
<canvas id="chart2"></canvas>
<div>
<canvas id="chart3"></canvas>
<form>
<label> Materiel </lable>
    <select>  <option> Materiel </option>
        @foreach ( $Stocks->stock_materiel as $Stock)
{{dd( $Stock)}}
        @endforeach

    </select>

</form>
</div>
<canvas id="chart4"></canvas>

</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

const chart1 = document.getElementById('chart1').getContext('2d');
const chart2 = document.getElementById('chart2').getContext('2d');
const chart3 = document.getElementById('chart3').getContext('2d');

    const labelschart1 = {!! json_encode(collect($materiel_stock)->pluck('materiel')) !!};
    const datachart1 = {!! json_encode(collect($materiel_stock)->pluck('quantite')) !!};

    const labelschart2 = {!! json_encode(collect($stock_entree)->pluck('month')) !!};
    const datachart2a = {!! json_encode(collect($stock_entree)->pluck('quantite_entree')) !!};
    const datachart2b ={!! json_encode(collect($stock_entree)->pluck('quantite_sorti')) !!};

    const labelschart3 = {!! json_encode(collect($Stocks)->pluck('monthsstock')) !!};
    const datachart3a = {!! json_encode(collect($Stocks)->pluck('stock_quantitesorti')) !!};
    const datachart3b ={!! json_encode(collect($Stocks)->pluck('stock_quantiteentree')) !!};



    new Chart(chart1, {
      type: 'bar',
      data: {
        labels: labelschart1,
        datasets: [{
          label: 'Quantité sortie',
          data: datachart1,
          backgroundColor: 'rgba(255, 99, 132, 0.5)',
          borderColor: 'rgba(255, 99, 132, 1)',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });



    new Chart(chart2, {
  type: 'bar',
  data: {
    labels: labelschart2,
    datasets: [
      {
        label: 'Quantité entrée',
        data: datachart2a,
        backgroundColor: 'rgba(54, 162, 235, 0.5)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
      },
      {
        label: 'Quantité sortie',
        data: datachart2b,
        backgroundColor: 'rgba(255, 99, 132, 0.5)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1
      }
    ]
  },
  options: {
    responsive: true,
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});



new Chart(chart3, {
  type: 'bar',
  data: {
    labels: labelschart3,
    datasets: [
      {
        label: 'Quantité entrée',
        data: datachart3a,
        backgroundColor: 'rgba(54, 162, 235, 0.5)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
      },
      {
        label: 'Quantité sortie',
        data: datachart3b,
        backgroundColor: 'rgba(255, 99, 132, 0.5)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1
      }
    ]
   },
    options: {
    responsive: true,
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
})
    </script>

</html>
