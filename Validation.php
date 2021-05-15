<?php
/*
 * Form Validator And Get Error Messages
 * @Author @Umamad
 * Class Validator
*/

class Validation
{
    protected $data;
    protected $filters;
    protected $validation_error;

    public function __construct($data, $filters)
    {
        $this->data = $data;
        $this->filters = $filters;
    }

    public function validate()
    {
        foreach ($this->filters as $index => $filter) {
            foreach ($filter as $key => $value) {
                //echo $index;
                if (isset($this->data[$index]))
                    $this->$key($this->data[$index], $value, $index);
                else
                    $this->validation_error[$index]['required'] = "Fill This Field!";
            }
        }
        return $this->validation_error;
    }

    public function show_error($field_name)
    {
        if (isset($this->validation_error[$field_name])) {
            echo '<div class="invalid-feedback"><ul>';
            if (is_array($this->validation_error[$field_name]))
                if (!array_key_exists('required', $this->validation_error[$field_name]))
                    foreach ($this->validation_error[$field_name] as $error)
                        echo '<li>' . $error . '</li>';
                else
                    echo '<li>' . $this->validation_error[$field_name]['required'] . '</li>';
            else
                echo '<li>' . $this->validation_error[$field_name] . '</li>';
            echo '</ul></div>';
        }
    }

    protected function required($data, $filter_value, $key)
    {
        if (is_numeric($data) and $data == 0)
            $this->validation_error[$key]['required'] = "Fill This Field!";
        elseif (is_string($data) and empty($data))
            $this->validation_error[$key]['required'] = "Fill This Field!";
    }

    protected function max_char($data, $filter_value, $key)
    {
        if (strlen($data) > $filter_value) {
            $this->validation_error[$key]['max_char'] = "Should Be Less Than $filter_value Characters!";
        }
    }

    protected function min_char($data, $filter_value, $key)
    {
        if (strlen($data) < $filter_value) {
            $this->validation_error[$key]['min_char'] = "Should Be More Than $filter_value Characters!";
        }
    }

    protected function max_num($data, $filter_value, $key)
    {
        if ($data > $filter_value) {
            $this->validation_error[$key]['max_num'] = "Should Be Less Than $filter_value!";
        }
    }

    protected function min_num($data, $filter_value, $key)
    {
        if ($data < $filter_value) {
            $this->validation_error[$key]['min_num'] = "Should Be More Than $filter_value!";
        }
    }

    protected function filter($data, $filter_value, $key)
    {
        switch ($filter_value) {
            case 'email':
                if (!filter_var($data, FILTER_VALIDATE_EMAIL))
                    $this->validation_error[$key]['filter'] = "Should Be In 'example@example.com' Format!";
                break;
            case 'url':
                if (!filter_var($data, FILTER_VALIDATE_URL))
                    $this->validation_error[$key]['filter'] = "Should Be In 'PROTOCOL ://example.com' Format!";
                break;
            case 'password':
                if ((strlen($data) < 8) or (strlen($data) > 30))
                    $this->validation_error[$key]['filter'] = "Should Be Between 8 And 30 Characters!";
                break;
            default:
                $this->validation_error[$key]['filter'] = "Filter Does Not Set Correctly!";
        }
    }
}