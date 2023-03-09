<?php require __DIR__ . '/../partials/header.php'; ?>

    <?php foreach($users as $user) :?>
        <h3><?= $user->id . " . " . $user->first_name . " " . $user->last_name;  ?></h3>
        <p><?= $user->national_code; ?></p>
        <p><?= $user->student_number; ?></p>

    <?php endforeach; ?>

<?php require __DIR__ . '/../partials/footer.php'; ?>
