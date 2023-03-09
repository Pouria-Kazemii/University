<?php require __DIR__ . '/../partials/header.php'; ?>

        <div class="row">
            <div class="col-12">

                <section class="my-3">
                    <form action="/students?name=this" method="POST">

                    <div class="form-group mb-1">
                        <label for="first_name">First Name:</label>
                        <input type="text" class="form-control" name="first_name" >
                    </div>

                    <div class="form-group mb-1">
                        <label for="last_name">Last Name:</label>
                        <input type="text" class="form-control" name="last_name" >
                    </div>


                    <div class="form-group mb-1">
                        <label for="national_code">National Code:</label>
                        <input type="text" class="form-control" name="national_code">
                    </div>

                    <div class="form-group mb-1">
                        <label for="student_number">Student Number:</label>
                        <input type="text" class="form-control" name="student_number">
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Send">
                    </div>

                    </form>
                </section>

            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <?php if(session()->has('errors')): ?>

                    <section class="bg-danger fw-bold py-1">
                        
                        <ul>
                            <?php foreach(session()->flush('errors') as $error): ?>

                                <li class="text-white">
                                    <?= $error; ?>
                                </li>

                            <?php endforeach; ?>
                        </ul>

                    </section>

                <?php endif ?>
            </div>
        </div>

<?php require __DIR__ . '/../partials/footer.php'; ?>