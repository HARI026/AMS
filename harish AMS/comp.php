<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="comp.css">
    <title>Complaint Form</title>
    
</head>
<body>

    <form action="complaint.php" method="POST">
        <h2>Say your issue's</h2>
        <label for="name">Enter your name:</label>
        <input type="text" id="name" name="name" required>

           <label for="email">Enter your Email ID:</label>
        <input type="text" id="email" name="email" required>
        
        <label for="apartment_name">Apartment Name:</label>
        <select name="apartment_name" required>
            <option>---Select---</option>
            <option>AMS Apartment</option>
            <option>Golden Apartment</option>
            <option>MG Apartment</option>
            <option>Gk Apartment</option>
        </select>
        
        
        
        <label for="apartment_location">Location:</label>
        <select name="apartment_location" required>
            <option>---Select---</option>
            <option>Kallakurichi</option>
            <option>Chennai</option>
            <option>Trichy</option>
            <option>Villupuram</option>
        </select>

     

        <label for="apartment-number">Apartment Number:</label>
        <input type="number" id="apartment-number" name="apartment-number" required><br>
        
        <label for="contact-number">Contact Number:</label>
        <input type="number" id="contact-number" name="contact-number" required><br>
        
        <label for="issues">Issues:</label>
        <textarea id="issues" name="issues" rows="4" required></textarea><br><br>
        
        <button type="submit">SUBMIT</button>
    </form>

</body>
</html>
