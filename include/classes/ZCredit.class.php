<?php
class ZCredit {
	static public function Create($score, $user_id, $action='charge', $detail_id=0){
		if (!$score|| !$user_id) return 0;

		//update user score;
		$user = Table::Fetch('user', $user_id);
		Table::UpdateCache('user', $user_id, array(
					'score' => array( "`score`+{$score}" ),
					));

		$u = array(
				'user_id' => $user_id,
				'admin_id' => 0,
				'score' => $score,
				'action' => $action,
				'detail_id' => $detail_id,
				'create_time' => time(),
				);
		return DB::Insert('credit', $u);
	}
	
	static public function Login($user_id=0) {
		global $INI; if ($INI['credit']['login']==0) return ;
		$now = Time() - 86400;
		$condition = array(
			'user_id' => $user_id,
			'action' => 'login',
			"create_time > $now",
		);
		$count = Table::Count('credit', $condition);
		if ($count>0) return;
		self::Create($INI['credit']['login'], $user_id, 'login');
	}

	static public function Invite($user_id=0) {
		global $INI; if ($INI['credit']['invite']==0) return ;
		self::Create($INI['credit']['invite'], $user_id, 'invite');
	}

	static public function Register($user_id=0) {
		global $INI; if ($INI['credit']['register']==0) return ;
		self::Create($INI['credit']['register'], $user_id, 'register');
	}

	static public function Buy($user_id=0, $order=array()) {
		global $INI; 
		if ($INI['credit']['buy']>0 ) {
			self::Create($INI['credit']['buy'], $user_id, 'buy', $order['team_id']);
		}
		$pay = abs(intval($INI['credit']['pay'] * $order['money']));
		if ($pay > 0) {
			self::Create($pay, $user_id, 'pay', $order['id']);
		}
	}

	static public function Charge($user_id=0, $money=0) {
		global $INI; if ($INI['credit']['charge']==0) return ;
		$pay = abs(intval($INI['credit']['charge'] * $money));
		if ($pay > 0) {
			self::Create($pay, $user_id, 'charge');
		}
	}

	static public function Explain($record) {
		if (!$record) return null;
		$action = $record['action'];
		if ('charge' == $action) {
			return  "account charged";
		}
		else if ( 'buy' == $action) {
			$team = Table::Fetch('team', $record['detail_id']);
			return "buy it - {$team['product']}";
		}
		else if ( 'invite' == $action) {
			return 'invite friend';
		}
		else if ( 'register' == $action) {
			return 'register account';
		}
		else if ( 'login' == $action) {
			return 'daily login';
		}
		else if ( 'exchange' == $action) {
			$goods = Table::Fetch('goods', $record['detail_id']);
			return "exchange goods - {$goods['title']}";
		}
		else if ( 'pay' == $action ) {
			$order = Table::Fetch('order', $record['detail_id']);
			return "buy to get credit - money paid {$order['money']}";
		}
		else if ( 'charge' == $action) {
			return 'online charge';
		}
	}
}
?>
