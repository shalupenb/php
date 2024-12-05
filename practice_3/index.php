<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            display: flex;
            justify-content: space-between;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input, select, textarea, button {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="radio"], input[type="checkbox"] {
            width: auto;
            margin-right: 5px;
        }
        .form-section {
            width: 48%;
        }
        .gender-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .gender-group label {
            margin: 0;
            font-weight: normal;
        }
        .agreement-group {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .buttons {
            margin-top: 20px;
        }
        button {
            width: auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<form action="handler.php" method="post" enctype="multipart/form-data">
    <div class="container">

        <div class="form-section">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="John Doe" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="johndoe@example.com" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label>Gender</label>
                <div class="gender-group">
                    <input type="radio" id="male" name="gender" value="male" required>
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>
                </div>
            </div>
            <div class="form-group">
                <label for="birthdate">Birthdate</label>
                <input type="date" id="birthdate" name="birthdate">
            </div>
            <div class="form-group">
                <label>Contacts</label>
                <select name="contact_type">
                    <option value="Skype">Skype</option>
                    <option value="Other">Other</option>
                </select>
                <input type="text" name="contact_value" placeholder="Enter contact">
            </div>
        </div>

        <div class="form-section">
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="file" id="photo" name="photo">
            </div>
            <div class="form-group">
                <label for="hobbies">Hobbies</label>
                <select id="hobbies" name="hobbies[]" multiple>
                    <option value="Movies">Movies</option>
                    <option value="Music">Music</option>
                    <option value="Cooking">Cooking</option>
                    <option value="Photography">Photography</option>
                </select>
            </div>
            <div class="form-group">
                <label for="some_words">Some words</label>
                <textarea id="some_words" name="some_words" rows="4"></textarea>
            </div>
            <div class="form-group agreement-group">
                <label for="agreement">Agreement</label>
                <input type="checkbox" id="agreement" name="agreement" value="1">
            </div>
            <div class="buttons">
                <button type="submit">Update profile</button>
                <button type="button">Next</button>
            </div>
        </div>
    </div>
</form>
</body>
</html>
