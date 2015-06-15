<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、MySQL、テーブル接頭辞、秘密鍵、ABSPATH の設定を含みます。
 * より詳しい情報は {@link http://wpdocs.sourceforge.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86 
 * wp-config.php の編集} を参照してください。MySQL の設定情報はホスティング先より入手できます。
 *
 * このファイルはインストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さず、このファイルを "wp-config.php" という名前でコピーして直接編集し値を
 * 入力してもかまいません。
 *
 * @package WordPress
 */

// 注意: 
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.sourceforge.jp/Codex:%E8%AB%87%E8%A9%B1%E5%AE%A4 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

include('wp-config-custom.php');

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
define('DB_NAME', 'nicopuchi_db');
define('DB_USER', 'nicopuchi');
define('DB_PASSWORD', 'QRUsKAi6EXgn');
define('DB_HOST', 'nicopuchidb.cziau29pqrkr.ap-northeast-1.rds.amazonaws.com');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '= %@9iq;0LBzO b|rWGwT~CXnhT-/*ISr1;!vR6S5uolW_H?t/[L3v&ks.}@%CYv');
define('SECURE_AUTH_KEY',  'ybF[Jp`0J+_R&9wIReri]|q5;+Osn?tG^_FvVm96#54Z/Hip4:ghLJ[M-MSe^`q*');
define('LOGGED_IN_KEY',    '|#^b#r5)mB(&+V(`;y^ffYfz&m^j}2kf4BWi+e]^TCM0!}r ;lqZp/,(+[3pUqD:');
define('NONCE_KEY',        '`R#^s$_>2E*#bNl0*v5en*|`@mH(BW@T*zR+Qp BS4:z=~mz2+@$l?V7d5OP/0f=');
define('AUTH_SALT',        ',ceZPP#mNI>$1%b&Nq*Qe+HE0KtA|p|kG2B}) 2aYXV#$wDj&;-k`o(^ghR0k^N)');
define('SECURE_AUTH_SALT', '8V~4n=v|.daqka(X)VcCW5.PPV_5$HV{fXg%mO;EM_CUVh1-r<Cf,I<-x`+(3L+v');
define('LOGGED_IN_SALT',   'h0[^-YQ$P5[^5KiL7VIi%y;@RkU=V0D*^UO0s*/vL..>:ZC$wEo+OaARgKS]j2cp');
define('NONCE_SALT',       '+&s?}IB}g+3wpM|*A[10[9/:UW:iR/JF|lv.KhqI[9rHm@@zD%?48WxK[q+__LT4');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 */
define('WP_DEBUG', false);

/**
 * 追加の設定
 */
// リビジョンの回数
define('WP_POST_REVISIONS', false);
//define('WP_POST_REVISIONS', 5);

// 自動保存の時間
define('AUTOSAVE_INTERVAL', 999999);

// メディアのアップロード先
define('UPLOADS', 'uploads');


/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
