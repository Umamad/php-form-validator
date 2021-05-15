# Filters :
### Numeric
  1. max_num
  2. min_num

### Character
  1. max_char
  2. min_char

### Filters
  1. email
  2. url
  3. password

### Required
  1. required

# Methods :
```php
// for validate data and it returns array of error(s) messages
$instance ->validate();

// shows errors wich related to entered field name
$instance ->show_error($field_name)
```
# How to use :
1. Set Data
2. Set Filters
3. Import Validation Class
4. Build Instance From Validation Class
	hint : takes two parameter inorder data then filters
5. Call validate Method
	>hint : returns errors type with errors messages
6. Call show_error($field_name) Method To Show Errors
	>hint : shows entered field error(s)

# Data Set (Example) :
```php
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
```

# Filter Set (Example) :
```php
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
```
# Validate & Fetch Error(s) (Example) :
```php
// build instance of class
$instance = new Validation($data, $filters);

// using validate method $error contains array of errors
$errors = $instance->validate();
```
# Show Error(s) (Example) :
>! You Can Test Simply By Using 'index.php' file !
```php
<form action="" method="post">
  <div class="mb-3">
    <label for="exampleInputName" class="form-label">Name</label>
    <input type="text" name="frm[name]" class="form-control" id="exampleInputName" aria-describedby="emailHelp">
    <?php
      // shows name's field errors
      if (isset($instance))
      $instance->show_error('name');
    ?>
  </div>
</form>
```
