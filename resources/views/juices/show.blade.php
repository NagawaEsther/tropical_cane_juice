<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $juice->name }} | Juice Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Optional Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            background: #f2f7fa;
            padding: 20px;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .juice-image {
            width: 100%;
            max-height: 400px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .juice-name {
            font-size: 32px;
            color: #006d77;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .juice-description {
            font-size: 18px;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .juice-price {
            font-size: 22px;
            font-weight: bold;
            color: #028090;
            margin-bottom: 20px;
        }

        .back-link {
            display: inline-block;
            text-decoration: none;
            color: white;
            background-color: #0077b6;
            padding: 10px 18px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .back-link:hover {
            background-color: #023e8a;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ asset('storage/' . $juice->image) }}" alt="{{ $juice->name }}" class="juice-image">

        <h1 class="juice-name">{{ ucfirst(str_replace('_', ' ', $juice->name)) }}</h1>

        <p class="juice-description">{{ $juice->description }}</p>

        <p class="juice-price">UGX {{ number_format($juice->price) }}</p>

        <a href="{{ route('juices.index') }}" class="back-link">← Back to Juice List</a>
    </div>
</body>
</html>
