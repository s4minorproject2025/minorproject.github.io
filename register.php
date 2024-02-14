<!DOCTYPE html>
<html>

<head>
    <title>Enter Patient Details</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Prompt:wght@100&display=swap');

        .box {
            border-radius: 5px;
            background: linear-gradient(to right, #0078FF, #0400CE);
            box-shadow: 0 4px 8px rgba(0, 140, 129, 0.1);
            padding: 50px;
            margin: 50px;
            height: justify;
            display: flex;
            align-items: center;
        }

        .box-form {
            border-radius: 5px;
            background: linear-gradient(to left, #DEDEDE, #FFFFFF);
            box-shadow: 0 4px 8px rgba(0, 140, 129, 0.1);
            padding: 50px;
            margin: 50px;
            height: justify;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            font-family: 'Prompt', sans-serif;
        }

        .name,
        .number,
        .dob,
        .gender,
        .email,
        .district,
        .locality {
            display: flex;
            margin-bottom: 15px;
            align-items: center;
        }

        .name a,
        .number a,
        .dob a,
        .gender a,
        .email a,
        .district a,
        .locality a {
            margin-right: 10px;
        }

        .name-input,
        .number-input,
        .dob-input,
        .gender-options,
        .email-input,
        .district-input,
        .locality-input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #87ceeb;
            border-radius: 4px;
        }

        .gender-options label {
            margin-right: 10px;
        }

        .buttons {
            display: flex;
            gap: 100px;
        }

        .buttons button {
            padding: 10px 20px;
            border-radius: 20px;
            background-color: #1e90ff;
            border: none;
            color: white;
            cursor: pointer;
        }

        .buttons button:hover {
            background-color: #0078ff;
        }
    </style>
    <script>
        function updateLocalityDropdown() {
            var districtDropdown = document.getElementById("district");
            var localityDropdown = document.getElementById("locality");

            localityDropdown.innerHTML = '<option value="">Select Locality</option>';

            if (districtDropdown.value === "Thrissur") {
                var thrissurLocalities = ["Kunnamkulam", "Kolazhi", "Vadanappilly"];
                thrissurLocalities.forEach(function (locality) {
                    var option = document.createElement("option");
                    option.value = locality;
                    option.text = locality;
                    localityDropdown.appendChild(option);
                });
            }
        }

        function resetForm() {
            document.getElementById("patient-form").reset();
        }

        function submitForm() {
            // Form submission using AJAX or other methods can be added here
            alert("Form submitted!");
        }
    </script>
</head>

<body>

    <div class="box">
        <form id="patient-form" method="POST">
            <div class="box-form">
                <div class="name">
                    <a>Name :</a>
                    <div class="name-input">
                        <input type="text" placeholder="patient name" name="patient-name">
                    </div>
                </div>
                <div class="dob">
                    <a> Date of Birth:</a>
                    <div class="dob-input">
                        <input type="date" name="dob" required>
                    </div>
                </div>
                <div class="gender">
                    <a> Gender:</a>
                    <div class="gender-options">
                        <label for="male"><input type="radio" id="male" name="gender" value="male" required> Male</label>
                        <label for="female"><input type="radio" id="female" name="gender" value="female" required> Female</label>
                    </div>
                </div>
                <div class="number">
                    <a> Number :</a>
                    <div class="number-input">
                        <input type="number" placeholder="enter your number" name="patient-number">
                    </div>
                </div>
                <div class="email">
                    <a> Email:</a>
                    <div class="email-input">
                        <input type="email" name="email" placeholder="Enter your email" required>
                    </div>
                </div>
                <div class="district">
                    <a> choose district :</a>
                    <div class="district-input">
                        <select id="district" name="district" onchange="updateLocalityDropdown()">
                            <option value="Thiruvananthapuram">Thiruvananthapuram</option>
                            <option value="Kollam">Kollam</option>
                            <option value="Alappuzha">Alappuzha</option>
                            <option value="Pathanamthitta">Pathanamthitta</option>
                            <option value="Kottayam">Kottayam</option>
                            <option value="Idukki">Idukki</option>
                            <option value="Ernakulam">Ernakulam</option>
                            <option value="Thrissur">Thrissur</option>
                            <option value="Palakkad">Palakkad</option>
                            <option value="Malappuram">Malappuram</option>
                            <option value="Kozhikode">Kozhikode</option>
                            <option value="Wayanad">Wayanad</option>
                            <option value="Kannur">Kannur</option>
                            <option value="Kasaragod">Kasaragod</option>
                        </select>
                    </div>
                </div>
                <div class="locality">
                    <a> choose locality :</a>
                    <div class="locality-input">
                        <select id="locality" name="locality"> 
                            <option value="">Select Locality</option> </select>
                    </div>
                </div>
                <div class="buttons">
                    <div class="reset" onclick="resetForm()">
                        <button type="button">Reset</button>
                    </div>
                    <div class="submit" onclick="submitForm()">
                        <button type="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
        

    <?php
    include('connection.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $patientName = $_POST['patient-name'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $patientNumber = $_POST['patient-number'];
        $email = $_POST['email'];
        $district = $_POST['district'];
        $locality = $_POST['locality'];

        $sql = "INSERT INTO patients (patient_name, dob, gender, patient_number, email, district, locality)
                VALUES ('$patientName', '$dob', '$gender', '$patientNumber', '$email', '$district', '$locality')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Data inserted successfully!</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>

</body>

</html>
