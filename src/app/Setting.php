<?php

namespace SMATAR\Settings\App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $guarded = ['id'];

    public function setCodeAttribute($value)
    {
        $this->attributes['code'] = str_slug($value, '_');
    }

    public function getTypeAttribute()
    {
        return $this->attributes['type'] = strtoupper($this->attributes['type']);
    }

    public function getValueAttribute()
    {
        if ($this->attributes['type'] == 'FILE') {
            if (!empty($this->attributes['value'])) {
                return config('settings.upload_path') . '/' . $this->attributes['value'];
            }
        }
        if ($this->attributes['type'] == 'SELECT') {
            $values = json_decode($this->attributes['value'], true);
            if ($values) {
                return $values;
            } else {
                return [];
            }
        }
        return $this->attributes['value'];
    }
}
