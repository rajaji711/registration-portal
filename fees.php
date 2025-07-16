<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FEES</title>
</head>
<body>
    <style>
        body{
            align-items: center;
            justify-content: center;
            padding: 200px;
            background-image: url('currency.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }
        .contact-form{
            position: relative;
            max-width: 400px;
            height: 200px;
            margin: auto;
            border-radius: 10px;
            background-color: rgb(251, 246, 240);
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            font-size: 1rem;
        }
        select{
            width: 100%;
            padding: 15px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .select-box select{
            font-size: 1rem;
        }
        button{
            background-color: rgb(237, 134, 60);
            width: 60%;
            height: 30px;
            padding :6px;
            position: relative;
            margin: 20px;
            left: 75px;
            font-size: 18px;
    
        }
        .button:hover{
            background-color: rgb(235, 107, 51);
        }
    </style>
    <div class="contact-form">
        <form action="process_payment.php" method="POST">
            <h2>FEES TYPE:</h2>
            <div class="select-box">
            <select id="fees" name="fees">
                <option hidden>Select Fees Type</option>
                <option value="collegefees">COLLEGE FEES</option>
                <option value="messfees">MESS FEES</option>
                <option value="otherfees">OTHER FEES</option>
            </select>
            </div>
            <button class="button" type="submit">PROCEED</button>
        </form>
    </div>
</body>
</html>