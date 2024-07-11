<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiry Form - AutoGallery</title>
    <link rel="stylesheet" href="assets/css/enquiryform.css">
</head>
<body>
<div class="blurred-bg"></div>
<div class="form-container body-content">
    <section id="enquiryForm">
        <h2>Car Enquiry Form</h2>
        <form class="form" action="#" method="post">
            <div class="form-group">
                <label>
                    <input type="radio" name="enquiryType" value="buy" onclick="toggleFormState(false)"> I want to buy a
                    car
                </label>
                <label>
                    <input type="radio" name="enquiryType" value="sell" onclick="toggleFormState(true)"> I want to sell
                    a car
                </label>
            </div>
            <div class="form-group">
                <label for="carType">Type of Car:</label>
                <select id="carType" name="carType" disabled>
                    <option value="sedan">Sedan</option>
                    <option value="suv">SUV</option>
                    <option value="coupe">Coupe</option>
                    <option value="sports">Sports Car</option>
                </select>
            </div>
            <div class="form-group">
                <!--                <label for="name">Your Name:</label>-->
                <input type="text" id="name" name="name" placeholder="Your Name" disabled>
            </div>
            <div class="form-group">
                <!--                <label for="enquiryText">Enquiry:</label>-->
                <textarea id="enquiryText" name="enquiryText" rows="4" disabled placeholder="Enquiry"></textarea>
            </div>
            <div class="form-group" id="termsCheckboxContainer">
                <input type="checkbox" id="termsCheckbox" name="termsCheckbox" disabled>
                <label for="termsCheckbox">
                    I agree to the Terms and Conditions
                </label>
            </div>
            <div id="form-submit-btn-container">
                <button type="submit" class="form-submit-btn" id="submitBtn" disabled>Submit</button>
            </div>
        </form>
    </section>
</div>

<script>
    function toggleFormState(isFirstRadioSelected) {
        document.getElementById("carType").disabled = isFirstRadioSelected;
        document.getElementById("name").disabled = isFirstRadioSelected;
        document.getElementById("enquiryText").disabled = isFirstRadioSelected;
        document.getElementById("termsCheckbox").disabled = isFirstRadioSelected;
        document.getElementById("submitBtn").disabled = isFirstRadioSelected;
    }
</script>
</body>
</html>