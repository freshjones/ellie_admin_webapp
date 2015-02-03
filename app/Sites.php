<?php namespace Ellie;

use Illuminate\Database\Eloquent\Model;

class Sites extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sites';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = array('id');

	//protected $fillable = ['name','url','template_id','colorscheme_id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [];

	public function plan()
	{
		return $this->belongsTo('Ellie\Plans');
	}


}