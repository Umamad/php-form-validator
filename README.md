* Filters Includes :
    Numeric 
      1. max_num
      2. min_num
 
    Character
      1. max_char
      2. min_char
 
    Filters
      1. email
      2. url
      3. password

    Required
      1. required

* Methods :
     1. validate()
     2. show_error($field_name)

* How to use :
   A) Set Data
   B) Set Filters
   C) Import Validation Class
   E) Build Instance From Validation Class
        hint : takes two parameter inorder data then filters
   F) Call validate Method
        hint : returns errors type with errors messages
   E) Call show_error($field_name) Method To Show Errors
        hint : shows entered field error(s)
        
* Data Set Rules (Example) :
  $data = array(
            'name' => 'Mohammad',
            'lastname' => 'Saadati',
            'age' => '23',
            'url' => 'http://matrixweb.ir',
            'email' => 'marandmohammad@gmail.com',
            'password' => 'agolija;ol',
            'gender' => 'Male',
            'terms' => 'on'
           );
            
* Filter Set Rules (Example) :
  // index if array should equals with field name
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

* Validate & Fetch Error(s) Rules (Example) :

  $validate = new Validation($data, $filters);
  $errors = $validate->validate();
 
* Validate & Fetch Error(s) Rules (Example) :
  <form action="" method="post">
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Name</label>
            <input type="text" name="frm[name]" class="form-control" id="exampleInputName" aria-describedby="emailHelp">
                <?php
                // shows name's field errors
                if (isset($validate))
                    $validate->show_error('name');
                ?>
        </div>
  </form>
  
! You Can Test Simply By Using 'index.php' file !


