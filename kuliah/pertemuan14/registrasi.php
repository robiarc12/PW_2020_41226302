<?php
require "function.php";


if (isset($_POST["submit"])) {
    if (registrasi($_POST) > 0) {
        echo "
        <script>
        alert('Registrasi Berhasil! 🚀');
        document.location.href = 'index.php';
        
        </script>>
        ";
    } else {
        echo "
        <script>
        alert('Registrasi gagal');
        
        </script>>
        ";
    }
}
?>

<head>
    <style>
        .gradient-custom-3 {
            /* fallback for old browsers */
            background: #9A616D;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(154, 97, 109, 0.5), rgba(180, 120, 132, 0.5));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(154, 97, 109, 0.5), rgba(180, 120, 132, 0.5));
        }

        .gradient-custom-4 {
            /* fallback for old browsers */
            background: #9A616D;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(154, 97, 109, 1), rgba(180, 120, 132, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(154, 97, 109, 1), rgba(180, 120, 132, 1));
        }


        .bg-image {
            background-size: cover;
            /* Menyesuaikan ukuran browser */
            background-position: center;
            /* Menempatkan gambar di tengah */
            background-repeat: no-repeat;
            /* Menghindari pengulangan */
            background-attachment: fixed;
            /* Background tetap saat scroll */
        }

        .card-body {
            margin: 20px 0 !important;
        }
    </style>
</head>
<section class="bg-image" style="background-image: url('img/form.jpg');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5 ">
                            <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                            <form method="post" action="">

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="text" id="username" class="form-control form-control-lg"
                                        name="username" placeholder="Username..." autofocus required />
                                    <label class="form-label" for="username">Username</label>
                                </div>


                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="password" id="password" class="form-control form-control-lg"
                                        name="password" required />
                                    <label class="form-label" for="password">Password</label>
                                </div>

                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="password" id="password-verify" class="form-control form-control-lg"
                                        name="verify" required />
                                    <label class="form-label" for="password-verify">Repeat your password</label>
                                </div>

                                <!-- <div class="form-check d-flex justify-content-center mb-5">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg"
                                        name="true" required />
                                    <label class="form-check-label" for="form2Example3g">
                                        I agree all statements in <a href="#!" class="text-body"><u>Terms of
                                                service</u></a>
                                    </label>
                                </div> -->

                                <div class="d-flex justify-content-center">
                                    <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                        class="btn btn-success btn-block btn-lg gradient-custom-4 text-body"
                                        name="submit">Register</button>
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php"
                                        class="fw-bold text-body"><u>Login here</u></a></p>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>