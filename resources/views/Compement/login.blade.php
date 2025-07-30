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
        extend: {
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
          },
          colors: {
            primary: {
              50: '#f0f9ff',
              100: '#e0f2fe',
              500: '#3b82f6',
              600: '#2563eb',
              700: '#1d4ed8',
            }
          }
        }
      }
    }
  </script>
</head>
<body class="min-h-screen bg-blue-800/60  flex justify-center items-center p-4">
  <div class="w-full max-w-md bg-white rounded-2xl shadow overflow-hidden">
    <div class="py-6 px-8">
      <h2 class="text-3xl font-bold text-primary-600  text-center">Welcome Back</h2>
      <p class=" text-black/40  text-center mt-4">Please enter your credentials to login</p>
    </div>

    <form class="p-8 space-y-6" action="{{ route('loginpost') }}" method="POST">
         @csrf
      <div class="space-y-4">
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
          <input
            type="email"
            id="email"
            placeholder="your@email.com"
            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition duration-200"
            required
          >
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
          <input
            type="password"
            id="password"
            placeholder="••••••••"
            class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-primary-500 focus:border-primary-500 outline-none transition duration-200"
            required
          >
        </div>

        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <input
              type="checkbox"
              id="remember"
              class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded"
            >
            <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
          </div>
          <a href="#" class="text-sm text-primary-600 hover:text-primary-700">Forgot password?</a>
        </div>
      </div>

      <button
        type="submit"
        class="w-full bg-primary-600 hover:bg-primary-700 text-white font-semibold py-3 px-4 rounded-lg shadow-md transition duration-200 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2"
      >
        Sign In
      </button>


    </form>
  </div>
</body>
</html>
