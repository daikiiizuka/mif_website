<?php
session_start();
$error = []; /*←初期化*/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    // フォームの送信時にエラーをチェックする
    if ($post['name'] === '') {
        $error['name'] = 'blank';
    }
    if ($post['company'] === '') {
        $error['company'] = 'blank';
    }
    if ($post['email'] === '') {
        $error['email'] = 'blank';
    } else if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
        $error['email'] = 'email';
    }
    if ($post['contact'] === '') {
        $error['contact'] = 'blank';
    }
    if ($post['check1']['check2']['check3'] === '') {
        $error['check1']['check2']['check3'] = 'blank';
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--googleアナリティクストラッキングコードここから -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-65XRVLNLBX"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-65XRVLNLBX');
    </script>
    <!--googleアナリティクストラッキングコードここまで -->
    <title>株式会社エムアイエフ | お問い合わせ</title>
    <meta name="description"
        content="福島県いわき市のホームページ制作会社です。withコロナ時代のWEB戦略・ホームページ活用を提案します。地域密着を重視し、一社一社のお客様と真摯に向き合い、丁寧な仕事を心がけています。ホームページ制作、SEO対策、など幅広く承っております。千葉県、茨城県、栃木県、埼玉県、東京都">
    <meta name="keywords" content="ホームページ制作,SEO,千葉県千葉市,福島県いわき市,野球,栃木県足利市,WEBサイト,WEBデザイン,WEBデザイナー">
    <!--OGP設定 -->
    <meta property="og:title" content="株式会社エムアイエフ | 福島県いわき市のWeb制作会社。千葉県、茨城県、栃木県、埼玉県、東京都">
    <meta property="og:type" content="website">
    <meta property="og:description"
        content="福島県いわき市のホームページ制作会社です。withコロナ時代のWEB戦略・ホームページ活用を提案します。地域密着を重視し、一社一社のお客様と真摯に向き合い、丁寧な仕事を心がけています。ホームページ制作、SEO対策、など幅広く承っております。千葉県、茨城県、栃木県、埼玉県、東京都">
    <meta property="og:url" content="https://www.mif-net.jp/">
    <meta property="og:site_name" content="株式会社エムアイエフ">
    <meta property="og:image" content="">
    <meta property="og:locale" content="ja_JP" />
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body>
    <main>
        <!-- メインビジュアル -->
        <section id="mainvisual-contact-area">
            <div class="mainvisual-left">
                <h1>CONTACT</h1>
            </div>
            <div class="mainvisual-right">
            </div>
        </section>

        <section id="contact-form-area">
            <div class="section-title">
                <h2 class="boder">お問合わせフォーム</h2>
            </div>

            <div class="box_con06">
                <form action="" method="POST" novalidate>
                    <ul class="formTable">
                        <li>
                            <p class="title"><span>必須</span><em>お問合せ内容</em></p>
                            <div class="box_det">
                                <div class="box_br">
                                    <label>
                                        <input type="checkbox" name="check1" value="お見積もりについて" autofocus>
                                        お見積もりについて
                                    </label>
                                </div>
                                <div class="box_br">
                                    <label>
                                        <input type="checkbox" name="check2" value="ご相談" autofocus>
                                        ご相談
                                    </label>
                                </div>
                                <div class="box_br">
                                    <label>
                                        <input type="checkbox" name="check3" value="その他" autofocus>
                                        その他
                                    </label>

                                </div>
                            </div>
                        </li>

                        <li>
                            <p class="title"><span>必須</span><em>ご質問など</em></p>
                            <div class="box_det"><textarea name="contact" cols="50" rows="5"
                                    placeholder="ご質問内容などをご記入ください"
                                    required><?php echo htmlspecialchars($post['contact']); ?></textarea>
                                <?php if ($error['contact'] === 'blank'): ?>
                                <p class="error_msg">※ご質問内容をご記入下さい</p>
                                <?php endif; ?>
                            </div>
                        </li>
                        <li>
                            <p class="title"><span>必須</span><em>会社名</em></p>
                            <div class="box_det"><input size="20" type="text" class="wide" name="company"
                                    autocomplete="organization" placeholder="株式会社エムアイエフ"
                                    value="<?php echo htmlspecialchars($post['company']); ?>" required autofocus>
                                <?php if ($error['company'] === 'blank'): ?>
                                <p class="error_msg">※御社名をご記入下さい</p>
                                <?php endif; ?>
                            </div>
                        </li>

                        <li>
                            <p class="title"><span>必須</span><em>お名前</em></p>
                            <div class="box_det"><input size="20" type="text" class="wide" name="name"
                                    autocomplete="name" placeholder="鈴木一朗"
                                    value="<?php echo htmlspecialchars($post['name']); ?>" required autofocus>
                                <?php if ($error['name'] === 'blank'): ?>
                                <p class="error_msg">※お名前をご記入下さい</p>
                                <?php endif; ?>
                            </div>
                        </li>
                        <li>
                            <p class="title"><span class="none">不要</span><em>フリガナ</em></p>
                            <div class="box_det"><input size="20" type="text" class="wide" name="furigana"
                                    autocomplete="name" placeholder="スズキイチロウ"
                                    value="<?php echo htmlspecialchars($post['furigana']); ?>" autofocus></div>
                        </li>
                        <li>
                            <p class="title"><span class="none">不要</span><em>ご住所</em></p>
                            <div class="box_det"><input size="20" type="text" class="wide" name="address"
                                    placeholder="〒973-8411 福島県いわき市小島町1-9-5"
                                    value="<?php echo htmlspecialchars($post['address']); ?>" autofocus></div>
                        </li>

                        <li>
                            <p class="title"><span class="none">不要</span><em>電話番号</em></p>
                            <div class="box_det"><input size="30" type="tel" class="wide" name="tel" autocomplete="tel"
                                    placeholder="0246-00-0000" value="<?php echo htmlspecialchars($post['tel']); ?>"
                                    autofocus></div>
                        </li>
                        <li>
                            <p class="title"><span>必須</span><em>メールアドレス</em></p>
                            <div class="box_det"><input size="30" type="email" class="wide" name="email"
                                    autocomplete="email" placeholder="info@mif.com"
                                    value="<?php echo htmlspecialchars($post['email']); ?>" required>
                                <?php if ($error['email'] === 'blank'): ?>
                                <p class="error_msg">※メールアドレスをご記入下さい</p>
                                <?php endif; ?>
                                <?php if ($error['email'] === 'email'): ?>
                                <p class="error_msg">※メールアドレスを正しくご記入ください</p>
                                <?php endif; ?>
                            </div>
                        </li>
                    </ul>

                    <div class="personal-information">
                        <p class="personal-title">個人情報の取扱いについて</p>
                        <p class="personal-bottom">株式会社エムアイエフはご登録いただきました個人情報は個人情報保護法に定める例外事項を除き、<br>
                            ご本人の承諾なく第三者に提供することはございません。<br>
                            同意いただける方は「同意して送信」のボタンを押してください。</p>
                    </div>

                    <div class="contact-btn">
                        <button type="submit">同意して送信</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>




<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init();
</script>
<script src="js/main.js"></script>

</html>