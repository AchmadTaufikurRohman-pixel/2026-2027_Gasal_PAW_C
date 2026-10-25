<form action="Tugas-19.php" method="POST">

    <div class="field">
        <label for="surname">Username</label>
        <input type="text" name="surname" id="surname"
            value="<?= htmlspecialchars($_POST['surname'] ?? '') ?>">

        <?php if (isset($errors['surname'])): ?>
            <p style="color: red;">
                <?= htmlspecialchars($errors['surname']) ?>
            </p>
        <?php endif; ?>
    </div>

    <div class="field">
        <label for="email">Email address</label>
        <input type="email" name="email" id="email"
            value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">

        <?php if (isset($errors['email'])): ?>
            <p style="color: red;">
                <?= htmlspecialchars($errors['email']) ?>
            </p>
        <?php endif; ?>
    </div>

    <div class="field">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <?php if (isset($errors['password'])): ?>
            <p style="color: red;">
                <?= htmlspecialchars($errors['password']) ?>
            </p>
        <?php endif; ?>
    </div>

    <div class="field">
        <label for="address">Address</label>
        <textarea name="address" id="address" rows="3" cols="30"><?= htmlspecialchars($_POST['address'] ?? '') ?></textarea>

        <?php if (isset($errors['address'])): ?>
            <p style="color: red;">
                <?= htmlspecialchars($errors['address']) ?>
            </p>
        <?php endif; ?>
    </div>

    <div class="field">
        <label for="country">Country</label>
        <select name="country" id="country">
            <option value="">-- choose your country --</option>

            <option value="Australian Capital Territory"
                <?= ($_POST['country'] ?? '') == 'Australian Capital Territory' ? 'selected' : '' ?>>
                Australia
            </option>

            <option value="Queensland"
                <?= ($_POST['country'] ?? '') == 'Queensland' ? 'selected' : '' ?>>
                China
            </option>

            <option value="New South Wales"
                <?= ($_POST['country'] ?? '') == 'New South Wales' ? 'selected' : '' ?>>
                Indonesia
            </option>
        </select>

        <?php if (isset($errors['country'])): ?>
            <p style="color: red;">
                <?= htmlspecialchars($errors['country']) ?>
            </p>
        <?php endif; ?>
    </div>

    <div class="field">
        <label>Gender</label>

        <input type="radio" name="gender" value="Male"
            <?= ($_POST['gender'] ?? '') == 'Male' ? 'checked' : '' ?>>
        Male

        <input type="radio" name="gender" value="Female"
            <?= ($_POST['gender'] ?? '') == 'Female' ? 'checked' : '' ?>>
        Female

        <?php if (isset($errors['gender'])): ?>
            <p style="color: red;">
                <?= htmlspecialchars($errors['gender']) ?>
            </p>
        <?php endif; ?>
    </div>

    <div class="field">
        <label for="vegetarian">Vegetarian?</label>

        <input type="checkbox" name="vegetarian" id="vegetarian"
            value="Yes"
            <?= ($_POST['vegetarian'] ?? '') == 'Yes' ? 'checked' : '' ?>>
    </div>

    <div class="button">
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </div>

</form>