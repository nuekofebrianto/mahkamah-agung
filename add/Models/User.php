<?php 
namespace Add\Models; 
use Illuminate\Database\Eloquent\Model; 

class User extends Model 
{ 

	protected $table="users"; 
	protected $fillable=["role_id","username","email","password","confirm_passwod","created_by","updated_by"];

	public static function getTableName(){return (new self())->getTable();} 
	public function role() { return $this->belongsTo(Role::class,"role_id"); } 
	
	protected $hidden = [
		'password',
		'remember_token',
	];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
    	'email_verified_at' => 'datetime',
    ];

} 