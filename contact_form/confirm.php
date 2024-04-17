<?php
session_start();
$post = [];

// 入力画面からのアクセスでなければ、戻す
if (!isset($_SESSION['form'])) {
    header('Location: index.php');
    exit();
} else {
    $post = $_SESSION['form'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // メールを送信する
    $to = 't.kubota3686.grgr@gmail.com';
    $from = $post['email'];
    $subject = 'お問い合わせが届きました';
    $body = <<<EOT
名前： {$post['name']}
メールアドレス： {$post['email']}
内容：
{$post['contact']}
EOT;

    // サンクスページへ
    unset($_SESSION['form']);
    header('Location: index.html');
    exit();

    // メールを送信
    $result = mb_send_mail($to, $subject, $body, "From: {$from}");

    // メール送信の結果をチェック
    // if ($result) {
    //     // メール送信成功
    //     unset($_SESSION['form']);
    //     header('Location: index.html');
    //     exit();
    // } else {
    //     // メール送信失敗
    //     echo "メールの送信に失敗しました。";
    // }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width">
    <title>Contact(お問い合わせ) | TATSUKI KUBOTA PORTFOLIO</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://use.typekit.net/kyc2rpo.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500&display=swap" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet" media="all">
</head>

<body id="confirm">
    <div class="wrapper">
        <!-- ヘッダー -->
        <header class="header">
            <div class="header__wrap">
                <div class="header__container--01">
                    <div class="header__box">
                        <p class="header__ttl--01">TATSUKI<br>KUBOTA</p>
                        <p class="header__ttl--02">PORTFOLIO</p>
                    </div>

                    <nav class="gnav">
                        <ul class="gnav__nav">
                            <li class="gnav__list fadein"><a href="../index.html" class="gnav__link">TOP</a></li>
                            <li class="gnav__list fadein"><a href="../index.html#concept" class="gnav__link">CONCEPT</a>
                            </li>
                            <li class="gnav__list fadein"><a href="../index.html#about" class="gnav__link">ABOUT</a>
                            </li>
                            <li class="gnav__list fadein"><a href="../works/index.html" class="gnav__link">WORKS</a></li>
                            <li class="gnav__list fadein"><a href="../index.html#skills" class="gnav__link">SKILLS</a>
                            </li>
                            <li class="gnav__list fadein"><a href="#" class="gnav__link">CONTACT</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="header__ttlBox">
                    <p class="header__ttlSub">(お問い合わせ)</p>
                    <h1 class="header__ttlMain hidden">Contact</h1>
                </div>
            </div>
        </header>

        <main class="main">
            <!-- コンタクトセクション -->
            <section id="contact" class="contact">
                <div class="contact__wrap">
                    <form id="contactForm" class="form" action="" method="POST">
                        <div class="form__box">
                            <label for="form__name" class="form__label">NAME</label>
                            <p class="form_item"><?php echo htmlspecialchars($post['name']); ?></p>
                        </div>
                        <div class="form__box">
                            <label for="form__email" class="form__label">MAIL ADRESS</label>
                            <p class="form_item"><?php echo htmlspecialchars($post['email']); ?></p>
                        </div>
                        <div class="form__box">
                            <label for="form__message" class="form__label">MESSAGE</label>
                            <p class="form_item"><?php echo nl2br(htmlspecialchars($post['message'])); ?></p>
                        </div>
                        <div class="confirm__box">
                            <p class="confirm__btn"><a href="index.php" class="confirm__link">RETURN</a></p>
                            <input type="submit" class="confirm__submit" value="SUBMIT">
                        </div>
                    </form>
                </div>
            </section>
        </main>

        <!-- フッター -->
        <footer class="footer">
            <div class="footer__wrap">
                <div class="footer__container--01">
                    <nav class="footerNav">
                        <ul class="footerNav__ul">
                            <li class="footerNav__list fadein"><a href="../index.html" class="footerNav__link">TOP</a>
                            </li>
                            <li class="footerNav__list fadein"><a href="../index.html#concept" class="footerNav__link">CONCEPT</a></li>
                            <li class="footerNav__list fadein"><a href="../index.html#about" class="footerNav__link">ABOUT</a></li>
                            <li class="footerNav__list fadein"><a href="../works/index.html" class="footerNav__link">WORKS</a></li>
                            <li class="footerNav__list fadein"><a href="../index.html#skills" class="footerNav__link">SKILLS</a></li>
                            <li class="footerNav__list fadein"><a href="#" class="footerNav__link">CONTACT</a></li>
                        </ul>
                    </nav>
                    <div class="footer__fv">
                        <video class="footer__video" autoplay muted playsinline loop>
                            <source src="../images/fv.mp4" type="video/mp4">
                        </video>
                    </div>
                </div>
                <div class="footer__container--02">
                    <div class="footer__containerWrap">
                        <div href="../index.html" class="footer__box">
                            <h1 class="footer__ttl--01">TATSUKI KUBOTA</h1>
                            <p class="footer__ttl--02">PORTFOLIO</p>
                        </div>
                        <p class="footer__copy"><small class="footer__small">© TATSUKI KUBOTA 2024</small></p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="../js/nav.js"></script>
    <script src="../js/fade.js"></script>


</body>

</html>