<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class RModel extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    public $incrementing = true;
    protected $fillable = [];
    protected $rules = [];
    protected $errors;
    protected $messages = [];

    public function validate()
    {
        // make a new validator object
        $v = \Validator::make($this->attributes, $this->rules, $this->messages);
        // check for failure
        if ($v->fails())
        {
            // set errors and return false
            $this->errors = $v->errors();
            return false;
        }

        // validation pass
        return true;
    }

    public function errors()
    {
        return $this->errors;
    }

    public function beforeSave() {

        return true;
    }

    public function save(array $options = []) {
        try {
            if (!$this->beforeSave()) {
                return false;
            }

            return parent::save($options);
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }   
    }
    
    public function __destruct(){
        \DB::disconnect();
    }

    public function formatDate($date){
        
    }
}
