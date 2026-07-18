<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon -->
    <link
        rel="shortcut icon"
        href="{{ asset('customer/assets/images/logo/favicon.ico') }}"
        type="image/x-icon"
    />

    <!-- Customer CSS -->
    <link rel="stylesheet" href="{{ asset('customer/assets/style.css') }}">

    <!-- Swiper CSS -->
    <link 
        rel="stylesheet" 
        href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
    />

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: "#da373d",
                    },
                },
            },
        };
    </script>

      <title>eCommerece</title>