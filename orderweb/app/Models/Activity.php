<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $table = 'activity';
    protected $fillable =['dercription',
        'hours',
        'technician_id',
        'type_id'];

    /**
     * se debe colocar el nombre de la FK ya que está hace referencia al 
     * campo document de technician y por llamarse deferente a 'id'
     * debe especificarse manualmente
     */

    public function technician()
    {
        return $this->belongsTo(Technician::class, 'tecnician_id');
    }

    public function type_activity()
    {
        return $this->belongsTo(TypeActivity::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_activity', 'order_id', 'activity_id');
    }
}
