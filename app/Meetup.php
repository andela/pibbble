<?php

namespace Pibbble;

use Illuminate\Database\Eloquent\Model;

class Meetup extends Model
{
    /**
     * The table associated with this model.
     * @var string
     */
    protected $table = 'meetups';

    /**
     * The primary key field in the table.
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     *  The attributes that are mass assignable.
     * @var array
     * */
    protected $fillable = ['city', 'event_details', 'event_date', 'organizer_address', 'phone_no'];

    public function user()
    {
        return $this->belongsTo('Pibbble\User');
    }
}
