<!DOCTYPE html>
<html>
<head>
    <title>Helper Page</title>
    <style>
        body {
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: white;
            padding: 30px;
            box-shadow: 0 0 10px gray;
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        video, iframe {
            width: 100%;
            height: 400px;
            border-radius: 10px;
        }

        .note {
            margin-top: 20px;
            font-size: 16px;
            line-height: 1.5;
        }

        .back {
            text-align: center;
            margin-top: 20px;
        }

        a {
            color: blue;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Welcome to the Helper Page, follow instruction in video to use website susccessful</h2>

    <!-- Option 1: Embed Local Video -->
    <!--
    <video controls>
        <source src="videos/helper_guide.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    -->

    <!-- Option 2: Embed YouTube Video -->
    <iframe src="https://youtu.be/1z0ULvg_pW8?si=DI96vMh3UTWYHwTD" frameborder="0" allowfullscreen></iframe>

    <div class="note">
        <p>This video guide explains how to use our platform effectively. If you have further questions after watching, feel free to reach out via our contact page.</p>
    </div>

    <div class="back">
        <a href="home.html">← Back to Home</a>
    </div>
</div>

</body>
</html>
