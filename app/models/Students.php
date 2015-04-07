<?php


class Students extends Eloquent {

	

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'etudiant';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
	/**
     * Get the user's full name by concatenating the first and last names
     *
     * @return string
     */
	 public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

}
