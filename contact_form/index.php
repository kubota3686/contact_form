<?php
session_start();
$error = [];
$post = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // フォームの送信時にエラーをチェックする
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    if ($post['name'] === '') {
        $error['name'] = 'blank';
    }
    if ($post['email'] === '') {
        $error['email'] = 'blank';
    } else if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
        $error['email'] = 'email';
    }
    if ($post['message'] === '') {
        $error['message'] = 'blank';
    }

    if (count($error) === 0) {
        // エラーがないので確認画面に移動
        $_SESSION['form'] = $post;
        header('Location: confirm.php');
        exit();
    }
} else {
    if (isset($_SESSION['form'])) {
        $post = $_SESSION['form'];
    }
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

<body id="contactForm">
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
              <input id="form__name" class="form__input" type="text" name="name" required autofocus placeholder="山田　太郎" value="<?php echo isset($post['name']) ? htmlspecialchars($post['name']) : ''; ?>">
              <?php if (isset($error['name']) && $error['name'] === 'blank'): ?>
                <p class="error_msg">※お名前を入力してください</p>
              <?php endif; ?>
            </div>
            <div class="form__box">
              <label for="form__email" class="form__label">MAIL ADRESS</label>
              <input id="form__email" type="email" class="form__input" name="email" required placeholder="sample@example.com" value="<?php echo isset($post['email']) ? htmlspecialchars($post['email']) : ''; ?>">
              <?php if (isset($error['email']) && $error['email'] === 'blank'): ?>
                <p class="error_msg">※メールアドレスを入力してください</p>
              <?php endif; ?>
              <?php if (isset($error['email']) && $error['email'] === 'email'): ?>
                <p class="error_msg">※メールアドレスを正しく入力してください</p>
              <?php endif; ?>
            </div>
            <div class="form__box">
              <label for="form__message" class="form__label">MESSAGE</label>
              <textarea id="form__message" class="form__message" name="message" required placeholder="お問い合わせ内容を入力してください."><?php echo isset($post['name']) ? htmlspecialchars($post['name']) : ''; ?><?php echo isset($post['message']) ? htmlspecialchars($post['message']) : ''; ?></textarea>
              <?php if (isset($error['message']) && $error['message'] === 'blank'): ?>
                <p class="error_msg">※お問い合わせ内容を入力してください</p>
              <?php endif; ?>
            </div>
            <div class="form__box">
              <input type="submit" class="form__submit" value="CONFIRM">
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