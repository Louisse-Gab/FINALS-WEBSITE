<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Agreement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f3e5;
            color: #333;
            padding: 20px;
            margin: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #000;
        }
        .question {
            margin: 20px 0;
        }
        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .submit {
            background-color: #FBBF24;
            color: white;
        }
        .back {
            background-color: #ccc;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>AGREEMENT</h1>
    
    <div class="question">
        <label>Do you agree to undergo the adoption process in all its steps?</label><br>
        <input type="radio" name="adoption_process" value="yes" required> Yes<br>
        <input type="radio" name="adoption_process" value="no"> No<br>
    </div>

    <div class="question">
        <label>Do you ensure that all the information that you have shared in this form and all the information you will share going forward will all be true?</label><br>
        <input type="radio" name="information_truth" value="yes" required> Yes<br>
        <input type="radio" name="information_truth" value="no"> No<br>
    </div>

    <div class="question">
        <label>I understand that in the submission of this form, I am granting Shelter of Light to use my answers here for the sake of the adoption application process.</label><br>
        <input type="checkbox" name="agreement" value="agree" required> Agree<br>
        <input type="checkbox" name="agreement" value="disagree"> Disagree<br>
    </div>

    <div class="buttons">
    <button class="back" onclick="window.location.href='adoption-form-3.php'">BACK</button>
    <button class="submit">SUBMIT</button>
</div>
</div>

</body>
</html>
