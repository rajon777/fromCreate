<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font
    -awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9
    /2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- bootstrap link -->

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"> -->

    <link rel="stylesheet" href="style.css">
    <style>

    </style>
</head>

<body>

    <!-- Register Form -->
    <div class="container border-solid border-2 lg:w-2/4 mx-auto mt-20  rounded-lg border-green-700 shadow-lg">
        <div class="bg-green-700 py-2">
            <h1 class="text-4xl mb-5 text-center text-white">Register Now</h1>
        </div>
        <div class="mt-4 mx-2">
        <?php if (isset($_SESSION['success'])) { ?>
            <div role="alert" class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Users Registation Successfull!</span>
            </div>

        <?php } unset($_SESSION['success']); ?>
        </div>
        <div class="p-5">
            <form action="register_post.php" method="POST">
                <?php
                if (isset($_SESSION['fast_name'])) {
                    $fast_name = $_SESSION['fast_name'];
                } else {
                    $fast_name = '';
                } ?>
                <div class="mb-3">
                    <!-- Fast Name -->
                    <h4 class="text-white mb-2">Enter Your Fast Name:</h4>
                    <label class="input input-bordered flex items-center mb-2  gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="h-4 w-4 opacity-70">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                        </svg>
                        <input type="text" class="grow text-white" name="fast_name" value="<?= $fast_name ?>" placeholder="Fast name" />
                    </label>
                    <?php
                    if (isset($_SESSION['fname_err'])) { ?>
                        <strong class="text-red-500"><?= $_SESSION['fname_err'] ?></strong>
                    <?php }
                    unset($_SESSION['fname_err']) ?>
                </div>
                <div class="mb-3">
                    <?php if (isset($_SESSION['last_name'])) {
                        $last_name = $_SESSION['last_name'];
                    } else {
                        $last_name = '';
                    } ?>
                    <!-- Last Name -->
                    <h4 class="text-white mb-2">Enter Your Last Name:</h4>
                    <label class="input input-bordered flex items-center mb-2   gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="h-4 w-4 opacity-70">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" />
                        </svg>
                        <input type="text" class="grow text-white" name="last_name" value="<?= $last_name ?>" placeholder="Last name" />

                    </label>
                    <?php
                    if (isset($_SESSION['lname_err'])) { ?>
                        <strong class="text-red-500"><?= $_SESSION['lname_err'] ?></strong>
                    <?php }
                    unset($_SESSION['lname_err']) ?>

                </div>
                <div class="mb-3">
                    <?php if (isset($_SESSION['email'])) {
                        $email = $_SESSION['email'];
                    } else {
                        $email = '';
                    }
                    ?>
                    <!-- Email -->
                    <h4 class="text-white mb-2">Enter Your Email:</h4>
                    <label class="input input-bordered flex items-center mb-2  gap-2 ">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="h-4 w-4 opacity-70">
                            <path d="M2.5 3A1.5 1.5 0 0 0 1 4.5v.793c.026.009.051.02.076.032L7.674 8.51c.206.1.446.1.652 0l6.598-3.185A.755.755 0 0 1 15 5.293V4.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                            <path d="M15 6.954 8.978 9.86a2.25 2.25 0 0 1-1.956 0L1 6.954V11.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V6.954Z" />
                        </svg>
                        <input type="text" class="grow text-white" name="email" value="<?= $email ?>" placeholder="Email" />

                    </label>
                    <?php
                    if (isset($_SESSION['email_err'])) { ?>
                        <strong class="text-red-500"><?= $_SESSION['email_err'] ?></strong>

                    <?php }
                    unset($_SESSION['email_err']) ?>

                    </label>
                </div>
                <div class="mb-3">
                    <?php if (isset($_SESSION['comments'])) {
                        $comments = $_SESSION['comments'];
                    } else {
                        $comments = '';
                    }
                    ?>
                    <!-- Comments -->
                    <h4 class="text-white mb-2">Comments:</h4>

                    <label>
                        <textarea name="comments" placeholder="Comments" class="textarea textarea-bordered textarea-xs w-full"></textarea>

                    </label>
                    <?php
                    if (isset($_SESSION['cmmt_err'])) { ?>
                        <strong class="text-red-500"><?= $_SESSION['cmmt_err'] ?></strong>


                    <?php }
                    unset($_SESSION['cmmt_err']) ?>

                </div>
                <div class="mb-3 ">
                    <?php if (isset($_SESSION['password'])) {
                        $password = $_SESSION['password'];
                    } else {
                        $password = '';
                    }
                    ?>
                    <!-- Password  -->
                    <h4 class="text-white mb-2">Enter Your Password:</h4>
                    <label class="input input-bordered flex items-center mb-2  gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-4 w-4 opacity-70">
                            <path d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z" clip-rule="evenodd" />
                        </svg>
                        <input type="password" class="grow text-white" name="password" id="pass" value="<?= $password ?>" placeholder="password" />
                        <svg id="show" class="h-4 w-4" fill="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">

                            <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                        </svg>

                    </label>
                    <?php
                    if (isset($_SESSION['pass_err'])) { ?>
                        <strong class="text-red-500"><?= $_SESSION['pass_err']; ?></strong>
                    <?php  }
                    unset($_SESSION['pass_err']) ?>


                </div>
                <div class="mb-3">
                    <?php if (isset($_SESSION['confirm_password'])) {
                        $confirm_password = $_SESSION['confirm_password'];
                    } else {
                        $confirm_password = '';
                    }
                    unset($_SESSION['confirm_password']);

                    ?>
                    <!-- Confirm Password -->
                    <h4 class="text-white mb-2">Confirm Password:</h4>
                    <label class="input input-bordered flex items-center mb-2  gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-4 w-4 opacity-70">
                            <path d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z" clip-rule="evenodd" />
                        </svg>
                        <input type="password" class="grow text-white" name="confirm_password" id="pass" value="<?= $confirm_password ?>" placeholder="password" />
                    </label>
                    <?php
                    if (isset($_SESSION['compass_err'])) { ?>
                        <strong class="text-red-500"><?= $_SESSION['compass_err']; ?></strong>
                    <?php  }
                    unset($_SESSION['compass_err']) ?>
                </div>
                <!-- Country Select -->
                <div class="mb-3">
                    <?php if (isset($_SESSION['country'])) {
                        $country = $_SESSION['country'];
                    } else {
                        $country = '';
                    }
                    unset($_SESSION['country']);
                    ?>

                    <div class="mb-2 input-bordered ">
                        <select class="px-5 py-2 rounded-lg" name="country" class="form-control">
                            <option value="">--Select Your Country--</option>
                            <option value="BAN" <?= ($country == 'BAN') ? 'selected' : '' ?>>BAN</option>
                            <option value="USA" <?= ($country == 'USA') ? 'selected' : '' ?>>USA</option>
                            <option value="IND" <?= ($country == 'IND') ? 'selected' : '' ?>>IND</option>
                            <option value="AUS" <?= ($country == 'AUS') ? 'selected' : '' ?>>AUS</option>
                        </select>
                    </div>
                    <?php
                    if (isset($_SESSION['cty_err'])) { ?>
                        <strong class="text-red-500"><?= $_SESSION['cty_err']; ?></strong>
                    <?php }
                    unset($_SESSION['cty_err']) ?>

                </div>
                <!-- Gender chack -->
                <div class="mb-3">
                    <?php if (isset($_SESSION['gender'])) {
                        $gender = $_SESSION['gender'];
                    } else {
                        $gender = '';
                    }
                    unset($_SESSION['gender']);
                    ?>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" <?= ($gender == 'male') ? 'checked' : '' ?> name="gender" type="radio" value="male" id="flexCheckDefault">
                            <label class="form-check-label text-white" for="flexCheckDefault">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" <?= ($gender == 'female') ? 'checked' : '' ?> name="gender" type="radio" value="female" id="flexCheckChecked">
                            <label class="form-check-label text-white" for="flexCheckChecked">
                                Female
                            </label>
                        </div>
                        <?php if (isset($_SESSION['gen_err'])) { ?>
                            <strong class="text-red-500"><?= $_SESSION['gen_err'] ?></strong>
                        <?php }
                        unset($_SESSION['gen_err']) ?>
                    </div>

                </div>
                <!-- Submit button -->
                <div>
                    <button type="submit" class="text-white btn btn-outline px-8">Submit</button>
                </div>
            </form>

        </div>



    </div>

    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <script>
        $('#show').click(function() {
            var pass = document.getElementById('pass');
            if (pass.type == 'password') {
                pass.type = 'text';
            } else {
                pass.type = 'password';
            }
        });
    </script>
</body>
</html>
<?php
unset($_SESSION['fast_name']);
unset($_SESSION['last_name']);
unset($_SESSION['email']);
unset($_SESSION['comments']);
unset($_SESSION['password']);
?>