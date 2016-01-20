<?php foreach($arrCities as $city):   ?>
    <select>
        <option value="<?= $city->id ?>"> <?= $city->name_ru?></option>

    </select>

<?php endforeach; ?>}