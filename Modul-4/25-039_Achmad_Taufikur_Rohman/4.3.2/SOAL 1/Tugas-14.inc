<form action="Tugas-11.php" method="POST">
    <div class="field">
        <label for="surname">Username</label>
        <input type="text" name="surname"/>
    </div>

    <div class="field">
        <label for="email">Email address</label>
        <input type="email" name="email"/>
    </div>

    <div class="field">
        <label for="password">Password</label>
        <input type="password" name="password"/>
    </div>

    <div class="field">
        <label for="address">Address</label>
        <textarea name="address" rows="3" cols="30"></textarea>
    </div>

    <div class="field">
        <label for="country">Country</label>
        <select name="country">
            <option value="">-- choose your country --</option>
            <option value="Australian Capital Territory">Australia</option>
            <option value="Queensland">China</option>
            <option value="New South Wales">Indonesia</option>
        </select>
    </div>

    <div class="field">
        <label for="gender">Gender</label>
        <input type="radio" name="gender" value="Male">Male
        <input type="radio" name="gender" value="Female">Female
    </div>

    <div class="field">
        <label for="vegetarian">Vegetarian?</label>
        <input type="checkbox" name="vegetarian" value="Yes">
    </div>

    <div class="button">
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </div>

</form>