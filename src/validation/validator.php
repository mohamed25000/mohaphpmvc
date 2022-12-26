<?php

namespace Sectheater\validation;

use Sectheater\validation\rules\AlnumRule;
use Sectheater\validation\rules\RequiredRule;

class validator
{
    protected array $data = [];
    protected array $rules = [];
    protected array $aliases = [];
    protected ErrorBag $errorBag;
    protected array $ruleMap = [
        'required' => RequiredRule::class,
        'alnum' => AlnumRule::class,
    ];

    public function make($data)
    {
        $this->data = $data;
        $this->errorBag = new ErrorBag();
        $this->validate();
    }

    public function validate()
    {
        foreach($this->rules as $field => $rules) {
            foreach ($rules as $rule) {
                if(is_string($rule)){
                    $rule = new $this->ruleMap[$rule];
                }
                if(!$rule->apply($field, $this->getFieldValue($field), $this->data)) {
                    $this->errorBag->add($field, Message::generate($rule, $field));
                }

            }
        }
    }

    public function getFieldValue($field)
    {
        return $this->data[$field] ?? null;
    }

    public function setRules($rules)
    {
        $this->rules = $rules;
    }

    public function passes()
    {
        return empty($this->errors());
    }

    public function errors($key = null)
    {
        return $key ? $this->errorBag->errors[$key] : $this->errorBag->errors;
    }

    public function alias($field)
    {
        return $this->aliases[$field] ?? $field;
    }

    public function setAliases(array $aliases)
    {
        $this->aliases = $aliases;
    }

}