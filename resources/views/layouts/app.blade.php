
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Posts App')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    @include('layouts.header')

    <main>

        @if(session('success'))
            <div id="notification" class="notification">
                <span class="notification-message">{{ session('success') }}</span>
                <button class="close-button" onclick="closeNotification()">✖</button>
            </div>
        @endif

        @yield('content')
    </main>

    @include('layouts.footer')
    <script>
        // Function to display the notification
        function showNotification() {
            document.getElementById('notification').style.display = 'block';

            setTimeout(function() {
                closeNotification();
            }, 5000);
        }

        // Function to close the notification
        function closeNotification() {
            document.getElementById('notification').style.display = 'none';
        }

        window.onload = function() {
        showNotification();
    };
    </script>
</body>
</html>
