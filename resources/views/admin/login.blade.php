<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - MOLPSG</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <div class="bg-blue-600 text-white px-6 py-4 rounded-lg inline-block">
                    <span class="text-2xl font-bold">MOLPSG</span>
                </div>
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                    Admin Access
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    Enter admin password to continue
                </p>
            </div>
            
            <form class="mt-8 space-y-6" method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <label for="password" class="sr-only">Admin Password</label>
                        <input id="password" name="password" type="password" required 
                               class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500 focus:z-10 sm:text-sm" 
                               placeholder="Enter admin password">
                    </div>
                </div>

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Access Admin
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>