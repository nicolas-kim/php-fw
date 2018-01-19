<form class="form-register" method="post">
    <h2 class="form-register-heading">Register</h2>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus value="<?= $_email ?>">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <label for="inputPasswordBis" class="sr-only">Type it again</label>
    <input type="passwordBis" name="passwordBis" id="inputPasswordBis" class="form-control" placeholder="PasswordBis" required>
    <label for="inputPhone" class="sr-only">Phone number</label>
    <input type="phone" name="phone" id="inputPhone" class="form-control" placeholder="Phone">
    <label for="inputLastName" class="sr-only">Last Name</label>
    <input type="lastName" name="lastName" id="inputLastName" class="form-control" placeholder="LastName" required>
    <label for="inputFirstName" class="sr-only">First Name</label>
    <input type="firstName" name="firstName" id="inputFirstName" class="form-control" placeholder="FirstName" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>
