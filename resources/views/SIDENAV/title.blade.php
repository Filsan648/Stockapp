<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: '#3B82F6',
            dark: '#1E293B'
          },
          fontFamily: {
            sans: ['Inter var', 'system-ui', 'sans-serif']
          }
        }
      }
    }
  </script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
  </style>
</head>
<body class="bg-gray-50 font-sans">
  <!-- Top Navigation Bar -->
  <header class="bg-white shadow-sm">
    <div class="flex justify-between items-center px-6 py-3">
      <!-- Logo -->
      <div class="flex items-center space-x-4">
        <img src="image/icons/logo.png" class="h-10" alt="Dashboard Logo">
      </div>

      <!-- User Profile -->
      <div class="flex items-center space-x-4">
        <div class="text-right hidden sm:block">
          <p class="text-sm font-medium text-gray-800">Filsan Fouad</p>
          <p class="text-xs font-light text-gray-500">Administrator</p>
        </div>
        <div class="relative">
          <div class="h-10 w-10 rounded-full bg-primary flex items-center justify-center text-white font-semibold">
            FF
          </div>
        </div>
      </div>
    </div>
  </header>
</body>
</html>
