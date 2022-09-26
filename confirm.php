<?php
session_start();

// 入力画面からのアクセスでなければ、戻す
if (!isset($_SESSION['form'])) {
    header('Location: contact.php');
    exit();
} else {
    $post = $_SESSION['form'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // メールを送信する
    $to = 'd-iizuka@mif-net.jp';
    $from = $post['email'];
    $subject = 'お問い合わせが届きました';
    $body = <<<EOT
会社名： {$post['company']}
名前： {$post['name']}
フリガナ： {$post['furigana']}
住所： {$post['address']}
メールアドレス： {$post['email']}
電話番号： {$post['tel']}
お問合せ内容： {$post['check1']}
お問合せ内容： {$post['check2']}
お問合せ内容： {$post['check3']}
ご質問など：
{$post['contact']}
EOT;
    // var_dump($body);
    // exit();
    mb_send_mail($to, $subject, $body, "From: {$from}");

    // セッションを消してお礼画面へ
    unset($_SESSION['form']);
    header('Location: thanks.html');
    exit();
}

  $checks = $_POST['check'];


?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>株式会社エムアイエフ | お問い合わせ確認</title>
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

        <section id="contact-form-area">

            <div class="box_con06">
                <form action="" method="POST">
                    <ul class="formTable">

                        <li>
                            <p class="title"><span>必須</span><em>お問合せ内容</em></p>
                            <div class="box_det">
                                <?php echo htmlspecialchars($post['check1']); ?>
                                <?php echo htmlspecialchars($post['check2']); ?>
                                <?php echo htmlspecialchars($post['check3']); ?>
                        </li>

                        <li>
                            <p class="title"><span>必須</span><em>ご質問など</em></p>
                            <div class="box_det"><?php echo nl2br(htmlspecialchars($post['contact'])); ?></div>
                        </li>
                        <li>
                        <li>
                            <p class="title"><span>必須</span><em>会社名</em></p>
                            <div class="box_det"><?php echo htmlspecialchars($post['company']); ?></div>
                        </li>
                        <li>
                            <p class="title"><span>必須</span><em>お名前</em></p>
                            <div class="box_det"><?php echo htmlspecialchars($post['name']); ?></div>
                        </li>
                        <li>
                            <p class="title"><span class="none">不要</span><em>フリガナ</em></p>
                            <div class="box_det"><?php echo htmlspecialchars($post['furigana']); ?></div>
                        </li>
                        <li>
                            <p class="title"><span class="none">不要</span><em>ご住所</em></p>
                            <div class="box_det"><?php echo htmlspecialchars($post['address']); ?></div>
                        </li>
                        <li>
                            <p class="title"><span class="none">不要</span><em>電話番号</em></p>
                            <div class="box_det"><?php echo htmlspecialchars($post['tel']); ?></div>
                        </li>
                        <li>
                            <p class="title"><span>必須</span><em>メールアドレス</em></p>
                            <div class="box_det"><?php echo htmlspecialchars($post['email']); ?></div>
                        </li>
                    </ul>

                    <div class="confirm-btn">
                        <div class="button"></div>
                        <a href="contact.php">戻る</a>
                        <button type="submit">送信する</button>
                    </div>
                </form>
            </div>
        </section>


    </main>
</body>



<!-- ページトップへ戻るボタン -->
<p class="pagetop" style="display: block;">
    <a href="#header-top">
        <i class="fas fa-arrow-up"></i>
    </a>
</p>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init();
</script>
</body>
<script src="js/main.js"></script>

</html>