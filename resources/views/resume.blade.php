<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --background-color: #f4f6f9;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: var(--secondary-color);
            background-color: var(--background-color);
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 40px;
            padding: 20px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .profile-info {
            color: white;
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid white;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
        }

        h2 {
            font-size: 1.8em;
            margin-bottom: 15px;
            color: var(--primary-color);
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 5px;
        }

        .section {
            background-color: white;
            margin-bottom: 30px;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        ul {
            list-style-type: none;
        }

        ul li::before {
            content: "▹";
            color: var(--primary-color);
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }

        .skills, .hobbies {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .skill-tag, .hobby-tag {
            background-color: var(--primary-color);
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.9em;
        }

        .hobby-tag {
            background-color: var(--secondary-color);
        }

        @media (max-width: 768px) {
            header {
                flex-direction: column;
                text-align: center;
            }

            .profile-picture {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
        <img src="/alexis.jpg" alt="" class="profile-picture">


            <div class="profile-info">
                <h1>{{ $resume->name }}</h1>
                <p>{{ $resume->job_title }}</p>
            </div>
        </header>

        <div class="section">
            <h2>About Me</h2>
            <p>{{ $resume->about }}</p>
        </div>

        <div class="section">
            <h2>Contact</h2>
            <p>📧 {{ $resume->email }}</p>
            <p>📱 {{ $resume->phone }}</p>
            <p>📍 {{ $resume->location }}</p>
        </div>

        <div class="section">
    <h2>Education</h2>
    <ul>
        @foreach (explode(';', $resume->education) as $eduEntry)
            @php
                // Split degree and institution from the entry
                $eduParts = explode(',', trim($eduEntry));
                $degree = $eduParts[0] ?? ''; 
                $institution = isset($eduParts[1]) ? trim($eduParts[1]) : ''; 
            @endphp
            <li>
                <strong>{{ trim(e($degree)) }}</strong><br>
                {{ trim(e($institution)) }}
            </li>
        @endforeach
    </ul>
</div>


        <div class="section">
            <h2>Skills</h2>
            <div class="skills">
                @foreach (explode(',', $resume->skills) as $skill)
                    <span class="skill-tag">{{ trim($skill) }}</span>
                @endforeach
            </div>
        </div>

        <div class="section">
            <h2>Hobbies</h2>
            <div class="hobbies">
                @foreach (explode(',', $resume->hobbies) as $hobby)
                    <span class="hobby-tag">{{ trim($hobby) }}</span>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
