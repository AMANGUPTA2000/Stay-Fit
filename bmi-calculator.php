<?php include 'includes/header.php'; ?>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>BMI calculator</h2>
                        <div class="bt-option">
                            <a href="./index.php">Home</a>
                            <span>BMI calculator</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- BMI Calculator Section Begin -->
    <section class="bmi-calculator-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title chart-title">
                        <span>check your body</span>
                        <h2>BMI CALCULATOR CHART</h2>
                    </div>
                    <div class="chart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Bmi</th>
                                    <th>WEIGHT STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="point">Below 18.5</td>
                                    <td>Underweight</td>
                                </tr>
                                <tr>
                                    <td class="point">18.5 - 24.9</td>
                                    <td>Healthy</td>
                                </tr>
                                <tr>
                                    <td class="point">25.0 - 29.9</td>
                                    <td>Overweight</td>
                                </tr>
                                <tr>
                                    <td class="point">30.0 - and Above</td>
                                    <td>Obese</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-title chart-calculate-title">
                        <span>check your body</span>
                        <h2>CALCULATE YOUR BMI</h2>
                    </div>
                    <div class="chart-calculate-form">
                        <p>Body mass index is a value derived from the mass and height of a person. The BMI is defined as the body mass divided by the square of the body height, and is expressed in units of kg/m², resulting from mass in kilograms and height in metres.</p>
                        <form action="#">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Height / cm" id="height" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Weight / kg" id="weight" required>
                                </div>
                                <!-- <div class="col-sm-6">
                                    <input type="text" placeholder="Age" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" placeholder="Sex" required>
                                </div> -->
                                <div class="col-sm-6" id="bmi">
                                    <span style="color:#fff"> Your BMI is </span><input disabled value="" type="text" name="total" id="total">
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" onclick="bmi()" name="btn">Calculate</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
      function bmi() {
        var val1 = document.getElementById('height').value;
        var val2 = document.getElementById('weight').value;
        var sum = Number(val2) / (Number(val1)*Number(val1)/10000);
        var tot = sum.toFixed(2);
        document.getElementById('total').value = tot;
      }

    </script>
    <!-- BMI Calculator Section End -->
    <?php include 'includes/footer.php'; ?>