<?php
class ZSubscribe
{
	static public function Create($email, $city_id) 
	{
		if (!Utility::ValidEmail($email, true)) return;
		$secret = md5($email . $city_id);
		$table = new Table('subscribe', array(
					'email' => $email,
					'city_id' => $city_id,
					'secret' => $secret,
					'create_time' => strtotime('now')
					));
		Table::Delete('subscribe', $email, 'email');
		$table->insert(array('email', 'city_id', 'secret','create_time'));
	}

	static public function Unsubscribe($subscribe) {
		Table::Delete('subscribe', $subscribe['email'], 'email');
	}
}
