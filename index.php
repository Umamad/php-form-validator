<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"):
    if (isset($_POST['btn'])) {
        include_once "Validation.php";
        $data = $_POST['frm'];
        $filters = array(
            'name' => array(
                'max_char' => 7,
                'min_char' => 15,
                'required' => null
            ),
            'lastname' => array(
                'max_char' => 25,
                'min_char' => 8,
                'required' => null
            ),
            'age' => array(
                'required' => null,
                'min_num' => 18,
                'max_num' => 30
            ),
            'email' => array(
                'filter' => 'email',
                'required' => null
            ),
            'password' => array(
                'filter' => 'password',
                'required' => null
            ),
            'url' => array(
                'filter' => 'url',
                'required' => null
            ),
            'gender' => array('required' => null),
            'terms' => array('required' => null)
        );
        $validate = new Validation($data, $filters);
        $errors = $validate->validate();
    }
endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
            crossorigin="anonymous"></script>
    <style>
        section {
            width: 50%;
            margin: 100px auto;
            padding: 20px;
            border: 0.6px solid black;
            border-radius: 10px;
            box-shadow: 0 0 10px 5px black;
        }

        .valid-feedback {
            display: block;
        }

        .invalid-feedback {
            display: block;
        }
    </style>
</head>
<body>
<section>
    <form action="" method="post">
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Name</label>
            <input type="text" name="frm[name]" class="form-control" id="exampleInputName" aria-describedby="emailHelp"
                <?php
                if (isset($data['name']))
                    echo 'value="' . $data['name'] . '"';
                ?>
            >
            <?php
            if (isset($validate))
                $validate->show_error('name');
            ?>
        </div>
        <div class="mb-3">
            <label for="exampleInputLastName" class="form-label">LastName</label>
            <input type="text" name="frm[lastname]" class="form-control" id="exampleInputLastName"
                   aria-describedby="emailHelp"
                <?php
                if (isset($data['lastname']))
                    echo 'value="' . $data['lastname'] . '"';
                ?>
            >
            <?php
            if (isset($validate))
                $validate->show_error('lastname');
            ?>
        </div>
        <div class="mb-3">
            <label for="exampleInputLastName" class="form-label">Age</label>
            <input type="number" name="frm[age]" class="form-control" id="exampleInputLastName"
                   aria-describedby="emailHelp"
                <?php
                if (isset($data['age']))
                    echo 'value="' . $data['age'] . '"';
                ?>
            >
            <?php
            if (isset($validate))
                $validate->show_error('age');
            ?>
        </div>
        <div class="mb-3">
            <label for="exampleInputUrl" class="form-label">URL</label>
            <input type="text" name="frm[url]" class="form-control" id="exampleInputUrl" aria-describedby="emailHelp"
                <?php
                if (isset($data['url']))
                    echo 'value="' . $data['url'] . '"';
                ?>
            >
            <?php
            if (isset($validate))
                $validate->show_error('url');
            ?>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="text" name="frm[email]" class="form-control" id="exampleInputEmail1"
                   aria-describedby="emailHelp"
                <?php
                if (isset($data['email']))
                    echo 'value="' . $data['email'] . '"';
                ?>
            >
            <?php
            if (isset($validate))
                $validate->show_error('email');
            ?>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="frm[password]" class="form-control" id="exampleInputPassword1">
            <?php
            if (isset($validate))
                $validate->show_error('password');
            ?>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="frm[gender]" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                Male
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="frm[gender]" id="flexRadioDefault2">
            <label class="form-check-label" for="flexRadioDefault2">
                Female
            </label>
            <?php
            if (isset($validate))
                $validate->show_error('gender');
            ?>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="frm[terms]" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">
                Accept Our
                <a href="#">
                    Terms & Licences
                </a>
            </label>
            <?php
            if (isset($validate))
                $validate->show_error('terms');
            ?>
        </div>
        <button type="submit" name="btn" class="btn btn-primary">Submit</button>
    </form>
</section>
</body>
</html>