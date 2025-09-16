bible-api/
├── index.html       # Frontend (UI)
├── style.css        # Frontend styling
├── api.php          # PHP API (GET + POST)
└── bible_api.sql    # SQL script (DB + sample data)

--------------------------------
Features

GET random verse from the database
POST new verse into the database
Frontend UI with:
Button to generate random verse
Form to add a new 
-------------------
🛠️ Requirements
XAMPP
 (Apache + MySQL + PHP)
Browser (Chrome, Edge, Firefox, etc.)

⚙️ Setup Instructions
1. Import Database
Open phpMyAdmin (http://localhost/phpmyadmin
).

Create a new database:
CREATE DATABASE bible_api;


Import the file bible_api.sql.
2. Place Project in XAMPP
Copy the bible-api folder into:
C:/xampp/htdocs/


The structure should look like:
C:/xampp/htdocs/bible-api/
├── index.html
├── style.css
├── api.php
└── bible_api.sql

3. Start XAMPP

Open XAMPP Control Panel.

Start Apache and MySQL.

4. Access the App

Open your browser and go to:

http://localhost/bible-api/index.html

🔗 API Endpoints
➡️ GET random verse
GET /bible-api/api.php


Response:
{
  "id": 1,
  "book": "John",
  "chapter": 3,
  "verse": 16,
  "text": "For God so loved the world..."
}

➡️ POST new verse
POST /bible-api/api.php
Content-Type: application/json


Request body:
{
  "book": "Romans",
  "chapter": 8,
  "verse": 28,
  "text": "And we know that in all things God works for the good..."
}


Response:
{
  "success": "Verse added successfully"
}

🎨 Frontend Usage
Click "Get Random Verse" → fetches and displays a verse.
Fill the form → submit a new verse to the DB.

📌 Notes
Default XAMPP user: root
Default password: (empty)
Edit api.php if your DB user/pass is different.