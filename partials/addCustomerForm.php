<dialog id="add-customer-form">
    <section>
        <h2>Add Customer</h2>
        <button id="add-customer-btn-close" type="button">X</button>
    </section>
    <form action="./scripts/addCustomer.php" method="post">
        <label for="company-name">
            Company Name
            <input type="text" name="company-name" id="company-name" required>
        </label>
        <label for="contact-name">
            Contact Name
            <input type="text" name="contact-name" id="contact-name">
        </label>
        <label for="contact-title">
            Contact Title
            <input type="text" name="contact-title" id="contact-title">
        </label>
        <label for="address">
            Address
            <input type="text" name="address" id="address">
        </label>
        <label for="city">
            City
            <input list="cities" name="city" id="city">

            <datalist id="cities">
                <?php foreach ($cities as $city) : ?>
                    <option value="<?= $city['City'] ?>">
                    <?php endforeach; ?>
            </datalist>
        </label>
        <label for="postal">
            Postal Code
            <input type="text" name="postal" id="postal">
        </label>
        <label for="region">
            Region
            <input list="regions" name="region" id="region">

            <datalist id="regions">
                <?php foreach ($regions as $region) : ?>
                    <option value="<?= $region['Region'] ?>">
                    <?php endforeach; ?>
            </datalist>
        </label>
        <label for="country">
            Country
            <input list="countries" name="country" id="country">

            <datalist id="countries">
                <?php foreach ($countries as $country) : ?>
                    <option value="<?= $country['Country'] ?>">
                    <?php endforeach; ?>
            </datalist>
        </label>
        <label for="phone">
            Phone
            <input type="tel" name="phone" id="phone">
        </label>
        <label for="fax">
            Fax
            <input type="tel" name="fax" id="fax">
        </label>
        <button type="submit">
            Submit
        </button>
    </form>
</dialog>